<?php
function get_database(RPCNConfig $config) : mysqli
{
    $db = mysqli_init();

    if (!$db)
    {
        throw new RuntimeException("Internal error.");
    }

    mysqli_options($db, MYSQLI_OPT_CONNECT_TIMEOUT, $config->dbConnectTimeout);

    if (!mysqli_real_connect($db, $config->dbHost, $config->dbrwUser, $config->dbrwPass, $config->dbName, (int)$config->dbPort))
    {
        throw new RuntimeException("Invalid RPCN database configuration.");
    }

    mysqli_set_charset($db, "utf8mb4");
    mysqli_report(MYSQLI_REPORT_OFF);
    return $db;
}

function curl_json(string $url, ?CurlHandle $cr) : ?object
{
    // Use existing cURL resource or create a temporary one
    $ch = (!is_null($cr)) ? $cr : curl_init();

    if (empty($url))
        return null;

    // Set the required cURL flags
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return result as raw output
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, "RPCS3 - RPCN Web Client");

    // Get the response and httpcode of that response
    $result = curl_exec($ch);

    // Reset the given cURL resource after utilisation
    if (!is_null($cr))
        curl_reset($cr);

    if (is_bool($result))
        return null;

    // Decode JSON
    $result = json_decode($result, false);

    if (is_bool($result) || is_null($result) || !is_object($result))
        return null;

    return $result;
}

function cache_netplay_statistics() : bool
{
    $rpcn_config = require dirname(__DIR__, 4) . '/configs/rpcn.php';
    if (!$rpcn_config instanceof RPCNConfig)
    {
        throw new RuntimeException("Invalid RPCN configuration.");
    }

    $q_updates = "";

    // Reset current cURL resource to use default values before using it
    $np_stats = curl_json($rpcn_config->apiUrl."/usage", null);

    if (is_null($np_stats))
    {
        echo "cache_netplay_statistics(): Failed to poll the NP API".PHP_EOL;
        return false;
    }

    // Global players data
    if (!property_exists($np_stats, "num_users") || !is_numeric($np_stats->num_users))
    {
        echo "cache_netplay_statistics(): NP API does not contain the num_users property".PHP_EOL;
        return false;
    }

    $db = get_database($rpcn_config);

    $s_players = mysqli_real_escape_string($db, (string) $np_stats->num_users);
    $q_updates .= "INSERT INTO `np_players` (`timestamp`, `players`) VALUES (CONVERT_TZ(NOW(),'SYSTEM','+00:00'), '{$s_players}'); ";

    // PSN games data
    if (!property_exists($np_stats, "psn_games") || !is_object($np_stats->psn_games))
    {
        echo "cache_netplay_statistics(): NP API does not contain the psn_games property".PHP_EOL;
        mysqli_close($db);
        return false;
    }

    $psn_games_array = get_object_vars($np_stats->psn_games);

    foreach ($psn_games_array as $comm_id => $np_data)
    {
        if (!is_array($np_data) || !isset($np_data[0]) || !is_numeric($np_data[0]) || !is_string($comm_id))
        {
            echo "cache_netplay_statistics(): NP API does not contain the player count on one of its entries".PHP_EOL;
            mysqli_close($db);
            return false;
        }

        $s_comm_id  = mysqli_real_escape_string($db, (string) $comm_id);
        $s_players  = mysqli_real_escape_string($db, (string) $np_data[0]);
        $q_updates .= "INSERT INTO `np_psn_games` (`timestamp`, `comm_id`, `players`) ";
        $q_updates .= "VALUES (CONVERT_TZ(NOW(),'SYSTEM','+00:00'), '{$s_comm_id}', '{$s_players}'); ";
    }

    // Ticket games data
    if (!property_exists($np_stats, "ticket_games") || !is_object($np_stats->ticket_games))
    {
        echo "cache_netplay_statistics(): NP API does not contain the ticket_games property".PHP_EOL;
        mysqli_close($db);
        return false;
    }

    $ticket_games_array = get_object_vars($np_stats->ticket_games);

    foreach ($ticket_games_array as $content_id => $players)
    {
        if (!is_string($content_id) || !is_numeric($players))
        {
            mysqli_close($db);
            return false;
        }

        $s_content_id = mysqli_real_escape_string($db, (string) $content_id);
        $s_players    = mysqli_real_escape_string($db, (string) $players);
        $q_updates   .= "INSERT INTO `np_ticket_games` (`timestamp`, `content_id`, `players`) ";
        $q_updates   .= "VALUES (CONVERT_TZ(NOW(),'SYSTEM','+00:00'), '{$s_content_id}', '{$s_players}'); ";
    }

    mysqli_multi_query($db, $q_updates);
    mysqli_close($db);
    return true;
}


function cache_netplay_statistics_peak() : bool
{
    $rpcn_config = require dirname(__DIR__, 4) . '/configs/rpcn.php';
    if (!$rpcn_config instanceof RPCNConfig)
    {
        throw new RuntimeException("Invalid RPCN configuration.");
    }

    $db = get_database($rpcn_config);

    $q_updates = "";

    // Select currently cached peak ticket entries
    $a_peak_ticket = array();
    $q_select_peak = mysqli_query($db, "SELECT * FROM `np_ticket_games_peak`;");

    if (is_bool($q_select_peak))
    {
        mysqli_close($db);
        return false;
    }

    if (mysqli_num_rows($q_select_peak) > 0)
    {
        while ($row = mysqli_fetch_object($q_select_peak))
        {
            if (!is_string($row->content_id) || !is_numeric($row->players))
            {
                mysqli_close($db);
                return false;
            }

            $a_peak_ticket[$row->content_id] = (int) $row->players;
        }
    }

    // Select current peak ticket games
    $q_select_ticket = mysqli_query($db, "SELECT `content_id`, MAX(`players`) AS `players`, `timestamp` 
                                          FROM `np_ticket_games` 
                                          GROUP BY `content_id` 
                                          ORDER BY `content_id` ASC;");

    if (is_bool($q_select_ticket))
    {
        mysqli_close($db);
        return false;
    }

    // Update peak ticket games cache
    while ($row = mysqli_fetch_object($q_select_ticket))
    {
        if (!is_string($row->content_id) || !is_numeric($row->players) || !is_string($row->timestamp))
        {
            mysqli_close($db);
            return false;
        }

        $db_id = mysqli_real_escape_string($db, $row->content_id);

        if (!array_key_exists($row->content_id, $a_peak_ticket))
        {
            $q_updates .= "INSERT INTO `np_ticket_games_peak` (`content_id`, `timestamp`, `players`) 
                           VALUES ('{$db_id}', '{$row->timestamp}', '{$row->players}');";
            continue;
        }

        if ($row->players >= $a_peak_ticket[$row->content_id])
        {
            $q_updates .= "UPDATE `np_ticket_games_peak` SET `players` = '{$row->players}' WHERE `content_id` = '{$db_id}';";
        }
    }


    // Select currently cached peak psn entries
    $a_peak_psn = array();
    $q_select_peak = mysqli_query($db, "SELECT * FROM `np_psn_games_peak`;");

    if (is_bool($q_select_peak))
    {
        mysqli_close($db);
        return false;
    }

    if (mysqli_num_rows($q_select_peak) > 0)
    {
        while ($row = mysqli_fetch_object($q_select_peak))
        {
            if (!is_string($row->comm_id) || !is_numeric($row->players))
            {
                mysqli_close($db);
                return false;
            }

            $a_peak_psn[$row->comm_id] = (int) $row->players;
        }
    }

    // Select current peak psn games
    $q_select_psn = mysqli_query($db, "SELECT `comm_id`, MAX(`players`) AS `players`, `timestamp` 
                                       FROM `np_psn_games` 
                                       GROUP BY `comm_id` 
                                       ORDER BY `comm_id` ASC;");

    if (is_bool($q_select_psn))
    {
        mysqli_close($db);
        return false;
    }

    // Update peak psn games cache
    while ($row = mysqli_fetch_object($q_select_psn))
    {
        if (!is_string($row->comm_id) || !is_numeric($row->players) || !is_string($row->timestamp))
        {
            mysqli_close($db);
            return false;
        }

        $db_id = mysqli_real_escape_string($db, $row->comm_id);

        if (!array_key_exists($row->comm_id, $a_peak_psn))
        {
            $q_updates .= "INSERT INTO `np_psn_games_peak` (`comm_id`, `timestamp`, `players`) VALUES ('{$db_id}', '{$row->timestamp}', '{$row->players}');";
            continue;
        }

        if ($row->players >= $a_peak_psn[$row->comm_id])
        {
            $q_updates .= "UPDATE `np_psn_games_peak` SET `players` = '{$row->players}' WHERE `comm_id` = '{$db_id}';";
        }
    }

    mysqli_multi_query($db, $q_updates);
    mysqli_close($db);
    return true;
}
<?php

$db_host = "";
$db_user = "";
$db_pass = "";
$db_name = "";
$db_port = "";

$api_url = "";

$games_json    = "lib/module/rpcn/games.json";
$icons_json    = "lib/module/rpcn/icon0.json";
$log_file      = "lib/module/rpcn/log.txt";
$badwords      = "lib/module/rpcn/badwords.php";
$blacklist     = "lib/module/rpcn/blacklist.php";
$violation_log = "lib/module/rpcn/log.txt";

$parsers_path = "lib/module/rpcn/parsers/";
$cache        = "lib/module/rpcn/cache/";
$cache_time   = 300; // seconds
$max_display_rows = 100;

$game_api_timeout         = 5;
$game_api_connect_timeout = 2;
$db_connect_timeout       = 2;

$icon_base_path = "cdn/rpcn/icon0/";
$default_icon   = "cdn/rpcn/icon0/default.png";
$pic1_json      = "lib/module/rpcn/pic1.json";
$pic1_base_path = "cdn/rpcn/pic1/";

$back_link_url = "rpcn.php";
$game_page_url = "rpcn-game.php";

$trophies_json           = "lib/module/rpcn/trophies.json";
$trophies_icon_base_path = "cdn/rpcn/trophies/";
$trophies_sets_path      = "lib/module/rpcn/trophysets/";
$trophies_cache_time     = 3600;
$trophies_enabled        = false;

/** @var list<array{max_pct: float, name: string, color: string}> $trophies_rarity_settings */
$trophies_rarity_settings = [
    ['max_pct' => 0.0,   'name' => 'Impossible', 'color' => '#ef5350'],
    ['max_pct' => 5.0,   'name' => 'Very Rare',  'color' => '#ffca28'],
    ['max_pct' => 15.0,  'name' => 'Rare',       'color' => '#42a5f5'],
    ['max_pct' => 50.0,  'name' => 'Uncommon',   'color' => '#66bb6a'],
    ['max_pct' => 100.0, 'name' => 'Common',     'color' => '#a0aec0'],
];

/** @var array{
 *     db_host: string, db_user: string, db_pass: string, db_name: string, db_port: string,
 *     api_url: string, games_json: string, icons_json: string, log_file: string, badwords: string,
 *     blacklist: string, violation_log: string, parsers_path: string, cache: string, cache_time: int,
 *     max_display_rows: int, game_api_timeout: int,
 *     game_api_connect_timeout: int, db_connect_timeout: int, icon_base_path: string, default_icon: string, pic1_json: string,
 *     pic1_base_path: string, back_link_url: string, game_page_url: string, trophies_json: string,
 *     trophies_icon_base_path: string, trophies_sets_path: string, trophies_cache_time: int,
 *     trophies_enabled: bool, trophies_rarity_settings: list<array{max_pct: float, name: string, color: string}>
 * } $rpcn_config */
$rpcn_config = [
    'db_host' => $db_host,
    'db_user' => $db_user,
    'db_pass' => $db_pass,
    'db_name' => $db_name,
    'db_port' => $db_port,
    'api_url' => $api_url,
    'games_json' => $games_json,
    'icons_json' => $icons_json,
    'log_file' => $log_file,
    'badwords' => $badwords,
    'blacklist' => $blacklist,
    'violation_log' => $violation_log,
    'parsers_path' => $parsers_path,
    'cache' => $cache,
    'cache_time' => $cache_time,
    'max_display_rows' => $max_display_rows,
    'game_api_timeout' => $game_api_timeout,
    'game_api_connect_timeout' => $game_api_connect_timeout,
    'db_connect_timeout' => $db_connect_timeout,
    'icon_base_path' => $icon_base_path,
    'default_icon' => $default_icon,
    'pic1_json' => $pic1_json,
    'pic1_base_path' => $pic1_base_path,
    'back_link_url' => $back_link_url,
    'game_page_url' => $game_page_url,
    'trophies_json' => $trophies_json,
    'trophies_icon_base_path' => $trophies_icon_base_path,
    'trophies_sets_path' => $trophies_sets_path,
    'trophies_cache_time' => $trophies_cache_time,
    'trophies_enabled' => $trophies_enabled,
    'trophies_rarity_settings' => $trophies_rarity_settings,
];

return $rpcn_config;
<?php 
include __DIR__."/../../../lib/compat/api/nointro.php";

if (isset($_GET['api']))
{
    // API: v1
    if ($_GET['api'] === "v1")
    {
        $results = exportNoIntroDatabase("content");
        header("Content-Type: application/json");
        echo json_encode($results, JSON_PRETTY_PRINT);
        exit();
    }
}

http_response_code(403);
exit("Forbidden");
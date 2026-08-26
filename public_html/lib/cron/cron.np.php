<?php
include_once(__DIR__."/../module/rpcn/dbcache.rpcn.php");

// Running every 5 minutes.
cache_netplay_statistics();
cache_netplay_statistics_peak();
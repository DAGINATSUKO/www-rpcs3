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

$trophies_rarity_settings = [
    [
        'max_pct' => 0.0,
        'name'    => 'Impossible',
        'color'   => '#ef5350'
    ],
    [
        'max_pct' => 5.0,
        'name'    => 'Very Rare',
        'color'   => '#ffca28'
    ],
    [
        'max_pct' => 15.0,
        'name'    => 'Rare',
        'color'   => '#42a5f5'
    ],
    [
        'max_pct' => 50.0,
        'name'    => 'Uncommon',
        'color'   => '#66bb6a'
    ],
    [
        'max_pct' => 100.0,
        'name'    => 'Common',
        'color'   => '#a0aec0'
    ]
];
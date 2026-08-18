<?php

$rpcnTypesPath = __DIR__ . '/../public_html/lib/module/rpcn/rpcn-types.php';

if (!is_file($rpcnTypesPath))
{
    $rpcnTypesPath = __DIR__ . '/../html/lib/module/rpcn/rpcn-types.php';
}

require_once $rpcnTypesPath;

return new RPCNConfig(
    dbHost: '',
    dbUser: '',
    dbPass: '',
    dbName: '',
    dbPort: '',
    apiUrl: '',
    gamesJson: 'lib/module/rpcn/games.json',
    iconsJson: 'lib/module/rpcn/icon0.json',
    logFile: 'lib/module/rpcn/log.txt',
    badwords: 'lib/module/rpcn/badwords.php',
    blacklist: 'lib/module/rpcn/blacklist.php',
    violationLog: 'lib/module/rpcn/log.txt',
    parsersPath: 'lib/module/rpcn/parsers/',
    cache: 'lib/module/rpcn/cache/',
    cacheTime: 300,
    maxDisplayRows: 100,
    gameApiTimeout: 5,
    gameApiConnectTimeout: 2,
    dbConnectTimeout: 2,
    iconBasePath: 'cdn/rpcn/icon0/',
    defaultIcon: 'cdn/rpcn/icon0/default.png',
    pic1Json: 'lib/module/rpcn/pic1.json',
    pic1BasePath: 'cdn/rpcn/pic1/',
    backLinkUrl: 'rpcn.php',
    gamePageUrl: 'rpcn-game.php',
    trophiesJson: 'lib/module/rpcn/trophies.json',
    trophiesIconBasePath: 'cdn/rpcn/trophies/',
    trophiesSetsPath: 'lib/module/rpcn/trophysets/',
    trophiesCacheTime: 3600,
    trophiesEnabled: false,
    trophiesRaritySettings: [
        new RPCNRaritySetting(0.0, 'Impossible', '#ef5350'),
        new RPCNRaritySetting(5.0, 'Very Rare', '#ffca28'),
        new RPCNRaritySetting(15.0, 'Rare', '#42a5f5'),
        new RPCNRaritySetting(50.0, 'Uncommon', '#66bb6a'),
        new RPCNRaritySetting(100.0, 'Common', '#a0aec0'),
    ]
);

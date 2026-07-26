<?php
// 2019.01.01 - AniLeo
// Permalink to latest Windows x64 Build

/*
Usage:
> wget
wget --content-disposition https://api.rpcs3.net/latest-windows-x64

> curl
curl -JLO https://api.rpcs3.net/latest-windows-x64
*/

if(!@include_once(__DIR__."/../lib/compat/objects/Build.php")) throw new Exception("Compat: Compatibility is missing. Failed to include Compatibility");
$build = Build::get_latest("win");
header("Content-Disposition: attachment; filename={$build->filename_win}");
header("Location: {$build->get_url_windows()}");
?>

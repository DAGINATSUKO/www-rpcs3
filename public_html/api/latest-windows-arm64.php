<?php
// 2026.07.26 - AniLeo
// Permalink to latest Windows arm64 Build

/*
Usage:
> wget
wget --content-disposition https://api.rpcs3.net/latest-windows-arm64

> curl
curl -JLO https://api.rpcs3.net/latest-windows-arm64
*/

if(!@include_once(__DIR__."/../lib/compat/objects/Build.php")) throw new Exception("Compat: Compatibility is missing. Failed to include Compatibility");
$build = Build::get_latest("win_arm64");
header("Content-Disposition: attachment; filename={$build->filename_win_arm64}");
header("Location: {$build->get_url_windows_arm64()}");
?>

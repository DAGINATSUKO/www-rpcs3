<?php
// 2024.09.28 - AniLeo
// Permalink to latest macOS x64 Build

/*
Usage:
> wget
wget --content-disposition https://api.rpcs3.net/latest-macos-x64

> curl
curl -JLO https://api.rpcs3.net/latest-macos-x64
*/

if(!@include_once(__DIR__."/../lib/compat/objects/Build.php")) throw new Exception("Compat: Compatibility is missing. Failed to include Compatibility");
$build = Build::get_latest("mac");
header("Content-Disposition: attachment; filename={$build->filename_mac}");
header("Location: {$build->get_url_mac()}");
?>

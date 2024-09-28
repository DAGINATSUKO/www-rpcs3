<?php
// 2024.09.28 - AniLeo
// Permalink to latest macOS arm64 Build

/*
Usage:
> wget
wget --content-disposition https://rpcs3.net/latest-macos-arm64

> curl
curl -JLO https://rpcs3.net/latest-macos-arm64
*/

require "lib/compat/objects/Build.php";
$build = Build::get_latest("mac_arm64");
header("Content-Disposition: attachment; filename={$build->filename_mac_arm64}");
header("Location: {$build->get_url_mac_arm64()}");
?>

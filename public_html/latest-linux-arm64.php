<?php
// 2025.01.18 - AniLeo
// Permalink to latest Linux arm64 AppImage

/*
Usage:
> wget
wget --content-disposition https://rpcs3.net/latest-linux-arm64

> curl
curl -JLO https://rpcs3.net/latest-linux-arm64
*/

require "lib/compat/objects/Build.php";
$build = Build::get_latest("linux_arm64");
header("Content-Disposition: attachment; filename={$build->filename_linux_arm64}");
header("Location: {$build->get_url_linux_arm64()}");
?>

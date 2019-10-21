<?php
// 2018.04.06 - AniLeo
// Permalink to latest Linux AppImage

/*
Usage:
> wget
wget --content-disposition https://rpcs3.net/latest-appimage

> curl
curl -JLO https://rpcs3.net/latest-appimage
*/

require "lib/compat/objects/Build.php";
$build = Build::getLatest();
header("Content-Disposition: attachment; filename={$filename_linux}");
header("Location: {$build->url_linux}");
?>

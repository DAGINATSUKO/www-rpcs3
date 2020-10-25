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
$build = Build::get_latest();
header("Content-Disposition: attachment; filename={$build->filename_linux}");
header("Location: {$build->get_url_linux()}");
?>

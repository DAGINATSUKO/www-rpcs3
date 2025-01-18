<?php
// 2025.01.18 - AniLeo
// Permalink to latest Linux x64 AppImage

/*
Usage:
> wget
wget --content-disposition https://rpcs3.net/latest-linux-x64

> curl
curl -JLO https://rpcs3.net/latest-linux-x64
*/

require "lib/compat/objects/Build.php";
$build = Build::get_latest("linux");
header("Content-Disposition: attachment; filename={$build->filename_linux}");
header("Location: {$build->get_url_linux()}");
?>

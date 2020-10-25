<?php
// 2019.01.01 - AniLeo
// Permalink to latest Windows Build

/*
Usage:
> wget
wget --content-disposition https://rpcs3.net/latest-windows

> curl
curl -JLO https://rpcs3.net/latest-windows
*/

require "lib/compat/objects/Build.php";
$build = Build::get_latest();
header("Content-Disposition: attachment; filename={$build->filename_win}");
header("Location: {$build->get_url_win()}");
?>

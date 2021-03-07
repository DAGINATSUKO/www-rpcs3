![Preview](https://raw.githubusercontent.com/DAGINATSUKO/www-rpcs3/master/public_docs/preview.png)

## Introduction

Official source code for [RPCS3.net](https://rpcs3.net). This website is designed to house and promote the progress of RPCS3, an experimental open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux. The compatibility list portion of this website is developed independently and maintained by [AniLeo](https://github.com/AniLeo).

All trademarks and copyright-written content found on this website belong to their respective owners. The RPCS3 team is in no way affiliated with Sony or PlayStation.

## Licensing
This website uses the GNU General Public License Version 2.0 (June 1991). According to the license, you are welcome to use the website and its source code for any purpose, but distributing the websites' files requires that the source code be released and attribution given. For more details on how the GNU General Public License system works, please refer to [GNU.org](https://GNU.org)

## Deployment
This website ships as is and doesn't require any compilation using any Integrated Development Environment tools. Simply download the repository archive, unpack and mount them locally or upload straight to your personal web server. For editing, we recommend using an advanced multi-language text editor, e.g. [Notepad++](https://notepad-plus-plus.org/).

For local deployment, our only requirement is [Docker](http://docker.com/getdocker). Docker is an open platform for developers and sysadmins to build, ship, and run distributed applications, whether on laptops, data center VMs, or the cloud. To run the application, use:

```shell
docker-compose up
```

From there, open a web browser of your choosing and navigate to your preferred [localhost](http://localhost:8080) address.
However, you will need to access it from your browser by adding the `:8080` to your localhost address.

This website uses a cron job to fetch the Roadmap. Your cron job should be similar to `php public_html/lib/cronjob/cron.roadmap.php` (using the appropriate paths to the php executable and the public_html directory) with a recommended timing of once every hour (`0 * * * *`).


#### External Resources
* [Flaticon](http://www.flaticon.com)
* [JS Cookie](https://github.com/js-cookie/js-cookie)
* [Animate.css](https://daneden.github.io/animate.css)
* [Particles.js](https://github.com/VincentGarreau/particles.js/)

#### Target Platforms
* [Google Chrome](https://www.google.com/chrome/browser/desktop/)
* [Google Chromium](https://www.chromium.org/Home)
* [Microsoft Edge](https://www.microsoft.com/en-us/windows/microsoft-edge)
* [Apple Safari](https://www.apple.com/safari/)
* [Mozilla Firefox](https://www.mozilla.org/en-US/firefox/new/)
* [Opera Software Opera](http://www.opera.com/)

## Copyright
All trademarks and copyright-written content found on this website belong to their respective owners. The RPCS3 team is in no way affiliated with Sony or PlayStation.

The "PlayStation logo", "PlayStation 3 logo", "PlayStation 4 logo", "PlayStation Portable logo", "PlayStation Vita logo", "PlayStation Move logo", "PlayStation Network logo", "PlayStation Store logo", "PlayStation Plus logo", "Sony logo", "Sony Computer Entertainment logo" and their aforementioned names are registered trademarks of Sony Computer Entertainment Inc. "Sony Entertainment Network" is a trademark of Sony Corporation. Library programs are copyright Sony Interactive Entertainment Inc.

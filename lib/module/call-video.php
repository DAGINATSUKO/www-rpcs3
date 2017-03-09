<?php
function preloadVideo($id, $vid, $title, $desc, $author, $speed) {	

echo"
<script type=\"text/javascript\">
$(document).ready(function() {
    $('.feature-$id-title').text(\"$title\");
    $('.feature-$id-desc').text(\"$desc\");
    $('.feature-$id-author').text(\"$author\");
	$('.feature-$id-speed').text(\"$speed\");
});
</script>
<div id=\"video-con-dim\" class=\"toggle-video-$id stop-video\">
	<div id=\"video-con-viewport\" class=\"video-con-scale\">
		<iframe id=\"video-$id\" src=\"https://www.youtube.com/embed/$vid?enablejsapi=1&color=white&version=3&playerapiid=ytplayer\" 
			frameborder=\"0\" allowfullscreen=\"true\" allowscriptaccess=\"always\" type=\"text/html\" width=\"100%\" height=\"100%\">
		</iframe>
	</div>
</div>
";
}

function loadVideo($id, $pos) {
echo "<div id='featured-con-grid' class=\"div-video-$pos\">
	<div id='featured-img-grid' style=\"background:url('/img/featured/$id.jpg') no-repeat center; background-size: cover;\">
			<div id='featured-tx1-speed'>
			<p class=\"feature-$id-speed\">
				 Speed Here
			</p>
		</div>
		<div id='featured-btn-play' class=\"page-video-$id\">
		</div>
			<div id='featured-ovr-play'>
			</div>
	</div>
	<div id='featured-con-author'>
		<div id='featured-ico-author'>
		</div>
		<div id='featured-tx1-author'>
			<p class=\"feature-$id-author\">
				 Author Here
			</p>
		</div>
	</div>
	<div id='featured-con-block'>
		<div id='featured-wrp-block'>
			<div id='featured-tx1-block'>
				<h1 class=\"feature-$id-title\">Title Here</h1>
			</div>
			<div id='featured-tx2-block'>
				<p class=\"feature-$id-desc\">
					 Description Here
				</p>
			</div>
		</div>
	</div>
</div>";
}
?>
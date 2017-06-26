<script type="text/javascript">
$(document).ready(function() {
    $('.feature-1-title').text("Ni no Kuni: Wrath of the White Witch");
    $('.feature-1-desc').text("Ni no Kuni: Wrath of the White Witch is a role-playing video game developed and published by Level-5. Players control Oliver, a young boy who sets out on a journey to save his mother. The game is played from a third-person perspective and its world is navigated on foot, by boat, or on a dragon. While players navigate Oliver throughout the game's world, other characters can be controlled during battles against enemies; during these battles, players use magic abilities and creatures known as familiars, which can be captured and tamed. It was released exclusively for the PlayStation 3.");
    $('.feature-1-author').text("Uploaded By RPCS3");
});
</script>
<div id='video-con-dim' class='stop-video toggle-video-1'>
	<div id='video-con-viewport' class='video-con-scale'>
		<iframe id='video-1' data-src="https://www.youtube.com/embed/HZf4h0cUnbo?start=15&autoplay=1&cc_load_policy=1&enablejsapi=1&color=white&version=3&playerapiid=ytplayer" frameborder="0" allowfullscreen="true" allowscriptaccess="always" type="text/html" width="100%" height="100%" src="about:blank">
		</iframe>
	</div>
</div>
<?php
function preloadVideo($id, $vid, $title, $desc) {	

echo"
<script type=\"text/javascript\">
$(document).ready(function() {
    $('.feature-$id-title').text(\"$title\");
    $('.feature-$id-desc').text(\"$desc\");
});
</script>
<div id=\"video-con-dim\" class=\"toggle-video-$id stop-video\">
	<div id=\"video-con-viewport\" class=\"video-con-scale\">
		<iframe id=\"video-$id\" data-src=\"https://www.youtube.com/embed/$vid?autoplay=1&cc_load_policy=1&enablejsapi=1&color=white&version=3&playerapiid=ytplayer\" 
			frameborder=\"0\" allowfullscreen=\"true\" allowscriptaccess=\"always\" type=\"text/html\" width=\"100%\" height=\"100%\" src=\"about:blank\">
		</iframe>
	</div>
</div>
";
}

function loadVideo($id) {
echo "<li id='featured-con-grid' class='page-flx-item'>
<div id='featured-img-grid' style=\"background:url('/img/thumbs/$id.jpg') no-repeat center; background-size: cover;\">
	<div id='featured-btn-play' class=\"page-video-$id\">
	</div>
</div>
<div id='featured-con-block'>
	<div id='featured-wrp-block' style='padding-bottom: 0px !important'>
		<div id='featured-tx1-block'>
			<h1 class=\"feature-$id-title\">Title</h1>
		</div>
		<div id='featured-tx2-block'>
			<p class=\"feature-$id-desc\">
				 Description
			</p>
		</div>
	</div>
</div>
</li>";
}
?>
<?php
function preloadVideo($id, $vid, $img) {	
echo "<script>
</script>
<div class=\"video-con-dimmer toggle-video-{$id}\">
	<div class=\"menu-btn-close close-video stop-video\">
		<div class=\"menu-tx1-tooltip\">
			<span>Close</span>
		</div>
	</div>
	<div class=\"video-con-viewport\">
		<div class=\"video-img-viewport\" style=\"background: url(/img/videos/{$img}.jpg) no-repeat center; background-size: cover;\">
			<div class=\"video-ico-viewport\"></div>
		</div>
		<iframe id=\"video-{$id}\" data-src=\"https://www.youtube.com/embed/{$vid}?autoplay=1&cc_load_policy=1&enablejsapi=1&color=white&version=3&playerapiid=ytplayer\" src=\"about:blank\">
		</iframe>
	</div>
</div>
";
}
?>
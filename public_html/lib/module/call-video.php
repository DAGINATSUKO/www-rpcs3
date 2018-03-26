<?php
function preloadVideo($id, $vid) {	
echo "<script>
</script>
<div class=\"video-con-dim toggle-video-{$id} stop-video\">
	<div class=\"video-con-viewport scale-video-con-window\">
		<iframe id=\"video-{$id}\" data-src=\"https://www.youtube.com/embed/{$vid}?autoplay=1&cc_load_policy=1&enablejsapi=1&color=white&version=3&playerapiid=ytplayer\" src=\"about:blank\">
		</iframe>
	</div>
</div>
";
}
?>
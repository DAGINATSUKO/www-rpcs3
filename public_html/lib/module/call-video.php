<?php
function preloadVideo($id, $vid) {	
echo "<script type=\"text/javascript\">
</script>
<div id=\"video-con-dim\" class=\"toggle-video-{$id} stop-video\">
	<div id=\"video-con-viewport\" class=\"scale-video-con-window\">
		<iframe id=\"video-{$id}\" data-src=\"https://www.youtube.com/embed/{$vid}?autoplay=1&cc_load_policy=1&enablejsapi=1&color=white&version=3&playerapiid=ytplayer\" 
			frameborder=\"0\" allowfullscreen=\"true\" allowscriptaccess=\"always\" type=\"text/html\" width=\"100%\" height=\"100%\" src=\"about:blank\">
		</iframe>
	</div>
</div>
";
}
?>
<div id='video-con-dim' class='stop-video toggle-video-1'>
	<div id='video-con-viewport' class='video-con-scale'>
		<iframe id='video-1' data-src="https://www.youtube.com/embed/-4D8532vxGI?&autoplay=1&cc_load_policy=1&enablejsapi=1&color=white&version=3&playerapiid=ytplayer" frameborder="0" allowfullscreen="true" allowscriptaccess="always" type="text/html" width="100%" height="100%" src="about:blank">
		</iframe>
	</div>
</div>
<?php
function preloadVideo($id, $vid, $title) {	
echo "<script type=\"text/javascript\">
$(document).ready(function() {
    $('.feature-{$id}-title').text(\"{$title}\");
});
</script>
<div id=\"video-con-dim\" class=\"toggle-video-{$id} stop-video\">
	<div id=\"video-con-viewport\" class=\"video-con-scale\">
		<iframe id=\"video-{$id}\" data-src=\"https://www.youtube.com/embed/{$vid}?autoplay=1&cc_load_policy=1&enablejsapi=1&color=white&version=3&playerapiid=ytplayer\" 
			frameborder=\"0\" allowfullscreen=\"true\" allowscriptaccess=\"always\" type=\"text/html\" width=\"100%\" height=\"100%\" src=\"about:blank\">
		</iframe>
	</div>
</div>
";
}
function loadVideo($id) {
echo "<li id='featured-con-grid' class='page-flx-item darkmode-block'>
<div id='featured-img-grid' style=\"background:url('/img/thumbs/{$id}.jpg') no-repeat center; background-size: cover;\">
	<div id='featured-btn-play' class=\"page-video-{$id}\">
	</div>
</div>
<div id='featured-con-block' class='darkmode-block' style='border-bottom: none !important; margin-bottom: 0; !important;'>
	<div id='featured-wrp-block' class='darkmode-block' style='padding-bottom: 0px !important;padding-right: 0; left: 0;'>
		<div id='featured-tx1-grid' class='darkmode-txt'>
			<h2 class=\"feature-{$id}-title\">Title</h2>
		</div>
	</div>
</div>
</li>";
}
?>
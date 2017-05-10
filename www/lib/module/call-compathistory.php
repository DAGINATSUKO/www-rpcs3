<div id="page-con-container">
	<div id="page-in-container">
		<!--End -->
		<div id='featured-con-block'>
			<div id='featured-wrp-block' style="padding-bottom:1px">
				<div id='featured-tx1-block' class="compat-title">
					<h2>RPCS3 Compatibility List History</h2>
				</div>
				<div id='featured-tx2-block' class="compat-desc">
					<p>
						You're now watching the updates that altered a game's status for RPCS3's Compatibility List since March 1st, 2017.
					</p>
					<a href="?"><b>Back to Compatibility List</b></a>
				</div>
			</div>
			<!--End -->
			<div id="compat-con-container">
				<?php echo getStatusDescriptions(); ?>
			</div>
		</div>
		<table class='compat-con-container'>
			<?php echo getHistory(); ?>
		</table>
		<!--End -->
		<div id="compat-con-author" style="margin-top:15px">
			<div id="compat-tx1-author">
				<p>
					 Compatibility list coded by <a href='https://github.com/AniLeo' target="_blank">AniLeo</a>&nbsp; - &nbsp;<?php echo 'Page generated in '.$total_time.' seconds'; ?>
				</p>
			</div>
		</div>
		<!--End -->
	</div>
</div>
	
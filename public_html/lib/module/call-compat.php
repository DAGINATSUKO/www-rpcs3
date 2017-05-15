<div id="page-con-container">
	<div id="page-in-container">
		<!--End -->
		<div id='featured-con-block'>
			<div id='featured-wrp-block'>
				<div id='featured-tx1-block' class="compat-title">
					<h2>RPCS3 Compatibility List</h2>
				</div>
				<div id='featured-tx2-block' class="compat-desc">
					<p>
						These are the current compatible games that have been tested with the emulator. This list is subject to change frequently. Be sure to check this page often to follow the latest progressions and possible regressions.
						<a href="?h"><b>See compatibility history</b></a>
					</p>
				</div>
			</div>
			<!--End -->
			<div id="compat-hdr-right">
				<p>
					 Sort By - <?php echo getSortBy(); ?>
				</p>
			</div>
			<div id="compat-hdr-left">
				<p>
					 Results per page - <?php echo getResultsPerPage(); ?>
				</p>
			</div>
			<!--End -->
			<div id="compat-con-container">
				<?php echo getStatusDescriptions(); ?>
			</div>
			<!--End -->
			<div id='compat-con-searchbox'>
				<form action="" method="get" id="searchbox-field">
					<div id='searchbox'>
						<?php echo '<input id="searchbox-field" name="sf" type="" value="';  if($sf != "" && $scount[0] >
						 0) {echo $sf;} echo '" placeholder="Game Title / Game ID" />'; ?>
					</div>
					<div id='submit'>
						<button class='div-button' type="submit">
						<div id='submit'>
						</div>
						</button>
					</div>
				</form>
			</div>
			<!--End -->
			<table id="compat-con-search">
			<tr>
				<?php echo getCharSearch(); ?>
			</tr>
			</table>
			<!--End -->
		</div>
		<table class='compat-con-container'>
		<tr>
			<?php echo getTableHeaders(); ?>
		</tr>
		<?php echo getTableContent(); ?>
		</table>
		<!--End -->
		<div id="compat-con-pages">
			<p class="div-pagecounter">
				<?php echo getPagesCounter(); ?>
			</p>
		</div>
		<div id="compat-con-author">
			<div id="compat-tx1-author">
				<p>
					 Compatibility list coded by <a href='https://github.com/AniLeo' target="_blank">AniLeo</a>&nbsp; - &nbsp;<?php echo 'Page generated in '.$total_time.' seconds'; ?>
				</p>
			</div>
		</div>
		<!--End -->
	</div>
</div>

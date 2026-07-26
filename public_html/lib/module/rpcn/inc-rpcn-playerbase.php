<div class='rpcn-playerbase-con-container'>
	<div class='rpcn-playerbase-img-container'>
		<div class='rpcn-playerbase-con-banner'>
		</div>
		<div class='rpcn-playerbase-ico-service'>
		</div>
		<div class='rpcn-playerbase-ovr-banner'>
		</div>
		<div class='rpcn-playerbase-img-banner'>
		</div>
	</div>
	<div class='rpcn-playerbase-ico-banner'>
	</div>
	<div class='rpcn-playerbase-txt-container'>
		<div class='rpcn-playerbase-tx1-banner darkmode-txt'>
			<div class="rpcn-playerbase-user-count">
				<?php if (!empty($has_error)): ?>
					<span style="color:#ffaaaa;">Service unavailable - please try again later</span><br>
				<?php else: ?>
					<span><?php echo htmlspecialchars($total_users ?? '0'); ?>
					 Players online</span><br>
				<?php endif; ?>
			</div>
			<div class="rpcn-playerbase-user-desc darkmode-txt">
				<span>Using our service with official RPCN accounts</span>
			</div>
		</div>
	</div>
</div>
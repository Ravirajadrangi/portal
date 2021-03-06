<?php if ($tests) { ?>
	<dl class="inca-services">
	<?php foreach($tests as $name) : ?>
		<?php if ($series[$name]) { ?>
			<dt><?php print $name; ?></dt>
			<?php
				$success = $series[$name]->comparisonResult == 'Success';
			?>
			<dd class="<?php $success ? print 'success' : print 'error' ?>">
				<?php
					$testUrl = 'http://inca.futuregrid.org:8080/inca/jsp/instance.jsp?';
					$testUrl .= 'nickname=' . $series[$name]->nickname;
					$testUrl .= '&resource=' . $series[$name]->hostname;
					$testUrl .= '&collected=' . $series[$name]->gmt;
					if ($success) {
						print "<a target=\"_blank\" href=\"$testUrl\" class=\"test-success\"><img src=\"http://inca.futuregrid.org:8080/inca/img/pass.png\" /></a>";
					} else {
						print "<a target=\"_blank\" href=\"$testUrl\" class=\"test-error\"><img src=\"http://inca.futuregrid.org:8080/inca/img/error.png\" /></a>";
					}
				?>
		<?php } else { ?>
			<dt class="na"><?php print $name; ?></dt>
			<dd class="na">n/a</dd>
		<?php } ?>
	<?php endforeach; ?>
	<a href="#" class="show-na">Show N/A Results</a>
	</dl>
<?php } else { ?>
	No tests available.
<?php } ?>

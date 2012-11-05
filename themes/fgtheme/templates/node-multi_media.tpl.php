<?php
/**
 * @file
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $submitted: Themed submission information output from
 *   theme_node_submitted().
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $build_mode: Build mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $build_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * The following variable is deprecated and will be removed in Drupal 7:
 * - $picture: This variable has been renamed $user_picture in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess()
 * @see zen_preprocess_node()
 * @see zen_process()
 */
?>
<?php if ($teaser) : ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">
  <div class="content">
	<div class="multi-media-video">
	<div id="container" name="<?php print $node->field_video_file_name[0]["value"]; ?>">Loading...</div>
	<script type="text/javascript">
	var flashvars = {
		file:'fgteos/' + $('#container').attr('name'),
		streamer:'rtmp://flashstream.indiana.edu/ip/mp4/'
	};

	swfobject.embedSWF('sites/default/files/jwplayermodule/player/player.swf','container','480','270','9.0.115','false',flashvars,
		{allowfullscreen:'true',allowscriptaccess:'always'},
		{id:'jwplayer',name:'jwplayer'}
	);
	</script>
	</div>
	</div>
	<div class="multi-media-content">
	<h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php
	$date = new DateTime($node->field_media_date[0]["value"]);
	print $date->format('Y-m-d');
	print "<br />";
	print $node->field_presenters[0]["value"]; 
?>
	</div>
  </div>
</div>
<?php else: ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">
  <?php print $user_picture; ?>

  <?php if (!$page && $title): ?>
    <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>

  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <?php if ($terms): ?>
    <div class="terms terms-inline"><?php print $terms; ?></div>
  <?php endif; ?>

  <div class="content">
	<div id="container" name="<?php print $node->field_video_file_name[0]["value"]; ?>">Loading...</div>
	<script type="text/javascript">
	var flashvars = {
		file:'fgteos/' + $('#container').attr('name'),
		streamer:'rtmp://flashstream.indiana.edu/ip/mp4/'
	};

	swfobject.embedSWF('sites/default/files/jwplayermodule/player/player.swf','container','960','540','9.0.115','false',flashvars,
		{allowfullscreen:'true',allowscriptaccess:'always'},
		{id:'jwplayer',name:'jwplayer'}
	);
	</script>
	</div>
    <?php 
	print $node->field_full_code[0]["value"];
	print $content;
	print "Date: " . date("M d Y", $node->field_media_date[0]["value"]);
    ?>
  </div>

  <?php //print $links; ?>
</div><!-- /.node -->
<?php endif; ?>

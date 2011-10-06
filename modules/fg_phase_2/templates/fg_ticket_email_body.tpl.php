<p>
	<?php print $summary; ?>
</p>

<p>
	<strong>Name</strong>:
	<?php print $user_first_name . ' ' . $user_last_name; ?>
	<br>
	<strong>Portal username</strong>:
	<?php print $user_portal_name; ?>
	<br>	
	<strong>Email</strong>:
	<?php print $user_email; ?>
	<?php if ($project) : ?>
		<br>
		<strong>Project number</strong>:
		<?php print $project->field_projectid[0]['value']; ?>
		<br>
		<strong>Project name</strong>:
		<?php print check_plain($project->title); ?>
	<?php endif; ?>
	<br>
	<strong>Category</strong>:
	<?php print implode(', ', $categories); ?>
</p>

<?php if ($attachment): ?>
<p>
	<strong>Attachment</strong>:
	<?php print $attachment; ?>
</p>
<?php endif; ?>
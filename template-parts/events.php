<?php
$event = $args['event'];

?>

<div class="row">
	<div class="col-md-4">
		<span class="fs-4">
			<?php echo esc_html($event['time_start']) . ' - ' . esc_html($event['time_end']); ?>
		</span>
	</div>
	<div class="col-md-4">
		<span class="fs-4">
			<?php echo esc_html($event['title']); ?>
		</span>
	</div>
	<div class="col-md-4">
		<span class="fs-4">
			<?php echo esc_html($event['presenter']); ?>
		</span>
	</div>
</div>
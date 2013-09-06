<!-- File: /app/View/Notes/view.ctp -->
<div class='subview-container view-action-container'>
	<?php
		if (empty($note['Note']['title'])) {
			$title="<span class=\"missing-title\">Untitled note</span>";
		} else {
			$title=$note['Note']['title'];
		}			
	?>
	<h3><?php echo $title ?></h3>
	<div><?php echo $this->Html->link(html_entity_decode('&#x2715;'), '/', array('class'=>'cancel-button')); ?></div>

	<p><?php echo h($note['Note']['body']); ?></p>
	<div class="index-block-footer view-action-footer">
		<div class="time-anchor"><?php echo "about ".CakeTime::timeAgoInWords($note['Note']['created'],
			array('accuracy' => array('month'=>'month', 'day'=>'day','hour' =>'hour'), 'end'=>'1 year')); ?>
	</div>
</div>
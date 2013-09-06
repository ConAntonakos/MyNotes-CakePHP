<!-- File: /app/View/Notes/add.ctp -->
<div class="subview-container">
	<h3>Add a note</h3>
	<div><?php echo $this->Html->link(html_entity_decode('&#x2715;'), '/', array('class'=>'cancel-button')); ?></div>
	<?php

		echo $this->Form->create('Note', array('inputDefaults' => array('error' => array('class' => 'error-message'))));
		echo $this->Form->input('title', 
			array('placeholder'=>'Enter your title', 'class'=>'input-area'));

		echo $this->Form->input('body', 
			array('rows'=>'2', 'placeholder'=>'Enter some text', 'required'=>false, 'class'=>'input-area'));

		echo $this->Form->input('status', 
			array('type'=>'select','options'=>$statuses));

		echo $this->Form->input('private', 
			array("type"=>"checkbox"));

		echo $this->Form->submit('Save Note', 
			array('div'=>false,'class' => 'form-btn btn btn-success'));

		echo $this->Html->link('Cancel', '/', 
			array('class' => 'btn'));

	?>
</div>
<!-- File: /app/View/Notes/edit.ctp -->
<div class="subview-container">
	<h3 class="edit-note-top-bar">Edit your note</h3>
	<div><?php echo $this->Html->link(html_entity_decode('&#x2715;'), '/', array('class'=>'cancel-button')); ?></div>
	<?php

		echo $this->Form->create('Note', array('inputDefaults' => array('error' => array('class' => 'error-message'))));

		// Hidden input field is established to override the default HTTP method.
		// Since this is an edit action, we need a PUT
		echo $this->Form->input('id', 
			array('type'=>'hidden'));

		echo $this->Form->input('title', 
			array('class'=>'input-area'));

		echo $this->Form->input('body', 
			array('rows'=>'2', 'placeholder'=>'Enter some text', 'required'=>false, 'class'=>'input-area'));

		echo $this->Form->input('status', 
			array('type'=>'select','options'=>$statuses));

		echo $this->Form->input('private', 
			array("type"=>"checkbox"));

		echo $this->Form->submit('Save Note', 
			array('div'=>false, 'class' => 'form-btn btn btn-success'));

		echo $this->Html->link('Cancel', '/', 
			array('class'=>'btn'));
	?>
</div>
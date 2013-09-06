<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<?php echo $this->Html->link('My Notes', array('controller'=>'notes', 'action'=>'index'), array('class'=>'brand')); ?>

				<?php
					echo $this->Html->link('Add Note', array('controller' => 'notes', 
						'action' => 'add'), array("class"=>"btn btn-primary", "id"=>"btn-add-note"));
				?>
				<div class="nav-collapse">
					<ul class="nav">
						<?php //Fill me with your sweet, sweet menu items. ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
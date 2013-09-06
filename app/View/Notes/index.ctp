<!--  File: /app/View/Notes/index.ctp -->
			<?php foreach ($notes as $note): ?>
				<?php if ($note['notes']['status']==="1"){
					$class="index-block-priority";
					} elseif ($note['notes']['status']==="2") {
					 	$class="index-block-archive";
					} else {
						$class=NULL;
					}
				?>
				<div class="index-block <?=$class?>">
					<div class="index-block-content">
						<div class="content-title">
							<?php if (empty($note['notes']['title'])) {
								$title="<span class=\"missing-title\">Untitled note</span>";
							} else {
								$title=$note['notes']['title'];
							}
							?>
							<?php echo $this->Html->link(
								$title, array('controller'=>'notes', 'action'=>'view', $note['notes']['id']), array('escape'=>false));

							?>
						</div>
						<div><?php echo $note['notes']['body']; ?></div>
					</div>
					<div class="index-block-footer">
						<div class="time-anchor"><?php echo "about ".CakeTime::timeAgoInWords($note['notes']['created'],
							array('accuracy' => array('month'=>'month', 'day'=>'day','hour' =>'hour'), 'end'=>'1 year')); ?>
						</div>
						<div class="edit-delete-anchor">
							<?php echo $this->Html->link(
								$this->Html->image('edit.png', 
									array('alt' => 'Edit')), 
								array('controller'=>'notes','action' => 'edit', $note['notes']['id']), 
								array('escape'=>false)); 
							?> |

							<?php echo $this->Form->postLink(
								$this->Html->image('trash.png', 
									array('alt' => 'Delete')),
								array('action'=>'delete', $note['notes']['id']),
								array('escape' => false, 'confirm'=>'Are you sure you want to delete your note?'));
							?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php unset($note); ?>
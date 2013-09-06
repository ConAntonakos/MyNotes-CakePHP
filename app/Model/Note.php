<?php

	class Note extends AppModel {

		public $statuses = array('Normal', 'Priority', 'Archive');

		public $validate = array(
			'body'=>array(
				'rule'=> 'notEmpty',
					'message' => 'Please enter some text!'
				)

			);

		public function findAllNotes(){

			return $this->query("SELECT * FROM notes ORDER BY id DESC;");
		}

	}

?>
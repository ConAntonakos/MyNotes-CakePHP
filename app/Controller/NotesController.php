<?php

	class NotesController extends AppController {

		// Declaring built-in help functions and SessionComponents
		public $helpers = array('Html', 'Form', 'MySqlEnumForm', 'Time');
		public $components = array('Session');

		// name of Controller
		public $name = 'Notes';



		public function index() {

			// If the request is a POST
			if ($this->request->is('post')) {
				$this->Note->save($this->$data);	
			}

			// pass 'notes' variable to view as a query of all notes`
			$this->set('notes', $this->Note->findAllNotes());
		}

		public function view($id = null) {
			// If no id is found
			if(!$id){
				throw new NotFoundException('Invalid note', 'flash', array('class'=>'alert alert-error'));
			}

			// If no $note is found
			$note = $this->Note->findById($id);
			if (!$note) {
				throw new NotFoundException('Invalid note', 'flash', array('class'=>'alert alert-error'));
			}

			$this->set('note', $note);
			
		}

		// Renders 'add' form
		public function add() {
			if ($this->request->is('post')) {

				// Create and save a note
				$this->Note->create();
				if ($this->Note->save($this->request->data)){
					$this->Session->setFlash('Your note has been created and saved!', 'flash', array('class'=>'alert alert-success'));
					return $this->redirect(array('action'=>'index'));
				}
				// else an error has occurred and set error flash msg
				$this->Session->setFlash('Unable to add your note', 'flash', array('class'=>'alert alert-error'));
			}
			// Set $statuses var and pass to view
			$this->set('statuses', $this->Note->statuses);
		}

		// Renders 'edit' form 
		public function edit($id=null) {
			if (!$id) {
				throw new NotFoundException('Invalid note', 'flash', array('class'=>'alert alert-error'));
			}

			$note = $this->Note->findById($id);
			if (!$note) {
				throw new NotFoundException('Invalid note', 'flash', array('class'=>'alert alert-error'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Note->id = $id;


				if ($this->Note->save($this->request->data)) {
					$this->Session->setFlash('Your note has been edited!', 'flash', array('class'=>'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				}

				$this->Session->setFlash('Unable to update your note', 'flash', array('class'=>'alert alert-error'));
			}

			if (!$this->request->data) {
				$this->request->data = $note;
			}
			$this->set('statuses', $this->Note->statuses);

		}

		public function delete($id) {
			// If user attempts to perform a DELETE using a GET request,
			// we throw an Exception
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException('Method not allowed', 'flash', array('class'=>'alert alert-error'));
			}
			// Else if DELETE happens, setFlash and redirect to index
			if ($this->Note->delete($id)) {
				$this->Session->setFlash('Your note has been deleted!', 'flash', array('class'=>'alert alert-success'));
				return $this->redirect(array('controller'=>'notes', 'action'=>'index'));
			}
		}
	}

?>
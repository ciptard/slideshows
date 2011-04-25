<?php
class SlideshowsController extends SlideshowAppController {

	var $name = 'Slideshows';

	function admin_index() {
		$this->Slideshow->recursive = 0;
		$this->set('slideshows', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid slideshow', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('slideshow', $this->Slideshow->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Slideshow->create();
			if ($this->Slideshow->save($this->data)) {
				$this->Session->setFlash(__('The slideshow has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slideshow could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid slideshow', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Slideshow->save($this->data)) {
				$this->Session->setFlash(__('The slideshow has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slideshow could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Slideshow->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for slideshow', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Slideshow->delete($id)) {
			$this->Session->setFlash(__('Slideshow deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Slideshow was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
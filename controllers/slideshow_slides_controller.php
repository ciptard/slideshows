<?php
class SlideshowSlidesController extends SlideshowsAppController {

	var $name = 'SlideshowSlides';

	function admin_index() {
		$this->SlideshowSlide->recursive = 0;
		$this->set('slideshowSlides', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid slideshow slide', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('slideshowSlide', $this->SlideshowSlide->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->SlideshowSlide->create();
			if ($this->SlideshowSlide->save($this->data)) {
				$this->Session->setFlash(__('The slideshow slide has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slideshow slide could not be saved. Please, try again.', true));
			}
		}
		$slideshows = $this->SlideshowSlide->Slideshow->find('list');
		$this->set(compact('slideshows'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid slideshow slide', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SlideshowSlide->save($this->data)) {
				$this->Session->setFlash(__('The slideshow slide has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slideshow slide could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SlideshowSlide->read(null, $id);
		}
		$slideshows = $this->SlideshowSlide->Slideshow->find('list');
		$this->set(compact('slideshows'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for slideshow slide', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SlideshowSlide->delete($id)) {
			$this->Session->setFlash(__('Slideshow slide deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Slideshow slide was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
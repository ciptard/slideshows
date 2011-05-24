<?php
class SlideshowSlidesController extends SlideshowsAppController {

	var $name = 'SlideshowSlides';
	
	public function beforeFilter() {
       parent::beforeFilter();

       // CSRF Protection
       if (in_array($this->params['action'], array('admin_add'))) {
           $this->Security->validatePost = false;
       }
   }

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

	function admin_add($id = null) {
		if (!$id && empty($this->data)) {
			$id = $id;
			$this->Session->setFlash(__('Invalid slideshow slide id', true));
			$this->redirect(array('controller'=>'slideshow','action' => 'index'));
		}
		if (!empty($this->data)) {
			//pr($this->data);
			//$getslideshows = array_filter($this->data['SlideshowSlide']);
			//$this->data = Set::remove($this->data, 'SlideshowSlide');
			//$this->data = Set::insert($this->data, 'SlideshowSlide', $getslideshows);
			// upload the file to the server  
			$fileOK = $this->_uploadFiles('img', $this->data['File']);
			// if file was uploaded ok
			//pr($fileOK);
			if(array_key_exists('urls', $fileOK)) {
				// save the url in the form data
				$this->data['SlideshowSlide']['img'] = $fileOK['urls'][0];
			}
			if(!empty($this->data['SlideshowSlide']['img'])) {
				$this->SlideshowSlide->create();
				if ($this->SlideshowSlide->save($this->data)) {
					$this->Session->setFlash(__('The slideshow slide has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The slideshow slide could not be saved. Please, try again.', true));
				}				
			} else {
				$this->Session->setFlash(__('The slideshow slide could not be saved. Error with uploading the graphic. Please, try again.', true));
			}
			$id = $this->data['SlideshowSlide']['slideshow_id'];
		}
		$this->set(compact('id'));
		$slideshows = $this->SlideshowSlide->Slideshow->find('list');
		$this->set(compact('slideshows'));
	}
	
	function _uploadFiles($folder, $formdata, $itemId = null) {
		// setup dir names absolute and relative
		//$folder_url = WWW_ROOT.$folder;
		$folder_url = APP . 'plugins' . DS . 'slideshows' . DS . 'webroot' . DS . $folder;
		//$rel_url = $folder;
		//$rel_url = APP . 'plugins' . DS . 'alerts' . DS . 'webroot' . DS .$folder;
		$rel_url = 'slideshows'. DS .$folder;

		// create the folder if it does not exist
		if(!is_dir($folder_url)) {
			mkdir($folder_url);
		}

		// if itemId is set create an item folder
		if($itemId) {
			// set new absolute folder
			//$folder_url = WWW_ROOT.$folder.'/'.$itemId; 
			$folder_url = APP . 'plugins' . DS . 'slideshows' . DS . 'webroot' . DS .$folder. DS . $itemId;
			// set new relative folder
			$rel_url = $folder.'/'.$itemId;
			// create directory
			if(!is_dir($folder_url)) {
				mkdir($folder_url);
			}
		}

		// list of permitted file types, this is only images but documents can be added
		$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
		//debug($formdata);
		// loop through and deal with the files
		foreach($formdata as $file) {
			// replace spaces with underscores
			$filename = str_replace(' ', '_', $file['name']);
			// assume filetype is false
			$typeOK = false;
			// check filetype is ok
			foreach($permitted as $type) {
				if($type == $file['type']) {
					$typeOK = true;
					break;
				}
			}
			//debug($filename);
			// if file type ok upload the file
			if($typeOK) {
				// switch based on error code
				switch($file['error']) {
					case 0:
						// check filename already exists
						if(!file_exists($folder_url.'/'.$filename)) {
							// create full filename
							$full_url = $folder_url.'/'.$filename;
							$url = $rel_url.'/'.$filename;
							// upload the file
							//$success = move_uploaded_file($file['tmp_name'], $url);
							$success = move_uploaded_file($file['tmp_name'], $full_url);
						} else {
							// create unique filename and upload file
							ini_set('date.timezone', 'Europe/London');
							$now = date('Y-m-d-His');
							$full_url = $folder_url.'/'.$now.$filename;
							$url = $rel_url.'/'.$now.$filename;
							//$success = move_uploaded_file($file['tmp_name'], $url);
							$success = move_uploaded_file($file['tmp_name'], $full_url);
						}
						// if upload was successful
						if($success) {
							// save the url of the file
							$result['urls'][] = $url;
						} else {
							$result['errors'][] = "Error uploaded $filename. Please try again.";
						}
						break;
					case 3:
						// an error occured
						$result['errors'][] = "Error uploading $filename. Please try again.";
						break;
					default:
						// an error occured
						$result['errors'][] = "System error uploading $filename. Contact webmaster.";
						break;
				}
			} elseif($file['error'] == 4) {
				// no file was selected for upload
				$result['nofiles'][] = "No file Selected";
			} else {
				// unacceptable file type
				$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
			}
		}
	return $result;
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid slideshow slide id', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//$getslideshows = array_filter($this->data['SlideshowSlide']);
			//$this->data = Set::remove($this->data, 'SlideshowSlide');
			//$this->data = Set::insert($this->data, 'SlideshowSlide', $getslideshows);
			if($this->data['File']['image']['size']>0){
				// upload the file to the server  
				$fileOK = $this->_uploadFiles('img', $this->data['File']);
				// if file was uploaded ok
				if(array_key_exists('urls', $fileOK)) {
					// save the url in the form data
					$this->data['SlideshowSlide']['img'] = $fileOK['urls'][0];
				}
			}
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
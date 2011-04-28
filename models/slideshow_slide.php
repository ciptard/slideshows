<?php
class SlideshowSlide extends SlideshowsAppModel {
	var $name = 'SlideshowSlide';
	var $validate = array(
		'slideshow_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'img' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start' => array(
			'date' => array(
				'rule' => array('date', 'ymd'),
				'message' => 'This must be a date (YYYY-MM-DD)',
				'required' => false,
				'allowEmpty' => true
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Slideshow' => array(
			'className' => 'Slideshow',
			'foreignKey' => 'slideshow_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)
	);
	
	function beforeSave() {
		if (empty($this->data['SlideshowSlide']['start'])) {
	    $this->data['SlideshowSlide']['start'] = null;
		}
		if (empty($this->data['SlideshowSlide']['end'])) {
	    $this->data['SlideshowSlide']['end'] = null;
		}
		if (empty($this->data['SlideshowSlide']['link'])) {
			$this->data['SlideshowSlide']['link'] = null;
		}
		if (empty($this->data['SlideshowSlide']['text'])) {
			$this->data['SlideshowSlide']['text'] = null;
		}
		return true;
	}

	
}
?>
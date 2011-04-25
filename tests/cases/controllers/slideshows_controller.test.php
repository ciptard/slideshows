<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/New_York' for 'EDT/-4.0/DST' instead in /Users/koryjoemarks/Desktop/EasyAcademia/cake/console/templates/default/classes/test.ctp on line 22
/* Slideshows Test cases generated on: 2011-04-25 19:50:53 : 1303775453*/
App::import('Controller', 'Slideshow.Slideshows');

class TestSlideshowsController extends SlideshowsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SlideshowsControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Slideshows =& new TestSlideshowsController();
		$this->Slideshows->constructClasses();
	}

	function endTest() {
		unset($this->Slideshows);
		ClassRegistry::flush();
	}

}
?>
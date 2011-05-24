<?php
/**
 * Slideshow Activation
 *
 * Activation class for Slideshow plugin.
 * This is optional, and is required only if you want to perform tasks when your plugin is activated/deactivated.
 *
 * @package  Croogo
 * @author   Kory Marks <kory.marks@mac.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.korymarks.com
 */
class SlideshowsActivation {
/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeActivation(&$controller) {
        return true;
    }
/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onActivation(&$controller) {
        // ACL: set ACOs with permissions
        //$controller->Croogo->addAco('Example'); // ExampleController
        //$controller->Croogo->addAco('Example/admin_index'); // ExampleController::admin_index()
        //$controller->Croogo->addAco('Example/index', array('registered', 'public')); // ExampleController::index()

				//Create Block
				$this->createBlock($controller);
				
				//Add SQL
				$sql = file_get_contents(APP.'plugins'.DS.'slideshows'.DS.'config'.DS.'schema'.DS.'slideshows.sql');
				if(!empty($sql)){
			        	App::import('Core', 'File');
			        	App::import('Model', 'ConnectionManager');
			        	$db = ConnectionManager::getDataSource('default');
			        	$statements = explode(';', $sql);

				        foreach ($statements as $statement) {
				            if (trim($statement) != '') {
				                $db->query($statement);
				            }
				        }
			   }

    }
/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeDeactivation(&$controller) {
        return true;
    }
/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onDeactivation(&$controller) {
        // ACL: remove ACOs with permissions
        //$controller->Croogo->removeAco('Example'); // ExampleController ACO and it's actions will be removed

        //Remove BlockS
				$this->removeBlock($controller);
    }

		public function createBlock(&$controller){

		        $controller->loadModel('Block');
		        $controller->Block->create();
		        $controller->Block->set(array(
		            'visibility_roles' => $controller->Node->encodeData(array("1","2","3","4","5","6")),
		            'visibility_paths' => '',
		            'region_id'        => 17, // Region9
		            'title'            => 'Slideshow',
		            'alias'            => 'slideshow_plugin',
		            'body'             => '[element:slideshow plugin="slideshows"]',
		            'show_title'       => 1,
		            'status'           => 1
		        ));
		        $controller->Block->save();
		    }

		    public function removeBlock(&$controller){

		        $controller->loadModel('Block');
		        $block = $controller->Block->find('first', array('conditions'=>array('Block.alias'=>'slideshow_plugin')));

		        if( $block ){
		            $controller->Block->delete($block['Block']['id']);
		        }

		    }
}
?>
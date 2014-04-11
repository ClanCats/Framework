<?php
/*
 * the dev controller with all the stuff i 
 * was to lazy to create an own controller for it >.<
 */
class DevController extends CCViewController {
	
	/**
	 * show php info 
	 */
	public function action_phpinfo() {
		
		// set topic
		$this->theme->topic = "php info";
		
		// get php info in a string
		ob_start(); phpinfo(); $pinfo = ob_get_contents(); ob_end_clean();
		
		// get only the body
		$pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
		echo "<div class='row mrt50'><div class='grid16'>".$pinfo."</div></div>";
	}
	
	/**
	 * show stylesheet overview
	 */
	public function action_css() {
		
		// set topic
		$this->theme->topic = "CSS Overview";
		
		// load the css overview
		$this->view = CCView::create( 'development/cssView' );
	}
}
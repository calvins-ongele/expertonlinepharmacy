<?php
  
class Content extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($url = null) {   
        $this->view->currentpage = $_GET['pg'] ?? 1;
		$this->view->pid = 'blog'; 
        
        if ( !empty($url) ) { 
          $this->view->blog = $this->model->getblog( $url );
		  $this->view->title =  $this->view->blog[0]['title']??""  ;
		  if ($this->view->blog === false) {
		      $this->view->render('err/index', true);
		      return;
		  }
          $this->view->render('blog/read');
		  return;
        }  
        
        
        $this->view->data = $this->model->getblog( );
		$this->view->title =  'Content & Creatives ' ; 
        $this->view->render('blog/index');
    }
    
   
     














    //////////////////////////////////////////////////

}

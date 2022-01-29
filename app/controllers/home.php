<?php 
 class Home extends Controller {
     function index() { 
         /*to send data to the view */ 
         $data['page_title']="Home" ; 
         $this->view("dashboard/index",$data) ; 
     }
 }
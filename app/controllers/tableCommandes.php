<?php 
 class tableCommandes extends Controller {
     function index() { 
         /*to send data to the view */ 
         $data['page_title']="Tableau des commandes" ; 
         $this->view("dashboard/pages/list-commandes/commandList",$data) ;  
     }
 }
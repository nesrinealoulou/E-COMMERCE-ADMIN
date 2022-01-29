<?php 
Class CommandesDetails extends Controller
{
    function index() {
        $data['page-title']="menu-table" ;
        $this->view("dashboard/pages/commandes-details/commandesDetails",$data) ; 
    }
  
}
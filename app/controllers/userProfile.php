<?php 
Class UserProfile extends Controller
{
    function index() {
        $data['page-title']="menu-table" ;
        $this->view("dashboard/pages/user-profile/Profile",$data) ; 
    }
  
}
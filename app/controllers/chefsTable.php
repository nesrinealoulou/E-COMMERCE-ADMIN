<?php 
Class ChefsTable extends Controller
{
    function index() {
        $DB = Database::newInstance() ;
        $Chefs=$DB->read("select * from chefs  order by id desc");
        $Chef = $this->loadModel("ChefClass") ; 
        $tbl_rows = $Chef->make_table($Chefs);
        $data['tbl_rows'] = $tbl_rows ;
         $data['page-title']="chef-table" ;
        $this->view("dashboard/pages/chef-table/chefsTable",$data) ; 
    }
  
}
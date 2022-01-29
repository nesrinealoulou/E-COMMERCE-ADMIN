<?php 
Class menuTable extends Controller
{
    function index() {
        $DB = Database::newInstance() ;
        $Meals=$DB->read("select * from meals  order by id desc");
        $categories=$DB->read("select * from categorie");
        $Meal = $this->loadModel("MealsClass") ; 
        $tbl_rows = $Meal->make_table($Meals);
        $data['tbl_rows'] = $tbl_rows ;
        $data['categories'] = $categories ; 
        $data['page-title']="menu-table" ;
        $this->view("dashboard/pages/menu-table/menuTable",$data) ; 
    }
  
}
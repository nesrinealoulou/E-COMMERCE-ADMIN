<?php 
Class CategorieTable extends Controller
{
    function index() {
        $DB = Database::newInstance() ;
        $categories=$DB->read("select * from categorie order by code desc");
        $category = $this->loadModel("CategoryClass") ; 
        $tbl_rows = $category->make_table($categories);
        $data['tbl_rows'] = $tbl_rows ;
        $data['page-title']="categorie-table" ;
        $this->view("dashboard/pages/categorie-table/categorieTable",$data) ; 
    }
    
  
}
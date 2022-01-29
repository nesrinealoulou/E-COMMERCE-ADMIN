<?php 
Class CommandesDetails extends Controller
{
    function index() {
        $DB = Database::newInstance() ;
        $orders_details=$DB->read("select * from order_details  order by num_ligne desc");
        $order_detail = $this->loadModel("commandeDetailsClass") ; 
        $tbl_rows = $order_detail->make_table($orders_details);
        $data['tbl_rows'] = $tbl_rows ;
        $data['page-title']="order_details" ;
        $this->view("dashboard/pages/commandes-details/commandesDetails",$data) ; 



       
    }
    
  
}
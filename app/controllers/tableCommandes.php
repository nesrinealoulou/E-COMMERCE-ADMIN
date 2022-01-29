<?php 
 class tableCommandes extends Controller {
     function index() { 
        $DB = Database::newInstance() ;
        $orders=$DB->read("select * from orders where status ='en attente' ");
        $order = $this->loadModel("OrdersClass") ; 
        $tbl_rows = $order->make_table($orders);
        $data['tbl_rows'] = $tbl_rows ;
         $data['page_title']="Tableau des commandes" ; 
         $this->view("dashboard/pages/list-commandes/commandList",$data) ;  
     }
 }
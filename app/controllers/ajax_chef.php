<?php 
Class Ajax_chef extends Controller
{
    public function index() {
        //$data = file_get_contents("php://input") ; 
         
         
        $data = (object)$_POST;
        $chef = $this->loadModel('ChefClass');
        
       

        if(is_object($data) && isset($data->data_type))
        {
            if($data->data_type == 'add_chef') 
            {
              
                $check=$chef->create($data,$_FILES) ;
                
                if($_SESSION['error']!="") {
                    $arr['message'] = $_SESSION['error'] ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "error" ;
                    $arr['data'] = "" ;
                    $arr['data_type'] = "add_new" ;
                    

                    echo json_encode($arr) ; 
                } else 
                {
                    $arr['message'] ="chef added successfully" ;
                    $arr['message_type'] = "info" ;
                    $cats = $chef->get_all() ;
                    $arr['data'] = $chef->make_table($cats) ;
                    $arr['data_type'] = "add_new" ;
                    echo json_encode($arr) ; 
                }
            }
            else 
            {
                if($data->data_type == 'edit_chef')
                {
                    
                    $chef->edit($data,$_FILES);
                    $arr['message'] = "your row was successfully edited" ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "info" ;
                    $cats = $chef->get_all() ;
                    $arr['data'] = $chef->make_table($cats) ;
                    $arr['data_type'] = "edit_chef" ;
                    echo json_encode($arr) ;
                }else if($data->data_type =='delete_row') 
                
                {
                    
                    $chef->delete($data->id);
                     $arr['message'] = "your row was successfully deleted" ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "info" ;
                    $cats = $chef->get_all() ;
                    $arr['data'] = $chef->make_table($cats) ;
                    $arr['data_type'] = "delete_row" ;
                    echo json_encode($arr) ;
                }
                    
                    
            }
           
        }
        
    }
}
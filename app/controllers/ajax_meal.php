<?php 
Class Ajax_meal extends Controller
{
    public function index() {
        //$data = file_get_contents("php://input") ; 
         
         
        $data = (object)$_POST;
        $meal = $this->loadModel('MealsClass');

       

        if(is_object($data) && isset($data->data_type))
        {
            if($data->data_type == 'add_meal') 
            {
              
                $check=$meal->create($data,$_FILES) ;
                
                if($_SESSION['error']!="") {
                    $arr['message'] = $_SESSION['error'] ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "error" ;
                    $arr['data'] = "" ;
                    $arr['data_type'] = "add_new" ;
                    

                    echo json_encode($arr) ; 
                } else 
                {
                    $arr['message'] ="meal added successfully" ;
                    $arr['message_type'] = "info" ;
                    $cats = $meal->get_all() ;
                    $arr['data'] = $meal->make_table($cats,$meal) ;
                    $arr['data_type'] = "add_new" ;
                    echo json_encode($arr) ; 
                }
            }
            else 
            {
                if($data->data_type == 'edit_meal')
                {
                    
                    $meal->edit($data,$_FILES);
                    $arr['message'] = "your row was successfully edited" ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "info" ;
                    $cats = $meal->get_all() ;
                    $arr['data'] = $meal->make_table($cats,$meal) ;
                    $arr['data_type'] = "edit_meal" ;
                    echo json_encode($arr) ;
                }else
                if($data->data_type == 'delete_row') 
                
                {
                    
                    $meal->delete($data->id);
                    
                    $arr['message'] = "your row was successfully deleted" ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "info" ;
                    $cats = $meal->get_all() ;
                    $arr['data'] = $meal->make_table($cats) ;
                    $arr['data_type'] = "delete_row" ;
                    echo json_encode($arr) ;
                }
                    
                    
            }
           
        }
        
    }
}
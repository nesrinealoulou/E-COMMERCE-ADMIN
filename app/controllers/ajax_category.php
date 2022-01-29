<?php 
Class Ajax_category extends Controller
{
    public function index() {
        $data = file_get_contents("php://input") ; 
        $data = json_decode($data); 

        if(is_object($data) && isset($data->data_type))
        {
            if($data->data_type == 'add_category') 
            {
                //add new category 
                $category = $this->loadModel('CategoryClass');
                $check=$category->create($data) ;

                if($_SESSION['error']!="") {
                    $arr['message'] = $_SESSION['error'] ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "error" ;
                    $arr['data'] = "" ;
                    $arr['data_type'] = "add_new" ;
                    

                    echo json_encode($arr) ; 
                } else 
                {
                    $arr['message'] ="category added successfully" ;
                    $arr['message_type'] = "info" ;
                    $cats = $category->get_all() ;
                    $arr['data'] = $category->make_table($cats) ;
                    $arr['data_type'] = "add_new" ;
                    echo json_encode($arr) ; 
                }
            }
            else 
            {
                if($data->data_type == 'edit_category')
                {
                    $category = $this->loadModel('CategoryClass');
                    $category->edit($data->id,$data->category);
                    $arr['message'] = "your row was successfully edited" ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "info" ;
                    $cats = $category->get_all() ;
                    $arr['data'] = $category->make_table($cats) ;
                    $arr['data_type'] = "edit_category" ;
                    echo json_encode($arr) ;
                }else
                if($data->data_type == 'delete_row') 
                {
                    $category = $this->loadModel('CategoryClass');
                    $category->delete($data->id);
                    $arr['message'] = "your row was successfully deleted" ;
                    $_SESSION['error']="" ; 
                    $arr['message_type'] = "info" ;
                    $cats = $category->get_all() ;
                    $arr['data'] = $category->make_table($cats) ;
                    $arr['data_type'] = "delete_row" ;
                    echo json_encode($arr) ;
                }
            }
           
        }
        
    }
}
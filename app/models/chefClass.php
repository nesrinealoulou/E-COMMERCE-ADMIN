<?php 
Class ChefClass {
    public function create($DATA,$FILES) {
      $_SESSION['error'] = "" ; 
        $DB = Database::getInstance() ; 
        $arr['name'] = ucwords($DATA->name);
        $arr['occupation'] = ucwords($DATA->occupation);
        $arr['facebook'] = ucwords($DATA->facebook);
        $arr['instagram'] = ucwords($DATA->instagram);
        $arr['linkedin'] = ucwords($DATA->linkedin);
        if(!preg_match("/^[a-zA-Z ]+$/", trim($arr['name']))) {
            $_SESSION['error'] .= 'please enter a valid chef name<br>' ; 
         } 
        
      if(!preg_match("/^[a-zA-Z ]+$/", trim($arr['occupation']))) {
       $_SESSION['error'] .= 'please enter a valid chef occupation<br>' ; 
    } 
    
      if (!isset($_SESSION['error']) || $_SESSION['error'] == "")  {
            $query = "insert into chefs (name,occupation,facebook,instagram,linkedin) values (:name,:occupation,:facebook,:instagram,:linkedin)";
            $check= $DB->write($query,$arr) ; 
            if($check) {
               return true ;  
            }
            
        }
        return false; 
     }
     public function edit($data) {
      $arr['id'] = $data->id ; 
      $arr['name'] = $data->name ; 
      $arr['occupation'] = $data->occupation ; 
      $arr['facebook'] = $data->facebook ; 
      $arr['instagram'] = $data->instagram ;
      $arr['linkedin'] = $data->linkedin ;
      
      if(!preg_match("/^[a-zA-Z ]+$/", trim($arr['name']))) {
        $_SESSION['error'] .= 'please enter a valid chef name <br>' ; 
     } 
      if(!preg_match("/^[a-zA-Z ]+$/", trim($arr['occupation']))) {
         $_SESSION['error'] .= 'please enter a valid chef occupation<br>' ; 
      } 
      if (!isset($_SESSION['error']) || $_SESSION['error'] == "")  {
            $DB = Database::newInstance() ;
            $query ="update chefs set name = :name,occupation = :occupation, facebook =:facebook,instagram= :instagram,linkedin= :linkedin where id = :id limit 1" ;
            $DB->write($query,$arr);  
      }

        

       

      
    }
    public function delete($id) {

      $DB = Database::newInstance() ;
     
      $id=(int)$id;
      $query ="delete from chefs where id='$id' limit 1 " ;
      return $DB->write($query);
    }
    public function get_all() {
      $DB = Database::newInstance() ;
      return $DB->read("select * from chefs order by id desc");
   }
   public function make_table($cats) {

      $result = "";
      if(is_array($cats)) {
         foreach($cats as $cat_row) {
            $edit_args = $cat_row->id.",'".$cat_row->name."'";
            $info = array() ;    
            $info['id']= $cat_row->id ;
            $info['name']= $cat_row->name ;
            
            $info['occupation']= $cat_row->occupation ;
            $info['facebook']= $cat_row->facebook ;
            $info['instagram']= $cat_row->instagram ;     
            $info['linkedin']= $cat_row->linkedin ;
            $info = str_replace('"',"'",json_encode($info)); 
           // $once_cat = $model->get_one($cat_row->instagram);
                 $result .= "<tr>" ; 
                 $result .= '
                 <td class="py-1">'.$cat_row->id.'</td>
                 <td> '.$cat_row->name.'</td>
                 <td> '.$cat_row->occupation.'</td>
                 <td> '.$cat_row->facebook.'</td>
                 <td> '.$cat_row->instagram.'</td>
                 <td> '.$cat_row->linkedin.'</td>
                 <td><button info="'.$info.'" onclick="show_edit_chef('.$edit_args.',event)" type="button" class="btn btn-dark btn-sm">edit</button>
                 <button  onclick="delete_row(event,'.$cat_row->id.')" type="button" class="btn btn-danger btn-sm">delete</button></td>
                 
                ';
                 
      
             

                 $result .=  "</tr>";
      }
     }
   
   return $result ; 
    
 }
      
}
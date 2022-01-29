<?php 
Class MealsClass {
   public function create($DATA,$FILES) {
      $_SESSION['error'] = "" ; 
        $DB = Database::getInstance() ; 
        $arr['name'] = ucwords($DATA->name);
        $arr['description'] = ucwords($DATA->description);
        $arr['price'] = ucwords($DATA->price);
        $arr['code_categorie'] = ucwords($DATA->category);
        
      if(!preg_match("/^[a-zA-Z ]+$/", trim($arr['description']))) {
       $_SESSION['error'] .= 'please enter a valid meal description<br>' ; 
    } 
    
        if(!is_numeric($arr['price'])) {
         $_SESSION['error'] .= 'please enter a valid price<br>' ; 
      } 
      if(!is_numeric($arr['code_categorie'])) {
         $_SESSION['error'] .= 'please enter a valid categorie<br>' ; 
      } 

         //check for files 
         $arr['image'] ="" ;
         $size = 10 ; 
         //mbyte
         $size=($size * 1024 * 1024) ; 
         $folder= "uploads/" ;
         if (!file_exists($folder)){
            mkdir($folder,0777,true) ;
         }
         $destination = $folder .$FILES["image"]['name'];

         move_uploaded_file($FILES["image"]['tmp_name'],$destination) ;
         $arr["image"]=$FILES["image"]['name'];
         
          
        if (!isset($_SESSION['error']) || $_SESSION['error'] == "")  {
            $query = "insert into meals (name,image,description,price,code_categorie) values (:name,:image,:description,:price,:code_categorie)";
            $check= $DB->write($query,$arr) ; 
            if($check) {
               return true ;  
            }
            
        }
        return false; 
     }
     public function edit($data,$FILES) {
      $arr['id'] = $data->id ; 
      $arr['name'] = $data->name ; 
      $arr['description'] = $data->description ; 
      $arr['price'] = $data->price ; 
      $arr['code_categorie'] = $data->category ;
      $images_string = "" ; 
      if(!preg_match("/^[a-zA-Z ]+$/", trim($arr['description']))) {
         $_SESSION['error'] .= 'please enter a valid meal description<br>' ; 
      } 
      
          if(!is_numeric($arr['price'])) {
           $_SESSION['error'] .= 'please enter a valid price<br>' ; 
        } 
        if(!is_numeric($arr['code_categorie'])) {
           $_SESSION['error'] .= 'please enter a valid categorie<br>' ; 
        } 
        //check for files 
        $arr['image'] ="" ;
        $size = 10 ; 
        //mbyte
        $size=($size * 1024 * 1024) ; 
        $folder= "uploads/" ;
        if (!file_exists($folder)){
           mkdir($folder,0777,true) ;
        }
        if($FILES["image"]) {
            $destination = $folder .$FILES["image"]['name'];
            move_uploaded_file($FILES["image"]['tmp_name'],$destination) ;
            $arr["image"]=$FILES["image"]['name'];
            $DB = Database::newInstance() ;
            $query ="update meals set name = :name,image = :image,description = :description, price =:price,code_categorie=:code_categorie where id = :id limit 1" ;
               $DB->write($query,$arr);  
        }
        else {
         if (!isset($_SESSION['error']) || $_SESSION['error'] == "")  {
            $DB = Database::newInstance() ;
            $query ="update meals set name = :name,description = :description, price =:price,code_categorie= :code_categorie where id = :id limit 1" ;
            $DB->write($query,$arr);  
      }

        }

       

      
    }
    public function delete($id) {
      $DB = Database::newInstance() ;
      $id=(int)$id;
      $query ="delete from meals where id= '$id' limit 1 " ;
      return $DB->write($query);
    }
    public function get_all() {
      $DB = Database::newInstance() ;
      return $DB->read("select * from meals order by id desc");
   }
   public function make_table($cats) {

      $result = "";
      if(is_array($cats)) {
         foreach($cats as $cat_row) {
            $edit_args = $cat_row->id.",'".$cat_row->name."'";
            $info = array() ;    
            $info['id']= $cat_row->id ;
            $info['name']= $cat_row->name ;
            $info['image']= $cat_row->image ;
            $info['description']= $cat_row->description ;
            $info['price']= $cat_row->price ;
            $info['code_categorie']= $cat_row->code_categorie ;     
            $info = str_replace('"',"'",json_encode($info)); 
           // $once_cat = $model->get_one($cat_row->code_categorie);
                 $result .= "<tr>" ; 
                 $result .= '
                 <td class="py-1">'.$cat_row->id.'</td>
                 <td> '.$cat_row->name.'</td>
                 <td><img src="'.ROOT.'uploads/'. $cat_row->image.'" style="width:70px;height=100%;"/></td>
                 <td> '.$cat_row->description.'</td>
                 <td> '.$cat_row->price.'</td>
                 <td> '.$cat_row->code_categorie.'</td>
                 <td><button info="'.$info.'" onclick="show_edit_meal('.$edit_args.',event)" type="button" class="btn btn-dark btn-sm">edit</button>
                 <button  onclick="delete_row(event,'.$cat_row->id.')" type="button" class="btn btn-danger btn-sm">delete</button></td>
                 
                ';
      
             

                 $result .=  "</tr>";
      }
     }
   
   return $result ; 
    
 }
      
}
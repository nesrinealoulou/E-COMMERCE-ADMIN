<?php 
 Class CategoryClass 
 {
     public function create($DATA) {
        $DB = Database::getInstance() ; 
        $arr['nom'] = ucwords($DATA->data);
        if(!preg_match("/^[a-zA-Z ]+$/", trim($arr['nom']))) {
           $_SESSION['error'] = 'please enter a valid category' ; 
        } 
        if (!isset($_SESSION['error']) || $_SESSION['error'] == "")  {
            $query = "insert into categorie (code,nom) values (null,:nom)";
            $check= $DB->write($query,$arr) ; 
            if($check) {
               return true ;  
            }
            
        }
        return false; 
     }
     public function edit($id,$category) {
      $DB = Database::newInstance() ;
      $arr['code'] = $id;
      $arr['nom'] = $category;
      $query ="update categorie set nom = :nom where code = :code limit 1" ;
      return $DB->write($query,$arr);  
    }
    public function delete($id) {
      $DB = Database::newInstance() ;
      $id=(int)$id;
      $query ="delete from categorie where code= '$id' limit 1 " ;
      return $DB->write($query);
    }
    public function get_all() {
      $DB = Database::newInstance() ;
      return $DB->read("select * from categorie order by code desc");
   }
   public function make_table($cats) {

      $result = "";
      if(is_array($cats)) {
         foreach($cats as $cat_row) {
            $edit_args = $cat_row->code.",'".$cat_row->nom."'";            $result .=  "<tr>";
             
                 $result .= '
                 <td class="py-1">'.$cat_row->code.'</td>
                 <td> '.$cat_row->nom.'</td>
                 <td><button onclick="show_edit_category('.$edit_args.',event)" type="button" class="btn btn-dark btn-sm">edit</button>
                 <button  onclick="delete_row(event,'.$cat_row->code.')" type="button" class="btn btn-danger btn-sm">delete</button></td>
                 ';
             

                 $result .=  "</tr>";
      }
     }
   
   return $result ; 
    
 }
}
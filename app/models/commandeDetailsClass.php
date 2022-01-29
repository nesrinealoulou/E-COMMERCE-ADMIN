<?php 
Class CommandeDetailsClass {
   
     
    
    public function get_en_attente() {
        $DB = Database::newInstance() ;
        $status ="not_delivered"  ;
        return $DB->read("select * from orders where status ='$status' ");
     }
   public function make_table($cats) {

    $result = "";
    if(is_array($cats)) {
       foreach($cats as $cat_row) {
          
          $info = array() ;    
          $info['id_user']= $cat_row->id_user;
          $info['num_ligne']= $cat_row->num_ligne ;
          $info['id_meal']= $cat_row->id_meal ;
          $info['quantity']= $cat_row->quantity ;
          $info['price']= $cat_row->price ;
          $info['statut']= $cat_row->statut ;     
          $info = str_replace('"',"'",json_encode($info)); 
          if($cat_row->statut == "not_delivered") {
         // $once_cat = $model->get_one($cat_row->code_categorie);
               $result .= "<tr>" ; 
               $result .= '
               <td class="py-1">'.$cat_row->id_user.'</td>
               <td> '.$cat_row->num_ligne .'</td>
               <td>'.$cat_row->id_meal.'</td>
               <td> '.$cat_row->quantity.'</td>
               <td> '.$cat_row->price.'</td>
               <td> '.$cat_row->statut.'</td>
              
               ';
    
           

               $result .=  "</tr>";
          }
    }
   }
 
 return $result ; 
  
}
      
}
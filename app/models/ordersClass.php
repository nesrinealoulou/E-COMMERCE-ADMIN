<?php 
Class OrdersClass {
   
     public function edit($data) {
      $arr['id_order'] = $data->id_order ; 
      $arr['status'] = $data->status ; 
      if (!isset($_SESSION['error']) || $_SESSION['error'] == "")  {
         $DB = Database::newInstance() ;
         $query =' UPDATE `orders` SET `status` = :status  WHERE `orders`.`id_order` = :id_order';
         //$query ="update orders set status = :status where id_order = :id_order limit 1" ;
         $DB->write($query,$arr);  
     }
    }
    
    public function get_en_attente() {
        $DB = Database::newInstance() ;
        $status ="en attente"  ;
        return $DB->read("select * from orders where status ='$status' ");
     }
   public function make_table($cats) {

      $result = "";
      if(is_array($cats)) {
         foreach($cats as $cat_row) {
            $edit_args = $cat_row->id_order.",'".$cat_row->id_user."','".$cat_row->status."'";
            $info = array() ;    
            $info['id_order']= $cat_row->id_order;
            $info['id_user']= $cat_row->id_user ;
            $info['date_order']= $cat_row->date_order ;
            $info['delivery_adress']= $cat_row->delivery_adress ;
            $info['status']= $cat_row->status ;
            $info['total_order']= $cat_row->total_order ;     
            $info = str_replace('"',"'",json_encode($info)); 
           // $once_cat = $model->get_one($cat_row->code_categorie);
                 $result .= "<tr>" ; 
                 $result .= '
                 <td class="py-1">'.$cat_row->id_order.'</td>
                 <td> '.$cat_row->id_user .'</td>
                 <td>'.$cat_row->date_order.'</td>
                 <td> '.$cat_row->delivery_adress.'</td>
                 <td> '.$cat_row->status.'</td>
                 <td> '.$cat_row->total_order.'</td>
                 <td><button info="'.$info.'" onclick="show_edit_order('.$edit_args.',event)" type="button" class="btn btn-dark btn-sm">edit</button></td>
                 ';
      
             

                 $result .=  "</tr>";
      }
     }
   
   return $result ; 
    
 }
      
}
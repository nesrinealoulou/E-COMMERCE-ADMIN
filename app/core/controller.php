<?php 
    Class Controller {
        function view($view,$data=[]) {
            if(file_exists("../app/views/". $view .".php"))
             {
                 include "../app/views/". $view .".php" ; 
                 
             }
             else {
                 include "../app/views/404.php" ; 
             }
         }
         function loadModel($model) {
            if(file_exists("../app/models/". strtoLower($model) .".php"))
             {
                 include "../app/models/". strtoLower($model) .".php" ; 
                 return $model= new $model() ;
             }
             return false ; 
         }
         
       }
    
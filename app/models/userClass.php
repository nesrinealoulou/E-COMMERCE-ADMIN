
<?php
Class UserClass { 
    public function getEmail($id_user) {
        $DB = Database::newInstance() ;
        return $DB->read("select email from users where id ='$id_user'")[0]->email;
    }
}
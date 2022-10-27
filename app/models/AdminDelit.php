<?php
namespace app\models;

class AdminDelit extends Model{
    
   
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);

        
        $requestData = json_decode($parameters);

        
        $delitSql = "DELETE FROM `user` WHERE `id_user` =:id";
        $delRow = ['id'=> (int)$requestData->id];
        $this->connectDB->delit( $delitSql , $delRow);

        
        $categories = "SELECT `id_user`, `Name`, `patronymic`, `surname`, `email`, `login`, `password`, `userPhoto_id_userPhoto`, `userStatus_id_userStatus` FROM `user`";
        $t = $this->connectDB->read($categories);
        
        
       
        
        $this->data = $t ;
     
    }
    
    

    public function getData()
    {
        return $this->data;
    }
    

}


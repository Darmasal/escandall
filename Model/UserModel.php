<?php
require_once PROJECT_ROOT_PATH . "/Database.php";
 
class UserModel extends Database
{
    /*Mostra de GET
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }
    
    */

    //Get de tots els artícles
    public function getArticles($limit)
    {
        return $this->select("SELECT * FROM e_articles ORDER BY Referencia ASC LIMIT ?", ["i", $limit]);
    }

     //Get de cerca d'artícles
     public function getCercaRefArticles($referencia)
     {
         return $this->select("SELECT * FROM e_articles WHERE Referencia LIKE '%?%' ORDER BY Referencia ASC LIMIT 20", ["s", $referencia]);
     }   


    
}
?>
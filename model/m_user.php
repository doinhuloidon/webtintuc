<?php
include('database.php');
class M_user extends database{

	function register($name, $email, $password){
        $query = "INSERT INTO users(name, email, password) ";
        $query.= "VALUES(?,?,?)";
        $this->setQuery($query);
        $result = $this->execute(array($name, $email, md5($password)));
        if($result)
            return $this->getLastId();  //If query execute successful, the system will return lastID in table users
        else
            return false;
	}

    function timUser($email, $md5_password){

        $sql = "Select * from users where email = '$email' and password = '$md5_password'";
        $this->setQuery($sql);
        return $this->loadRow(array($email,$md5_password));
    }

}
?>
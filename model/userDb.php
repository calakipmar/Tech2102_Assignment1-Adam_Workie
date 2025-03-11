<?php

    function getUser($email) {
        
        global $db;
        $query = 'SELECT * FROM user WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->execute();
        $statement->closeCursor();
        return $user;
    }

    function addUser($name, $email, $password) {
        

        global $db;
        $query = 'INSERT INTO user(username, email, password) VALUES (:username, :email, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $name);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }

    function userExists($email){
        global $db;
        $query = 'SELECT * FROM user WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $count = $statement->rowCount() > 0;
        $statement->execute();
        $statement->closeCursor();
        return $count;
    }

    function login($email, $password) {
        if (!userExists($email)) {
            return false;
        }

        $user = (getUser($email));

        if(password_verify($password, $user["password"])){
            header("Location: studentList.php");
            return true;
        }
        else {
            return false;
        }
    }

?>
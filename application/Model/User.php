<?php
/**
 * Created by PhpStorm.
 * User: 0807932279
 * Date: 27.3.2017
 * Time: 13:44
 */

class User{

    public function newUser($full_name_from_signup, $user_name_from_signup,$database_password_hash, $email_from_signup)
    {
        //Undirbúið sql fyrir insert skipun
        $sth = $this->dbh->prepare("INSERT INTO user(username, name, password,email)
						VALUES (:username, :fname, :password, :email)");

        //Placeholderar og breytur bundnar saman
        $sth->bindParam(':fname', $full_name_from_signup);
        $sth->bindParam(':username', $user_name_from_signup);
        $sth->bindParam(':password', $database_password_hash);
        //$sth->bindParam(':password', $user_password_from_signup);
        $sth->bindParam(':email', $email_from_signup);

        try{
            $sth->execute();
            return true;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }

    }



}
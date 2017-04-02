<?php
/**
 * Created by PhpStorm.
 * User: Eysteinn
 * Date: 29.3.2017
 * Time: 19:09
 */

if (isset($_POST['login'])) {
    $uname_login = trim($_POST['uname']);
    $u_pass = trim($_POST['psw']);
    // use sessionm if the form has been submitted

    // location to redirect on success, stored in a variable
    $redirect = 'http://tsuts.tskoli.is/2t/0807932279/Lokaverkefni/hello.php';
    require 'encryption.php';
}

$sql = 'SELECT * FROM user WHERE username = :uname';
//Preparation
$stmt = $connection->prepare($sql);
try {
    //Executed and user bound to a variable
    $stmt->execute(array(':uname'=>$user_name_from_login));
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row) {
        $database_password_hash = $row[ 'psw' ];
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

if ($database_password_hash == $row['psw']) {
    echo 'This password is OK';
    return true;
}

else
{
    echo 'This password is not okay!';
    return false;
}

if($database_password_hash == $row['psw'])
{
    session_start();
    $_SESSION['authenticated'];
    // get the time the session started
    $_SESSION['start'] = time();
    session_regenerate_id();
    header("Location: $redirect");
}

else {
    // if not verified, prepare error message
    $error = 'Invalid username or password';
}


?>
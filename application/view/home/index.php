<?php

//Headers
$loginUrl = 'http://138.68.150.56/Verkefni6/Login';
$signupUrl = 'http://138.68.150.56/Verkefni6/Signup';

if (isset($_POST['login']))
{
    header('Location: '.$loginUrl);
}

if (isset($_POST['signup']))
{
    header('Location: '.$signupUrl);
}
//Headers end



?>

<div class="container">
    <div class="box">
        <form name="options" method="post">
            <input name="login" type="submit" value="Login" class="Button">
            <input name="signup" type="submit" value="Sign Up" class="Button">
        </form>
    </div>
</div>

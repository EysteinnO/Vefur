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

<div class="container index">
    <div class="box">
        <form name="options" method="post">
            <h3> Welcome </h3>
            <input name="login" type="submit" value="Login" class="pure-button pure-button-active">
            <input name="signup" type="submit" value="Sign Up" class="pure-button pure-button-active">
        </form>
    </div>
</div>

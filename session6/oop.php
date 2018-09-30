<?php 
class User{
        var $username;
    var $password;
    function resgister(){
        echo "<b/> Register user";
    }
    function edit(){
        echo "<b/> Delete user";
    }
    function delete(){
        echo "<b/> Delete user";
    }
}

$user = new User();
$user ->register();
$user ->edit();

class Student extends User{
    function register(){
        echo "<b/> Students Register";
    }
}

?>
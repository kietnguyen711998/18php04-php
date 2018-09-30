<?php 
class User{
    var $name;
    var $password;
    var $phone;
    var $address;
    function Add(){
        echo "<br/> Add User";
    }
    function Edit(){
        echo "<br/> Edit User";
    }
    function Register(){
        echo "<br/> Register User";
    }
    function Login(){
        echo "<br/> Login User";
    }
    function View(){
        echo "<br/> View User";
    }
    function List(){
        echo "<br/> List User";
    }
}

$user = new User();
$user ->Add();
$user ->Edit();
$user ->Register();
$user ->Login();
$user ->View();
$user ->List();

class Customer  extends User{
    var $deliveryaddress;
    var $customerid;
    function Pay(){
        echo "<br/> Customer Pay";
    }
    
    function PurchaseHistory(){
        echo "<br/> Customer PurchaseHistory";
    }
}
$customer = new Customer();
$customer ->Edit();
$customer ->Register();
$customer ->Login();
$customer ->View();
$customer ->Pay();
$customer ->PurchaseHistory();

?>
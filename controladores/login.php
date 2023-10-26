
<?php
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == "EstebanL650" && $password == "1234qwerty"){
        header("location: informe.php");
    }else{
    }
}

require_once "../views/login.view.php";

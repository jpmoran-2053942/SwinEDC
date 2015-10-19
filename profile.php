<?php
/**
 * Created by PhpStorm.
 * User: Akmal
 * Date: 16/10/2015
 * Time: 12:50 PM
 */

$type = $_POST['type'];

if($type == "1"){
    contactdetails();
}else if($type == "2"){
    courseinfo();
}

function contactdetails(){
    $firstname = $_POST['firstn'];
    $lastname = $_POST['lastn'];
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $address = $_POST['addy'];
    $pdesc = $_POST['pdesc'];
    $id = $_POST["id"];

    $conn = @mysqli_connect("fdb14.biz.nf", "1971863_student","swinedc123","1971863_student");
    ​
    if(!$conn){
        die("Cannot connect to database");
    }else{
        $sql = "UPDATE User SET firstname = $firstname, surname = $lastname,username = $username, password = $password, personal = $pdesc WHERE username = 'testu'";
        $result = $conn->query($sql);
        if($result == TRUE){
            echo "Update successful";
        }
    }

}

?>
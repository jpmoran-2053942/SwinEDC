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
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $pdesc = $_POST['pdesc'];

    $result = "Your changes were saved successfully, ";
    $sql = "UPDATE user SET";
    if($firstname != ""){
        $result = $result. " First name - $firstname";
        $sql = $sql." firstname = $firstname";
    }
    if($lastname != ""){
        $result = $result.", Last name - $lastname";
        if($firstname != ""){
            $sql = $sql.", surname = $lastname";
        }else{
            $sql = $sql."surname = $lastname";
        }

    }

    if($username != ""){
        $result = $result. ", User name - $username";
        if($lastname != ""){
        //    $sql = $sql.", username = $username";
        }else{
        //    $sql = $sql."username = $username";
        }
    }

    if($password != ""){
        $result = $result. ", Password - $password";
        if($username != ""){
            $sql = $sql.", password = $password";
        }else{
            $sql = $sql."password = $password";
        }
    }

    if($pdesc != ""){
        $result = $result. ", Description - $pdesc";
        if($password != ""){
            $sql = $sql.", personal = $pdesc";
        }else{
            $sql = $sql."personal = $pdesc";
        }
    }


    $sql = $sql. " WHERE username = 'testu'";

    //echo $sql;

    $conn = @mysqli_connect("fdb14.biz.nf", "1971863_student","swinedc123","1971863_student");
    ​
    if(!$conn){
        die("Something went wrong, please try again later");
    }else{

        $resultq = $conn->query($sql);
        if($resultq == TRUE){
            echo $result;
        }else{
            echo "Something went wrong, please try again later";
        }
    }

}


function courseinfo(){

    $coname = $_POST['pass'];
    $year = $_POST['pdesc'];
    $result = "Your changes were saved successfully ";

    $sql = "UPDATE user SET";
    if($coname != ""){
        $result = $result. ", Course name - $coname";
        $sql = $sql." course = $coname";
    }
    if($year != ""){
        $result = $result. ", Year started - $year";
        $year = $year. " 00:00:00";
        if($year != ""){
            $sql = $sql.", year = $year";
        }else{
            $sql = $sql."year = $year";
        }

    }




    $sql = $sql. " WHERE username = 'testu'";

    //echo $sql;

    $conn = @mysqli_connect("fdb14.biz.nf", "1971863_student","swinedc123","1971863_student");
    ​
    if(!$conn){
        die("Something went wrong, please try again later");
    }else{

        $result = $conn->query($sql);
        if($result == TRUE){
            echo "Update successful";
        }else{
            echo "Something went wrong, please try again later";
        }
    }

}
?>
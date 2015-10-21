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

    $sql = "UPDATE user SET";
    if($firstname != ""){
        $sql = $sql." firstname = $firstname";
    }
    if($lastname != ""){

        if($firstname != ""){
            $sql = $sql.", surname = $lastname";
        }else{
            $sql = $sql."surname = $lastname";
        }

    }

    if($username != ""){
        if($lastname != ""){
        //    $sql = $sql.", username = $username";
        }else{
        //    $sql = $sql."username = $username";
        }
    }

    if($password != ""){
        if($username != ""){
            $sql = $sql.", password = $password";
        }else{
            $sql = $sql."password = $password";
        }
    }

    if($pdesc != ""){
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
        die("Cannot connect to database, please try again later");
    }else{

        $result = $conn->query($sql);
        if($result == TRUE){
            echo "Update successful";
        }
    }

}


function courseinfo(){

    $coname = $_POST['pass'];
    $year = $_POST['pdesc'];

    $sql = "UPDATE user SET";
    if($coname != ""){
        $sql = $sql." course = $coname";
    }
    if(year != ""){

        if(year != ""){
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
        die("Cannot connect to database, try again later");
    }else{

        $result = $conn->query($sql);
        if($result == TRUE){
            echo "Update successful";
        }
    }

}
?>
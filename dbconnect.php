<?php

$conn = @mysqli_connect("fdb14.biz.nf", "1971863_student","swinedc123","1971863_student");

if(!$conn){
	die("Cannot connect to database");
}else{
        echo "Works";

}

?>
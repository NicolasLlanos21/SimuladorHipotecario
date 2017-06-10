<?php
include 'index.php';

class logout{

function __constructor(){
	$this->logout();
}

public function logout(){
session_start();
session_unset();
session_destroy();
ob_start();
header("Location: index.php");
ob_end_flush(); 

//include 'home.php';
exit();
}

}
?>
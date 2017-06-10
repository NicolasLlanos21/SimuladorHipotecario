<?php
include 'logsimulador.php';

class logout{

function __constructor(){
	$this->logout();
}

public function logout(){
session_start();
session_unset();
session_destroy();
ob_start();
header("Location: logsimulador.php");
ob_end_flush(); 

//include 'home.php';
exit();
}

}
?>
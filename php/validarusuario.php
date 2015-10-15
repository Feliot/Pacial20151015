<?php 
session_start();
$dni=$_POST['dni'];
$recordar=$_POST['recordarme'];

	if($recordar=="true")
	{
		setcookie("registro",$dni,  time()+36000 , '/');
		setcookie("registro2",$dni+3,time()+3600, '/');
	}
	$_SESSION['registrado']=$dni;
	$_SESSION['registrado2']=$dni+3;
	$retorno="ingreso";


echo $retorno;
?>
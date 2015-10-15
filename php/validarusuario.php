<?php 
session_start();
$clave=$_POST['clave'];
$correo=$_POST['correo'];
$recordar=$_POST['recordarme'];
	if($recordar=="true")
	{
		setcookie("registro2",$clave,  time()+36000 , '/');
		setcookie("registro",$correo,time()+3600, '/');
	}
	$_SESSION['registrado2']=$clave;
	$_SESSION['registrado']=$correo;
	$retorno="ingreso";

echo $retorno;
?>
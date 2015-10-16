<?php 
session_start();
echo "hola";
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];
	if($recordar=="true")
	{
		setcookie("registro",$correo, time()+3600, '/');
		setcookie("registro2",$clave, time()+36000, '/');	
	}
	$_SESSION['registrado']=$correo;
	$_SESSION['registrado2']=$clave;
	$retorno="ingreso";

echo $retorno;
?>
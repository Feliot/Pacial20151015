<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'alta':
		include("partes/formalta.php");
		break;
	case 'desloguear':
			include("php/deslogearDni.php");
		break;	
	case 'MostarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formVotacion.php");
		break;
    case 'VerEnMapa':
        
        include("partes/formMapa.php");
		break;
	case 'Borrarusuario':
			$usuario = new usuario();
			$usuario->id=$_POST['id'];
			$cantidad=$usuario->Borrarusuario();
			echo $cantidad;

		break;
	case 'Guardarusuario':
            session_start();
			$usuario = new usuario();
			$usuario->correo=$_SESSION['registrado'];
			$usuario->nombre=$_POST['nombre'];
			$usuario->clave=$_SESSION['registrado2'];
			$cantidad=$usuario->Guardarusuario();
			echo $cantidad;

		break;
	case 'Traerusuario':
			$usuario = usuario::TraerUnusuario($_POST['id']);		
			echo json_encode($usuario);

		break;
    case 'guardarMarcadores':
        session_start();
        if(isset($_POST["marcadores"]))
        {
            $filename = "ArchivosTxt/marcadores" . getdate()[0] . ".txt";

            $_SESSION['file'] = $filename;
            $puntos = $_POST["marcadores"];

            $file = fopen($filename, "w");

            foreach ($puntos as $valor)
            {
                $lat =  $valor["lat"];
                $lng =  $valor["lng"];
                $nombre =  $valor["nombre"];
                fwrite($file, $lat.">".$lng.">".$nombre . PHP_EOL);
            }
        fclose($file);

        echo "Marcadores guardados con exito";
        }
        else
            echo "No ingreso marcador/es a guardar";
        break;
	default:
		# code...
		break;
}

 ?>
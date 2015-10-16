<?php
class usuario
{
	public $Id;
 	public $nombre;
  	public $correo;
  	public $clave;

  	public function Borrarusuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL Borrarusuario($this->Id)");
				$consulta->bindValue(':Id',$this->Id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	/*public static function BorrarusuarioPornombre($nombre)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from usuarios 				
				WHERE nombre=:nombre");	
				$consulta->bindValue(':nombre',$nombre, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }*/
	public function Modificarusuario()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				CALL Modificarusuario('$this->Id', '$this->nombre','$this->correo', '$this->clave)");
			return $consulta->execute();

	 }
	
  
	 public function InsertarElusuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
					CALL InsertarElusuario($this->nombre','$this->correo','$this->clave)");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }
	 public function Guardarusuario()
	 {
	 	echo $this->Id;
	 	if($this->Id>0)
	 		{
	 			$this->Modificarusuario();
	 		}else {
	 			$this->InsertarElusuario();
	 		}

	 }


  	public static function TraerTodoLosusuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodoLosusuarios()");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}

	public static function TraerUnusuario($Id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnusuario('$Id')");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;				

			
	}

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->nombre."  ".$this->correo."  ".$this->nombre;
	}

}
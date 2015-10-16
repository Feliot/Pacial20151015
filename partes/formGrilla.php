<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");
	$arrayDeusuarios=usuario::TraerTodoLosusuarios();

 session_start();?>
<!--if(isset($_SESSION['registrado'])){  ?> -->
<script type="text/javascript">
$("#content").css("width", "900px");
</script>

<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>nombre</th><th>correo</th><th>clave</th><th>Ver</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeusuarios as $usuario) {
    $l = '"'.$usuario->nombre. '"'.',"'.$usuario->correo. '"'.',"'.$usuario->clave. '"'.',"'.$usuario->Id. '"';
	echo"<tr>
			<td><a onclick='Editarusuario($usuario->Id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='Borrarusuario($usuario->Id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
			<td>$usuario->nombre</td>
            <td>$usuario->correo</td>
            <td>$usuario->clave</td>
            <td><a onclick='VerEnMapa($l)' class='btn btn-info'>Ver en mapa</a></td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>
      

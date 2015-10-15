<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");
	$arrayDeusuarios=usuario::TraerTodoLosusuarios();

 session_start();
if(isset($_SESSION['registrado'])){  ?>
<script type="text/javascript">
$("#content").css("width", "900px");
</script>

<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>DNI</th><th>Candidato</th><th>Sexo</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Ver</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeusuarios as $usuario) {
    $l = '"'.$usuario->provincia. '"'.',"'.$usuario->localidad. '"'.',"'.$usuario->direccion. '"'.',"'.$usuario->id. '"';
	echo"<tr>
			<td><a onclick='Editarusuario($usuario->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='Borrarusuario($usuario->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
			<td>$usuario->dni</td>
			<td>$usuario->candidato</td>
            <td>$usuario->sexo</td>
            <td>$usuario->direccion</td>
            <td>$usuario->localidad</td>
            <td>$usuario->provincia</td>
            <td><a onclick='VerEnMapa($l)' class='btn btn-info'>Ver en mapa</a></td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>
<?php }else{    echo"<h3>usted No está logeado. </h3>";?>  
  <button onclick="MostarLogin()" class="btn btn-primary btn-lg   '" type="button"><span class="glyphicon glyphicon-home" >&nbsp;</span>Logearme</button>
  <?php  }  ?>       

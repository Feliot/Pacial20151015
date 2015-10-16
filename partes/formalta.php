
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form  class="form-ingreso " onsubmit="Guardarusuario(); return false;">
        <h2 class="form-ingreso-heading">Votar</h2>
        <label for="nombre" class="sr-only" hidden>nombre</label>
                <input type="text" id="nombrealta" class="form-control" placeholder="nombre" required="" autofocus="">
        <label for="correo" class="sr-only" hidden>correo</label>
                <input type="email" id="correoalta" class="form-control" placeholder="correo" required="" autofocus="">
        <label for="clave" class="sr-only" hidden>clave</label>
                <input type="password" id="clavealta" class="form-control" placeholder="clave" required="" autofocus="">
        <!--<select  id="candidato">
          <option value="Candidato1">Candidato 1</option>
          <option value="Candidato2">Candidato 2</option>
          <option value="Candidato3">Candidato 3</option>
        </select> 
        <br>
          <label>
            <input type="radio" Name="sexo" id="sexo" value="M" checked>Masculino
            <input type="radio" Name="sexo" id="sexo" value="F">Femenino
          </label>
        cierro COMENTARIO -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  

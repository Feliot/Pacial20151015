
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<?php 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formLogin" class="container">

      <form  class="form-ingreso " onsubmit="validarLogin();return false;">
        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
        <label for="nombreblb" class="sr-only">nombre</label>
                <!-- <input type="text" id="nombre" class="form-control" placeholder="nombre" required="" autofocus="" value=""> -->
                <input type="email" id="correo" class="form-control" placeholder="correo" required="" autofocus="" value="<?php  if(isset($_COOKIE['registro'])){echo $_COOKIE['registro'];}?>">
        <label for="claveblb" class="sr-only">clave</label>
                <input type="password" id="clave" class="form-control" placeholder="clave" required="" autofocus="" value="<?php  if(isset($_COOKIE['registro2'])){echo $_COOKIE['registro2'];}?>">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordame
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3> <h4>nombre2'".$_SESSION['registrado2']."'</h4>";

  ?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
   <script type="text/javascript">
 MostarBotones();</script>
  <?php  }  ?>
    
  

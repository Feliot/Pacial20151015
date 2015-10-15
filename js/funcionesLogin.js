function validarLogin()
{
		var varclave=$("#clave").val();
		var varcorreo=$("#correo").val();
		var recordar=$("#recordarme").is(':checked');

//$("#sidebar").html("<img src='imagenes/body-bg2.jpg' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"php/validarusuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			clave:varclave,
			correo:varcorreo
		}
	});


	funcionAjax.done(function(retorno){
			if(retorno.trim()=="ingreso"){	
				Mostrar('alta');
				//MostarLogin();
			}
        else
        {
			MostarLogin();
        }
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#sidebar").html(retorno.responseText);	
	});
	
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearnombre.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarBotones();
			MostarLogin();
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
		//$("#sidebar").html("Correcto BOTONES!!!");	
	});
}

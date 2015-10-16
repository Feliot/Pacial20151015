function validarLogin()
{
	var varcorreo=$("#correo").val();
	var varclave=$("#clave").val();
		
	var recordar=$("#recordarme").is(':checked');

alert(varcorreo);
	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar, 
			clave:varclave, 
			correo:varcorreo
		}
	});


	funcionAjax.done(function(retorno){
			if(retorno.trim()=="ingreso"){	
				//Mostrar('alta');
				MostarLogin();
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
		url:"php/deslogearusuario.php",
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

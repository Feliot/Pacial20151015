function Borrarusuario(idParametro)
{
	alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Borrarusuario",
			Id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function Editarusuario(idParametro)
{
    Mostrar('MostrarFormAlta');
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Traerusuario",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		var usuario =JSON.parse(retorno);		
		$("#Id").val(usuario.id);
		$("#nombre").val(usuario.nombre);
        $("#correo").val(usuario.correo);
        $("#clave").val(usuario.clave)
        
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);	
	});
	
}

function VerEnMapa(prov, dire, loc, id)
{
    //alert(prov + dire +  loc);
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    console.log(punto);
    var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"VerEnMapa"
		}
	});
    funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
        $("#punto").val(punto);
        $("#id").val(id);
	Geolocalizacion.Marcador.iniciar();
	Geolocalizacion.Marcador.verMarcador();	
	});
}

function Guardarusuario()
{
        var id = $("#id").val()
		var nombre=$("#nombrealta").val();
        var correo=$("#correoalta").val();
        var clave=$("#clavealta").val();
		//var sexo=$('input:radio[name=sexo]:checked').val();
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"Guardarusuario",
			nombre:nombre,
            correo:correo,
            clave:clave,
            id:id
		}
	});
	funcionAjax.done(function(retorno){
		//alert(retorno);
			deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		//alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}

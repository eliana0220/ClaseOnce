function GuardarCD()
{
		var id=$("#idCD").val();
		var cantante=$("#cantante").val();
		var titulo=$("#titulo").val();
		var anio=$("#anio").val();
		alert("llegue al ajax");
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Insertar",
			id:id,
			cantante:cantante,
			titulo:titulo,
			anio:anio	
		}
	});
	funcionAjax.done(function(retorno){
		alert("done ajax");
		alert(retorno);
			//Mostrar("MostrarGrilla");
		MostrarGrilla();
		$("#informe").html("cantidad de agregados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});
}

function MostrarGrilla(){
	
    var pagina = "./nexo.php";

	$.ajax({
        type: 'POST',
        url: pagina,
		data : { accion : "mostrarGrilla"},
        dataType: "html",
        async: true
    } 
   //success: function (html) {
    //          $("#grillaMascotas").html(grilla);
    //      }
    )
	.done(function (grilla) {
		//alert(grilla);
		$("#grillaCelulares").html(grilla);
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
}
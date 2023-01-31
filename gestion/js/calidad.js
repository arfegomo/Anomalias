$(document).ready(function(){

	$('#producto-no').hide(); //oculto mediante id
	

	$("select[name=idgrupo]").change(function(){
		
		var grupo = $('select[name=idgrupo]').val();

		  $.get('/productosgrupos',{grupo:grupo}, function(productosgrupos){
		  		
		  		$('#productos').empty();
		  		$('#proveedores').empty();
		  		
		  		$('#productos').append("<option value=''>Seleccione un producto...</option>");
		  		 
		  		//console.log(productosgrupos);

		  		$.each(productosgrupos, function(index,value){
		  			$('#productos').append("<option value='" + index + "'>" + value + "</option>");
		  		});
		  });


		  $.get('/gruposanomalias',{grupo:grupo}, function(gruposanomalias){
		  		$('#contenedor').empty();
		  		//console.log(gruposanomalias);
		  		$.each(gruposanomalias, function(index,value){
		  			$('#contenedor').append('<input type="checkbox" name="anomalias[]" value="'+ index +'" /> ' + value + '<br />');
		  		});
		  });

	});

	$("select[name=productos]").change(function(){
			
		var proveedor = $('select[name=productos]').val();

		  $.get('/proveedoresproductos',{proveedor:proveedor}, function(proveedoresproductos){
		  		$('#proveedores').empty();
		  		$('#proveedores').append("<option value=''>Seleccione un proveedor...</option>");
		  		
		  		$.each(proveedoresproductos, function(index,value){
		  			$('#proveedores').append("<option value='" + index + "'>" + value + "</option>");
		  		});
		  });
	});

	$("select[name=tipoincidente]").change(function(){

		var incidente = $('select[name=tipoincidente]').val();

		if(incidente == 2){
			$('#producto-no').show(); //muestro mediante id	
		}else{
			$('#producto-no').hide(); //oculto mediante id	
		}
		

	});
	
});

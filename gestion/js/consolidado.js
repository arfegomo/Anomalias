$(document).ready(function(){

	$("select[name=idproveedor]").change(function(){
			
		var proveedor = $('select[name=idproveedor]').val();

		  $.get('/proveedoresconsolidado',{proveedor:proveedor}, function(proveedoresconsolidado){
		  		console.log(proveedoresconsolidado);
		  		//$('#idproveedor').empty();
		  			
		  			$("#Table").append(
		  			'<thead>'+
					'<tr>'+
					'<th rowspan="2">Consolidado</th>'+
					'<th colspan="6">Mes</th>'+ 
					'</tr>'+     
		  			'</thead>'
    				);

		  			$.map(proveedoresconsolidado, function(index,value){
		  			$('#Table').append(
		  				
		  				"<td>'" + value.fecha + "'</td>"

		  				);
		  		});



		  });
	});
});

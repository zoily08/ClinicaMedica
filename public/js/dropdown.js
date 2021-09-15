$("#idsintomas").change(function(event){
	$.get("enfermedad/"+event.target.value+"",function(response, sintomas){
		console.log(response);

		for(i=0; i<response.length; i++){
			$("#idenfermedad").append("<option value='"+response[i].id+"'>"+response[i].enfermedad+"</option>");
		}

	});
});
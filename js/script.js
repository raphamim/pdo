function appendDatas(element){
$('table').append('<tr class="'+element.id+'"><td>'+element.id+'</td><td>'+element.title+'</td><td>'+(element.duration.substring(3,8))+'</td><td>'+element.first_name+'</td><td><a href="#"><img src="img/modify.png"></a></td><td><img id="'+element.id+'" class="del" src="img/delete.png"></td></tr>');
}

function getDatas() {
	$.ajax({
		url: "ajax/ajax.php",
		data: {
			function: 'getDatas',
		},
		dataType: 'json'
	}).done(function(data){
		$.each(data, function(index, element){
			
			appendDatas(element);
		});
		
	}).fail(function(error){
		console.log('fail');
		console.log(error);
	});
}

function sendDatas() {
	$.ajax({
		url: "ajax/send.php",
		data: {
			title: $('#title').val(),
			minute: $('#minute').val(),
			seconde: $('#seconde').val(),
			artist: $('#artist').val(),
			function: 'sendDatas'
		},
		method: "POST"
	}).done(function(data){
		console.log(data);
		document.location='crud.php';
	}).fail(function(error){
		console.log('erreur envoi');
		
	});
}

function deleteDatas() {
	$.ajax({
		url: "ajax/delete.php",
		data: {
			id: $('#temp').html(),
			function: 'deleteDatas',
		},
		method: "POST"
	}).done(function(data){
		console.log(data);
		refreshDatas();
	}).fail(function(error){
		
		
	});
}

function refreshDatas() {
	document.location='crud.php';
}

function clickPlus() {
	$("#plus").on("click", function(){
		$('#form-add').toggle();
	});
}
getDatas();
$(document).ready(function() {


	//OUVERTURE DU CHAMPS DE REMPLISSAGE DES DONNEES
	clickPlus();
	// ENVOIE DES DONNEES 
	$("#send-datas").on("click", function(){
		sendDatas();
	});
	// CLIQUE POUR SUPPRIMER
	 $(".del").on("click", function(){
	 	var idDel = $(this).attr('id');
	 	console.log(idDel);
	 	var confirmDl = prompt("Veuillez taper 'supprimer' pour supprimer défénitivement");
	 	$('body').append('<p id="temp">'+idDel+'</p>');
	 	if (confirmDl == "s") {
			deleteDatas();
			$('#temp').remove();
	 	}		
	 });
});


























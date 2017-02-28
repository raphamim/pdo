function appendDatas(element){
$('table').append('<tr class="'+element.id+'"><td>'+element.id+'</td><td id="title'+element.id+'">'+element.title+'</td><td>'+(element.duration.substring(3,8))+'</td><td>'+element.first_name+'</td><td><a href="#"><img id="'+element.id+'" class ="upd" src="img/modify.png"></a></td><td><img id="'+element.id+'" class="del" src="img/delete.png"></td></tr>');

}

//recuperer tout les données pour afficher dans le tableau
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

//fonction pour récuperer la liste d'artistes
function getDatasLines() {
	$.ajax({
		url: "ajax/list.php",
		data: {
			function: 'getDatasLines',
		},
		dataType: 'json'
	}).done(function(data){
		$.each(data, function(index, element){
			$('#artist-upd').append('<option value="'+element.first_name+'">'+element.first_name+'</option>');
			
		});
		
	}).fail(function(error){
		console.log('fail');
	});
}

//fonction pour envoyer des données
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
		refreshDatas("addLinesConfirm");
	}).fail(function(error){
		console.log('erreur envoi');
		
	});
}

//fonction pour modifer des données
function updateDatas() {
	$.ajax({
		url: "ajax/update.php",
		data: {
			id: $('#temp').html(),
			title: $('#title-upd').val(),
			minute: $('#minute-upd').val(),
			seconde: $('#seconde-upd').val(),
			artist: $('#artist-upd').val(),
			function: 'updateDatas'
		},
		method: "POST"
	}).done(function(data){

		 console.log(data);
		 refreshDatas("updateLines");
	}).fail(function(error){
		console.log('erreur de modification');
		
	});
}

//fonction pour supprimer des données
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
		refreshDatas("deleteLines");
	}).fail(function(error){
		
		
	});
}

function refreshDatas(action) {
	actionDone(action)
	 
	setTimeout(function reload(){
		document.location='crud.php';
	}, 2000);
}

function clickPlus() {
	$("#plus").on("click", function(){
		$('#form-add').toggle();
	});
}

function actionDone(action){
	if (action == "addLinesConfirm") {
		var p = "La ligne a bien été ajouté";
	} else if (action == "deleteLines") {
		var p = "La ligne a bien été supprimé";
	} else if (action == "updateLines") {
		var p = "La ligne a bien été modifié";
	}
	$('#add').append('<p id="'+action+'" class="done">'+p+'</p>');

	$('#'+action).animate({
		opacity: 0
	}, 3000);
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
	 	var confirmDl = prompt("Veuillez taper 'supprimer' pour supprimer défénitivement");
	 	$('body').append('<p id="temp">'+idDel+'</p>');
	 	if (confirmDl == "supprimer") {
			deleteDatas();
			$('#temp').remove();
	 	}		
	});

	//CLIQUE SUR LE BOUTON MODIF	
	 $(".upd").on("click", function(){
	 	getDatasLines();
	 	var idUpd = $(this).attr('id');
	 	

	 	// console.log($('#title'+idUpd).html());
	 	//PLACEHOLDER DU TITRE SUR LEQUEL ON A CLIQUE
	 	$('#title-upd').attr('placeholder', $('#title'+idUpd).html());

	 	$('#form-upd').show();

	 	

	 	//ENVOIE DE L'UPDATE
		$("#send-upd").on("click", function(){
			$('body').append('<p id="temp">'+idUpd+'</p>');
			
				updateDatas();
			$('#temp').remove();	
		});
		// ON VIDE idUpd POUR EVITER LES DOUBLONS
		 $(".upd").on("click", function(){
		 		idUpd = null;
			 });
		//FERMER LA DIV MODIF 
		$("#hide-upd").on("click", function(){
			idUpd = null;
			$('#form-upd').hide();	
		});	
			
	 });

	 
});


	























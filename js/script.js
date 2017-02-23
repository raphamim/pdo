function appendDatas(element){
$('table').append('<tr id="'+element.id+'"><td>'+element.id+'</td><td>'+element.title+'</td><td>'+(element.duration.substring(3,8))+'</td><td>'+element.first_name+'</td><td><a href="#"><img src="img/modify.png"></a></td><td><a href="#"><img src="img/delete.png"></a></td></tr>');
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
			duration: $('#duration').val(),
			artist: $('#artist').val(),
			function: 'sendDatas'
		},
		method: "POST"
	}).done(function(data){
		console.log(data);
		
	}).fail(function(error){
		console.log('erreur envoi');
		
	});
}



function clickPlus() {
	$("#plus").on("click", function(){
		$('#form-add').toggle();
	});
}

$(document).ready(function() {


	getDatas();
	clickPlus();

	$("#send-datas").on("click", function(){
		sendDatas();
	});
});


























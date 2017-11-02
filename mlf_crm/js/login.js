$(function(){

	$('#login').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();

		$.ajax({
			url:'webservices/ajax_authentication.php',
			data:'username='+username+'&password='+password+'&action=doLogin',
			beforeSend:function(){

			},
			success:function( responseData ){
				if(responseData == 1){
					window.location = 'viewEvents.php';
				}else{
					alert('Invalid username or password!!!');
				}
			},
			complete:function(){

			}
		});
	});
});
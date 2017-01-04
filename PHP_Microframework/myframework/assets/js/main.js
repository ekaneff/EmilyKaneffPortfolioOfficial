$(function () {
  $('[data-toggle="tooltip"]').tooltip();

	$('[data-toggle="popover"]').popover();

	$('.popover-dismiss').popover({
	  trigger: 'focus'
	});

   
 //   $("#login").click(function(e){
 //   		e.preventDefault();

	// 	$.ajax({
	// 		method: "POST",
	// 		url: "/auth/login",
	// 		data: {username: $("#username").val(), password: $("#password").val()}
	// 	})
	// 	.done(function(msg){
	// 		alert(msg);
	// 		$("#myModal").modal('toggle');
	// 	});
	// });
   
});


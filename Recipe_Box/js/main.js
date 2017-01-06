(function($){

	// ------------- MODAL ------------ //
	$('.modalClick').on('click', function(e){
        e.preventDefault();
        $('#overlay')
            .fadeIn()
            .find('#modal')
            .fadeIn();
    });
    
    $('.close').on('click', function(e){
        e.preventDefault();
        $('#overlay')
        .fadeOut()
        .find('#modal')
        .fadeOut();
    });


    // ------------- SIGN IN ------------ //

    $('#signin').click(function(e){
	e.preventDefault();
	var user = $("#user").val();
	var pass = $("#pass").val();

	$.ajax({
		url: "xhr/login.php",
		type: "post",
		dataType: "json",
		data: {
			username: user,
			password: pass
		},
		success:function(response){
			console.log("test user");
			if(response.error){
				alert(response.error);
			} else {
				window.location.assign("dashboard.html");
			} //closes if else
		}//closes success
	});//closes ajax
});//closes button

// ------------- REGISTER ------------ //

$("#register").click(function(e){
	e.preventDefault();
	var firstname = $("#firstname").val(),
		lastname = $("#lastname").val(),
		username = $("#username").val(),
		email = $("#email").val(),
		password = $("#password").val();

	$.ajax({
		url: "xhr/register.php",
		type: "post",
		dataType: "json",
		data: {
			firstname : firstname,
			lastname: lastname,
			username: username,
			email: email,
			password: password
		},
		success:function(response){
			console.log("test user");
			if(response.error){
				alert(response.error);
			} else {
				window.location.assign("dashboard.html");
			}
		}
	});
});

// ------------- FEATURED RECIPES ------------ //

var featuredRecipes = [
		{	
			"recipeID" : 0,
			"title" : "Guacamole",
			"description" : "You can make this avocado salad smooth or chunky depending on your tastes",
			"category" : "Appetizers",
			"starRating" : 5
		},
		{
			"recipeID" : 1,
			"title" : "Spaghetti Tacos",
			"description" : "My kids wanted these after seeing them on one of their favorite TV shows.",
			"category" : "Main Dish",
			"starRating" : 4.5
		},
		{
			"recipeID" : 2,
			"title" : "Baked Teriyaki Chicken",
			"description" : "A much requested chicken recipe! Easy to double for a large group. Delicious!",
			"category" : "Main Dish",
			"starRating" : 4.5
		},
		{
			"recipeID" : 3,
			"title" : "Fresh Blueberry Cake",
			"description" : "Light and cool with a touch of lemon to brighten up your afternoon.",
			"category" : "Dessert",
			"starRating" : 4.5
		},
		{
			"recipeID" : 4,
			"title" : "Super Smoothie",
			"description" : "This is a fun and easy recipe for summer fun.",
			"category" : "Drinks",
			"starRating" : 4
		}
	];

	var count = 0;

	function showStuff(id) {
		var content = '';
		var section = $('#featured section');
		var image = '';
		var div = $('#featured .image');

		image += '<img src="../assets/images/featured' + id +'.jpg" />';
		content += '<h3>' + featuredRecipes[id].title + '</h3>';
		content += '<p>' + featuredRecipes[id].description + '</p>';
		content += '<p><span>Category:</span> ' + featuredRecipes[id].category + '</p>';
		content += '<p><span>Rating:</span> ' + featuredRecipes[id].starRating + '</p>';

		section.html(content);
		div.html(image);
	}

	showStuff(count);

	$('#next').on('click', function(e) {
		e.preventDefault();
		if (count < 4) {
			count++;
			showStuff(count);
		} else if (count >= 4) {
			count = 0;
			showStuff(count);
		} else {
			console.log('something went wrong');
		}
	});
	$('#prev').on('click', function(e) {
		e.preventDefault();
		if (count == 0) {
			count = 4;
			showStuff(count);
			count--;
		} else if (count <= 4) {
			count--;
			showStuff(count);
		} else {
			console.log('something went wrong');
		}
	});

// -------------- DISPLAY USERNAME ---------------//

$.getJSON("xhr/check_login.php", function(data){
	console.log(data);
	$.each(data, function(key, val){
		console.log(val.first_name);
		$("#dashboardHead h1").html("Welcome, " + val.first_name);
	});
});


// -------------- LOG OUT -------------- //

$("#logout").click(function(e){
	e.preventDefault();
	$.get("xhr/logout.php", function(){
		window.location.assign("index.html");
	});
});

// ----------------- NEW PROJECTS ------------//

$("#recpForm").hide()
/*
$.getJSON("xhr/get_projects.php", function(data){
	console.log(data);
	$.each(data, function(key, value){
		console.log(value.length);
		for(var i=0; i < value.length; i++){
			if (value[i].projectName != undefined){
				var content = '';

				content += '<article>'
								
				content +='<h3>' + value[i].projectName + '</h3>';
				content += '<p>' + value[i].projectDescription + '<p>';
				content += '<p><span>Cook Time:</span> ' + value[i].dueDate + '<p>';
				content += '<p><span>Rating:</span> ' + value[i].status + ' / 5<p>';
				content += '</article';

				$('#recipes .container').append(content);
			} 
		}
	});
});*/

$("#newRecp").click(function(e){
	e.preventDefault();
	console.log('this is working');
	$("#recpForm").slideToggle();
});


$('#addbutton').on('click', function(e){
	e.preventDefault();
	var projName = $('#projectName').val(),
		projDesc = $('#projectDescription').val(),
		projDue = $('#projectDueDate').val(),
		status = $('input[name = "status"]:checked').prop("id");

	$.ajax({
		url: "xhr/new_project.php",
		type: "post",
		dataType: "json",
		data: {
			projectName : projName,
			projectDescription: projDesc,
			dueDate: projDue,
			status: status
		},
		success: function(response) {
			console.log('Testing for success');

			if(response.error){
				alert(response.error);
			} else {
				window.location.assign('myRecipes.html');
				$.getJSON("xhr/get_projects.php", function(data){
					console.log(data);
					$.each(data, function(key, value){
						console.log(value.projectName);
						for(var i=0; i < value.length; i++){
							if (value[i].projectName != undefined){
								var content = '';

								content += '<article>'
								
								content +='<h3>' + value[i].projectName + '</h3>';
								content += '<p>' + value[i].projectDescription + '<p>';
								content += '<p><span>Cook Time:</span> ' + value[i].dueDate + ' minutes<p>';
								content += '<p><span>Rating:</span> ' + value[i].status + ' / 5<p>';
								content += '</article>';

								$('#recipes .container').append(content);
							}
						}
					});
				});
			}
		}
	});	

});

// ----- FILL PROJECTS ----- //

var projects = function (){
	$.ajax({
		url:"xhr/get_projects.php",
		type: "get",
		dataType: "json",
		success: function(response) {
			if(response.error){
				console.log(response.error);
			} else {
				for (var i=0, j=response.projects.length; i < j; i++) {
					var result = response.projects[i];

					$("#recipes .container").append(
						'<article>' + 
						'<input class="projectid" type="hidden" value="' + result.id + '">' +
						'<h3>' + result.projectName + '</h3>' + 
						'<p>' + result.projectDescription + '</p>' +
						'<p><span>Cook Time: </span>' + result.dueDate + '</p>' + 
						'<p><span>Rating: </span>' + result.status + '</p>' +
						'<button class="editbtn">Edit</button>' + '<button class="deletebtn">Delete</button>' + 
						'</article>')
				}
			}

			$(".deletebtn").click(function(e){
				e.preventDefault();
				var pid = $(this).parent().find(".projectid").val();

				console.log("test delete");

				$.ajax({
					url : 'xhr/delete_project.php',
					data: {
						projectID: pid,
					},
					type: 'POST',
					dataType: "json",
					success: function(response){
						console.log("testing");

						if (response.error) {
							alert(response.error)
						} else {
							window.location.assign("myRecipes.html");
						}
					}
				});
			});

			$(".editbtn").click(function(e){
				
			});
		} 
	});
};

projects();

// ----- EDIT ACCOUNT ----- //

var updateAcct = function(){
	console.log("pulls user info");
	$.ajax({
		url: 'xhr/get_user.php',
		type: 'get',
		dataType: 'json',
		success: function(response){
			if(response.error){
				console.log(response.error);
			} else {
				var updatefirstname = response.user.first_name;
				var updatelastname = response.user.last_name;
				var updateemail = response.user.email;

				$('#updatefirstname').val(updatefirstname);
				$('#updatelastname').val(updatelastname);
				$('#updateemail').val(updateemail);
			}
		}
	});

	$('#updateAcctBtn').on('click', function(e){
		e.preventDefault();
		var changedFirstName = $('#updatefirstname').val();
		var changedLastName = $('#updatelastname').val();
		var changedEmail = $('#updateemail').val();

		$.ajax({
			url: 'xhr/update_user.php',
			type: 'post',
			dataType: 'json',
			data: {
				first_name: changedFirstName,
				last_name: changedLastName,
				email: changedEmail
			},
			success: function(response){
				if(response.error) {
					console.log(response.error);
				} else {
					alert("Your account has been updated!");
				}
			}
		});
	});
}

updateAcct();


})(jQuery);
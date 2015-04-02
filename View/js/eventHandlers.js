$(document).ready(function() {	
	
	redirectTime = 1000;	
	
	checkLoggedInCookie();

	verifyUser();
	
	//window.alert("boom");
	
	setOptions();
	
	initializeModals();	
	
	//window.alert("clap");

	$("#passwordSubmit").click(function() {

		var email = $('#emailFP').val();

		var password = $('#passwordFP').val();

		var passwordConfirm = $('#passwordConfirmFP').val();

		if ((email !== '') && (password !== '') && (passwordConfirm !== '')) {

			$('#FPStatus').html("Waiting for Server...");

			forgotPasswordRequest(email, password, passwordConfirm).success(function(data) {

				$('#FPStatus').html(data);

			}).error(function(xhr, textStatus, errorThrown) {

				$('#FPStatus').html(textStatus);

			});

		}//end if
		else {

			$('#FPStatus').html("Please enter all fields!");

		} //end else

	});
	//end password reset submit handler

	$("#loginSubmit").click(function() {

		var email = $('#emailLogin').val();

		var password = $('#passwordLogin').val();

		if ((email !== '') && (password !== '')) {

			$('#loginStatus').html("Waiting for Server...");

			logIn(email, password).success(function(data) {

				$('#loginStatus').html(data);

				if (data.indexOf("Welcome") !== -1) {

					document.cookie = "loggedIn=1";
					
					setTimeout(function() {
						window.location.href = "index.html";
						//will redirect to your blog page (an ex: blog.html)
					}, redirectTime);
					//will call the function after 2 secs

				}

			}).error(function(xhr, textStatus, errorThrown) {

				$('#loginStatus').html(textStatus);

			});

		}//end if
		else {

			$('#loginStatus').html("Please enter all fields!");

		} //end else

	});
	//end password reset submit handler

	$("#registerSubmit").click(function() {

		var email = $('#emailRegister').val();

		if ((email !== '')) {
			
			$('#registerSubmit').prop("disabled", true);

			$('#registerStatus').html("Waiting for Server...");

			registerUserRequest(email).success(function(data) {
				
				$('#registerSubmit').prop("disabled", false);

				$('#registerStatus').html(data);

				if (data == 'a registration email has been sent!') {					
					
					setTimeout(function() {
						window.location.href = "index.html";
						//will redirect to your blog page (an ex: blog.html)
					}, redirectTime);
					//will call the function after 2 secs

				}

			}).error(function(xhr, textStatus, errorThrown) {
				
				$('#registerSubmit').prop("disabled", false);

				$('#registerStatus').html(textStatus);

			});

		}//end if
		else {

			$('#registerStatus').html("Please enter all fields!");

		} //end else
	});

	$('#createAcctSubmit').click(function() {

		//.alert("SWAGNESS");

		email = $('#emailBox').val();

		code = $('#codeBox').val();

		//window.alert(code);

		//window.alert(email);

		firstName = $('#fName').val();

		//window.alert(firstName);

		lastName = $('#lName').val();

		//window.alert(lastName);

		password = $('#pw').val();

		//window.alert(password);

		passwordConfirmed = $('#pwc').val();

		//window.alert(passwordConfirmed);

		schedule = $('#schedule').val();

		//window.alert(schedule);

		//window.alert(email + "  " + code + "  " + password + "  " + passwordConfirmed + "  " + firstName + "  " + lastName + "  " + schedule);

		if ((email == '') || (firstName == '') || (lastName == '') || (password == '') || (passwordConfirmed == '') || (schedule == '')) {

			$('#createAcctStatus').html('Please fill out all fields!');

		} else if (code == '' || code == undefined) {

			window.location.href = "index.html";

		} else {

			$('#createAcctStatus').html('Waiting on Server...');

			createUser(email, code, password, passwordConfirmed, firstName, lastName, schedule).success(function(data) {

				//window.alert(data);

				$('#createAcctStatus').html(data);

				if (data.indexOf('success')){

					
					setTimeout(function() {
						window.location.href = "index.html";
						//will redirect to your blog page (an ex: blog.html)
					}, redirectTime);
					//will call the function after 2 secs.

				}

			}).error(function(xhr, textStatus, errorThrown) {
				//window.alert("SWAG1");

				$('#createAcctStatus').html(textStatus);

			});

			//window.alert("SWAG");

		}

	});

	$('#logOut').click(function() {

		$('#logOutStatus').html("Waiting on Server...");

		logOut().success(function(data) {

			$('#logOutStatus').html(data);

			document.cookie = "loggedIn=0";
			
			setTimeout(function() {
						window.location.href = "index.html";
						//will redirect to your blog page (an ex: blog.html)
					}, redirectTime);
					//will call the function after 2 secs
			

		}).error(function(xhr, textStatus, errorThrown) {

			$('#logOutStatus').html(textStatus);

		});

	});

	$("#SearchButton").click(function() {

		var searchQuery = $('#search').val();

		searchListings(searchQuery).success(function(data) {
			parseListingResults(data);

		}).error(function(xhr, textStatus, errorThrown) {

			parseListingResults(textStatus);

		});

	});

	$('form[name=newListing]').submit(function() {

		var price = this.elements.namedItem("price").value;
		var isNegotiable = this.elements.namedItem("isNegotiable").value;
		var description = this.elements.namedItem("description").value;
		var ISBN = this.elements.namedItem("isbn").value;
		var title = this.elements.namedItem("title").value;
		var subject = this.elements.namedItem("subject").value;
		var author = this.elements.namedItem("author").value;
		var publisher = this.elements.namedItem("publisher").value;

		ISBN = ISBN.replace(/-/g, "");

		ISBN = parseInt(ISBN);

		price = price.replace("$", "");

		price = parseFloat(price);

		window.alert(ISBN);
		window.alert(price);

		if (isNaN(ISBN) && isNaN(price)) {

			ISBN = '';
			price = '';

		} else if (isNaN(ISBN)) {

			ISBN = '';

		} else if (isNaN(price)) {

			price = '';

		}

		if (!price || !isNegotiable || !ISBN || !title || !subject || !author || !publisher) {

			$('#createListingStatus').html("Please complete all fields!");

		} else {

			if (!description) {

				description = "";

			}

			createListing(ISBN, title, subject, author, publisher, price, isNegotiable, description).success(function(data) {

				$('#createListingStatus').html(data);
				
				setTimeout(function() {
						window.location.href = "index.html";
						//will redirect to your blog page (an ex: blog.html)
					}, redirectTime);
					//will call the function after 2 secs
				

			}).error(function(xhr, textStatus, errorThrown) {

				$('#createListingStatus').html(textStatus);

			});

		}

		return false;

	});
	
	$("#deleteAcct").click(function() {	
		
		//window.alert("SWAG");	

		deleteUser().success(function(data) {
			
			//window.alert("SWAG1");
			
			$('#AccountStatus').html(data);
			
			document.cookie = "loggedIn=0";
			
			setTimeout(function() {
						window.location.href = "index.html";
						//will redirect to your blog page (an ex: blog.html)
					}, redirectTime);
					//will call the function after 2 secs

		}).error(function(xhr, textStatus, errorThrown) {
			
			//window.alert("SWAG2");

			$('#AccountStatus').html(textStatus);

		});

	});
	
	$('form[name=editSchedule]').submit(function() {

		//window.alert("BOOMSWAGNESS");

		var schedule = this.elements.namedItem("newSchedule").value;
		
		if(schedule == ''){
			
			$('#AccountStatus').html("Please fill out the schedule before submitting!");
			
		}
		else{
			
			editUser(schedule).success(function(data) {

				$('#AccountStatus').html(data);
				
				setTimeout(function() {
						window.location.href = "index.html";
						//will redirect to your blog page (an ex: blog.html)
					}, redirectTime);
					//will call the function after 2 secs
				

			}).error(function(xhr, textStatus, errorThrown) {

				$('#AccountStatus').html(textStatus);

			});
			
		}

		return false;

	});
	

});
//end document ready

//HELPER FUNCTIONS. will put in model.js folder later

function parseListingResults(someData) {

	$("#listingContainer").empty();

	var myJSON = IsJsonString(someData);

	if (!myJSON) {

		$("#listingContainer").append("<p> " + someData + " </p>");

	} else {

		for (var i = 0; i < myJSON.length; i++) {

			var listing = "<div class = 'listing' id = 'listingNumber" + (i + 1) + "'>" + "<p class = listingID>" + myJSON[i]["listingID"] + "</p>" + "<p class = price>" + myJSON[i]["price"] + "</p>" + "<p class = isNegotiable>" + myJSON[i]["isNegotiable"] + "</p>" + "<p class = description>" + myJSON[i]["description"] + "</p>" + "<p class = ISBN>" + myJSON[i]["ISBN"] + "</p>" + "<p class = title>" + myJSON[i]["title"] + "</p>" + "<p class = author>" + myJSON[i]["author"] + "</p>" + "<p class = publisher>" + myJSON[i]["publisher"] + "</p>" + "<p class = uscbEmail>" + myJSON[i]["uscbEmail"] + "</p>" + "<p class = fName>" + myJSON[i]["fName"] + "</p>" + "<p class = lName>" + myJSON[i]["lName"] + "</p>" + "<p class = schedule>" + myJSON[i]["schedule"] + "</p>" + "</div>";

			$('#listingContainer').append(listing);

		} // end for

	} // end else

}

function IsJsonString(str) {
	try {

		var a = JSON.parse(str);

	} catch (e) {

		return false;

	}
	return a;
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ')
		c = c.substring(1);
		if (c.indexOf(name) == 0)
			return c.substring(name.length, c.length);
	}
	return "";
}

function checkLoggedInCookie() {
	var status = getCookie("loggedIn");
	if (status == "" || status == undefined) {
		document.cookie = "loggedIn=0";
	} else {
		return;
	}
}

function verifyUser() {

	var path = document.location.pathname;

	var filename = path.substring(path.lastIndexOf('/') + 1);

	if (filename == 'create_listing.html' || filename == 'editAccount.html' || filename == 'editListings.html') {

		if (getCookie("loggedIn") == 0 || getCookie("loggedIn") == undefined) {

			window.alert("You must log in to view this page");

			window.location.href = "index.html";
		}

	}

}

function setOptions(){
	
	//window.alert("SWAG");
	
	var isLoggedIn = getCookie("loggedIn");
	
	//window.alert(isLoggedIn);
	
	$('#userOptions').empty();
	
	if(isLoggedIn == 1){
		
	//	window.alert("!");
		
		var nav =  '<li id = "sell"><a href="create_listing.html">Sell</a></li><li id = "settings" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Account Settings <span class="caret"></span></a><ul class="dropdown-menu" role="menu"><li><a href="editAccount.html">Edit Schedule</a></li><li><a href="editListings.html">Your Listings</a></li></ul><li><a id = "logOut" href="#logout-modal" data-toggle="modal" data-target="#logout-modal">Log Out</a></li></li>';
            
            $('#userOptions').append(nav);
		
	}
	else{
		
		//window.alert("???");
		
		var nav = '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register/Login <span class="caret"></span></a><ul class="dropdown-menu" role="menu"><li><a href="#register-modal" data-toggle="modal" data-target="#register-modal">Register</a></li><li><a href="#login-modal" data-toggle="modal" data-target="#login-modal">Log In</a></li><li><a href="#password-modal" data-toggle="modal" data-target="#password-modal">Forgot Password</a></li></ul></li>';
            
            $('#userOptions').append(nav);
	}
	
	
}

function initializeModals(){
	
	$("#modalList").load("modals.html");
	
}


//variable dependencies

var connectionString = 'http://localhost:8080/uscbtextbookexchange';


//GENERAL AJAX FUNCTIONS

//works and verified BG 3/28/15
function searchListings(searchQuery){
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/searchListings.php',
  		
  		//the data you are passing the request
  		data: {query : searchQuery},
  		
  		//the default method is get
  		method: 'GET',
  		
  		//if the call is a success
  		success: function(data){
  			
  			//return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			 //return textStatus;
  			 
       }
	});
	
	
}

//works and verified BG 3/28/15
function registerUserRequest(userEmail){
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/verifyEmailP1.php',
  		
  		//the data you are passing the request
  		data: {email : userEmail},
  		
  		//the default method is get
  		method: 'GET',
  		
  		//if the call is a success
  		success: function(data){
  			
  			//return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			//return textStatus;
  			 
       }
	});
	
	}


//USER AJAX FUNCTIONS


//works and verified BG 3/28/15. 
//Jon, you might want to store the user stuff in cookies  someplace so you have a reference to this stuff between pages
function logIn(userEmail, userPassword){
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/loginout.php',
  		
  		//the data you are passing the request
  		data: {email : userEmail, password : userPassword},
  		
  		//the default method is get
  		method: 'POST',
  		
  		//if the call is a success
  		success: function(data){
  			
  		//	return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
	
}

//works and verified BG 3/28/15
function logOut(){
	
	var logoutStatus = 1;
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/loginout.php',
  		
  		//the data you are passing the request
  		data: {logout : logoutStatus},
  		
  		//the default method is get
  		method: 'GET',
  		
  		//if the call is a success
  		success: function(data){
  			
  			return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			 return textStatus;
  			 
       }
	});
	
}

//works and verified BG 3/28/15
function forgotPasswordRequest(userEmail, newPassword, confirmedNewPassword){
	
	 return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/forgotPassword.php',
  		
  		//the data you are passing the request
  		data: {email : userEmail, newPass : newPassword, confirmPass : confirmedNewPassword},
  		
  		//the default method is get
  		method: 'POST',
  		
  		//if the call is a success
  		success: function(data){
  			
  		//	return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
	
}

//works and verified BG 3/28/15
function createUser(userEmail, emailHash, newPassword, confirmedNewPassword, firstName, lastName, userSchedule){
	
	 return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/createUser.php',
  		
  		//the data you are passing the request
  		data: {email : userEmail, hash : emailHash, pw : newPassword, pwc : confirmedNewPassword, fName : firstName, lName : lastName, schedule : userSchedule},
  		
  		//the default method is get
  		method: 'POST',
  		
  		//if the call is a success
  		success: function(data){
  			
  			//return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
	
	
}

//works and verified BG 3/28/2015
function editUser(newSchedule){
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/editUser.php',
  		
  		//the data you are passing the request
  		data: {schedule : newSchedule},
  		
  		//the default method is get
  		method: 'POST',
  		
  		//if the call is a success
  		success: function(data){
  			
  			//return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
}

//works and verified BG 3/28/2015
function deleteUser(){
	
	var deleteUserStatus = 1;
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/deleteUser.php',
  		
  		//the data you are passing the request
  		data: {deleteUser : deleteUserStatus},
  		
  		//the default method is get
  		method: 'POST',
  		
  		//if the call is a success
  		success: function(data){
  			
  		//	return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
	
	
	
}


//LISTING AJAX FUNCTIONS

//works and verified BG 3/28/2015
function createListing(ISBN, title, subject, author, publisher, listingPrice, listingIsNegotiable, listingDescription){
	
	if (listingDescription === undefined) {
		
    	listingDescription = "";
    
 	 }
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/createListing.php',
  		
  		//the data you are passing the request
  		data: {bookISBN : ISBN, bookTitle : title, bookSubject : subject, bookAuthor : author, bookPublisher : publisher, price : listingPrice,
  			isNegotiable :  listingIsNegotiable, description : listingDescription },
  		
  		//the default method is get
  		method: 'GET',
  		
  		//if the call is a success
  		success: function(data){
  			
  		//	return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
}

//works and verified BG 3/28/2015
function editListing(IDOfListing, listingPrice, listingIsNegotiable, listingDescription){
	
	if (listingDescription === undefined) {
		
    	listingDescription = "";
    
 	 }
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/editListing.php',
  		
  		//the data you are passing the request
  		data: {listingID : IDOfListing, price : listingPrice,
  			isNegotiable :  listingIsNegotiable, description : listingDescription },
  		
  		//the default method is get
  		method: 'POST',
  		
  		//if the call is a success
  		success: function(data){
  			
  		//	return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
	
}

//works and verified BG 3/28/2015
function deleteListing(IDOfListing){
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/deleteListing.php',
  		
  		//the data you are passing the request
  		data: { listingID : IDOfListing },
  		
  		//the default method is get
  		method: 'POST',
  		
  		//if the call is a success
  		success: function(data){
  			
  		//	return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
	
}

//works and verified BG 3/28/2015
function getUserListings(){
	
	var getListing = 1;
	
	return $.ajax({
        
        //the url of the request.  to have a discussion on how we want to store the url info,
  		url: connectionString + '/getAllListingsForUser.php',
  		
  		//the data you are passing the request
  		data: { listing : getListing },
  		
  		//the default method is get
  		method: 'GET',
  		
  		//if the call is a success
  		success: function(data){
  			
  		//	return data;
  			
  		},
  		
  		//if we had an error
  		error: function( jqXHR, textStatus, errorThrown){
  			
  			// return textStatus;
  			 
       }
	});
}

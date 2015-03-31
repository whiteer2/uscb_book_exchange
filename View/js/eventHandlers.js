

$(document).ready(function(){
	
	document.cookie="loggedIn=0";	
		
   $("#passwordSubmit").click(function(){     	 
   	
       	var email = $('#emailFP').val();
       	
    	var password = $('#passwordFP').val();
    	
    	var passwordConfirm = $('#passwordConfirmFP').val();
    	
    	if((email !== '')  && (password !== '') && ( passwordConfirm !== '')){
    		
    		$('#FPStatus').html("Waiting for Server...");
    		
    		forgotPasswordRequest(email, password, passwordConfirm).success(function (data) { 
    			
    			$('#FPStatus').html(data);	
   	
   	 	
			}).error(function(xhr, textStatus, errorThrown){
				
				$('#FPStatus').html(textStatus);		

			});      		
    		
    	}//end if
    	else{
    		
    		$('#FPStatus').html("Please enter all fields!");    		
    		    		
    	} //end else 
   		
  });//end password reset submit handler
 
   $("#loginSubmit").click(function(){   	
  	
  	   	var email = $('#emailLogin').val();
  	   	
    	var password = $('#passwordLogin').val();
    	    	
    	if((email !== '')  && (password !== '')){
    		
    		$('#loginStatus').html("Waiting for Server...");
    		
    		logIn(email, password).success(function (data) { 
    			
    			$('#loginStatus').html(data);
    			
    			if(data.indexOf("Welcome") !== -1){
    				
    				document.cookie="loggedIn=1";
    				
    			}
    			   	
   	 	
			}).error(function(xhr, textStatus, errorThrown){
				
				$('#loginStatus').html(textStatus);		

			});      		
    		
    	}//end if
    	else{
    		
    		$('#loginStatus').html("Please enter all fields!");    		
    		    		
    	} //end else 
   		
  });//end password reset submit handler
  
   $("#registerSubmit").click(function(){   
  			 	
    	var email = $('#emailRegister').val();
    	    	    	
    	if((email !== '')){
    		
    		$('#registerStatus').html("Waiting for Server...");
    		
    		registerUserRequest(email).success(function (data) { 
    			
    			$('#registerStatus').html(data);	
    			
    			if(data == 'a registration email has been sent!'){
    				
    				$('#registerSubmit').prop("disabled",true);
    				
    			}
   	
   	 	
			}).error(function(xhr, textStatus, errorThrown){
				
				$('#registerStatus').html(textStatus);		

			});      		
    		
    	}//end if
    	else{
    		
    		$('#registerStatus').html("Please enter all fields!");    		
    		    		
    	} //end else 
  });
  
   $('#createAcctSubmit').click(function(){
   	
   	//.alert("SWAGNESS");
   	
   		email = $('#emailBox').val();
   		
   		//code = $('#codeBox').val();
   		
   		window.alert(code);
   		
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
   		
   		if((email == '') ||(firstName == '') || (lastName == '') || (password == '') || (passwordConfirmed == '') || (schedule == '')){
   			
   			$('#createAcctStatus').html('Please fill out all fields!');
   			
   		}   	
   		else if(code == '' || code == undefined){
   			
   			window.location.href = "index.html";
   			
   		}
   		else{
   			
   			$('#createAcctStatus').html('Waiting on Server...');
   			
   			createUser(email, code, password, passwordConfirmed, firstName, lastName, schedule).success(function (data) {
   				
   				window.alert(data);
    			
    			$('#createAcctStatus').html(data);	
    			
    			if(data == 'Account successfully created. Please log in to continue.'){
    				
    				setTimeout(function () {
   						window.location.href = "index.html"; //will redirect to your blog page (an ex: blog.html)
						},	3000); //will call the function after 2 secs.
    				
    			}			
   	
   	 	
			}).error(function(xhr, textStatus, errorThrown){
				//window.alert("SWAG1");
				
				$('#createAcctStatus').html(textStatus);		

			});
			
			//window.alert("SWAG");
   			
   		}
   	
   	
   });
  
   $('#logOut').click(function(){
   	
   	$('#logOutStatus').html("Waiting on Server...");
   	
   			logOut().success(function (data) { 
    			
    			$('#logOutStatus').html(data);
    		   	 	
			}).error(function(xhr, textStatus, errorThrown){
				
				$('#logOutStatus').html(textStatus);		

			});    		
   	
   });
  
  }); 

  
 



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
  
  
  
  
  
  }); 

  
  function getURL(){
  	
  	alert(document.URL);
  	
  	
  }

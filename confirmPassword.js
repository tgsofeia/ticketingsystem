function check()
{ 
  	if (document.form.password.value != document.form.confirmation.value) 
  	{ 
            alert("Password and Confirmed Password are not the same"); 
   		return false;
        } 
	else return true; 
} 
 
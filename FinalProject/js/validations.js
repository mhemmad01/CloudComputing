
function validateLogin(){
	var res = ""
	var emailStr=document.getElementById("email").value
	var passwordStr=document.getElementById("password").value
	res += ValidateEmail(emailStr)
	res += ValidatePassword(passwordStr)
	
	if(res!=""){
		alert(res)
	}
	else {
		alert("Email: "+emailStr +"\nPassword: "+ passwordStr)
	}
}

function validateSignup(){
	var res = ""
	var emailStr=document.getElementById("email").value
	var passwordStr=document.getElementById("password").value
	var passwordConfirmationStr=document.getElementById("confirm_password").value
	res += ValidateEmail(emailStr)
	res += ValidatePassword(passwordStr)
	if(passwordStr.toString().localeCompare(passwordConfirmationStr.toString())) 
		res += "Password are not matching each other"

	

	if(res!=""){
		$('#myModal').modal('toggle')
		alert(res)
	}
	else {
		alert("Email: "+emailStr +"\nPassword: "+ passwordStr)
	}
	
}

function validateContactUs(){
	
	var res=ValidateEmail(document.getElementById("email").value)
	if(res!=""){
		alert(res)
	}

}

function ValidateEmail(email) 
{
	var res=""
	
	if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)))
	{
		res += "You have entered an invalid email address!\n"
	}
	
	return res
}


function ValidatePassword(password){
	 
	var res=""
	
	if(password.length <6 )
		res+= ("Password Length must be more than 6!\n")
	
	var upperCaseLetters = /[A-Z]/g;
	if(!password.match(upperCaseLetters)) 
		res+= ("Password must include at least 1 upper case letters\n")
	
	var lowerCaseLetters = /[a-z]/g;
	if(!password.match(lowerCaseLetters)) 
		res+= ("Password must include at least 1 lower case letters\n")
	
	var numLetters = /[0-9]/g;
	if(!password.match(numLetters)) 
		res+= ("Password must include at least 1 number\n")
	
	var specialLetters = /[!@#$%^&*()_+\-=\[\]{};':"\\|.<>\/?]/;
	if(!password.match(specialLetters)) 
		res+= ("Password must include at least 1 special letter\n")
	
	
	return res
		
}

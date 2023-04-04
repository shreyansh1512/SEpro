function validateForm() {
  let pass = document.forms['reset']['password'].value;
  let confirmpass = document.forms['reset']['check_password'].value;


  const uppercaseRegex = /[A-Z]/;
  const lowercaseRegex = /[a-z]/;
  const numberRegex = /[0-9]/;
  const symbolRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;
  
  
  if(uppercaseRegex.test(pass) && lowercaseRegex.test(pass) && symbolRegex.test(pass) &&
      numberRegex.test(pass) && pass.length >= 8){

    if(pass===confirmpass){
      return true;
    }
    else{
      document.getElementById('confirm-error').innerHTML = 'Passwords do not match.';
      return false;
    }
  }
  else{
    document.getElementById('password-error').innerHTML = 'Password not strong enough';
    return false;
  }
}

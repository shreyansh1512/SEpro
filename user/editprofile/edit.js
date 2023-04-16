const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');

profileIcon.addEventListener('click', () => {
  dropdownMenu.classList.toggle('active');
});

function validateForm(name, pass, confirmpass, curpass) {


  const uppercaseRegex = /[A-Z]/;
  const lowercaseRegex = /[a-z]/;
  const numberRegex = /[0-9]/;
  const symbolRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;
  
 
  if(name.length===0){
    document.getElementById('name-error').innerHTML = 'Enter your name.';
    return false;
  }
  else{
    document.getElementById('name-error').innerHTML = '';
  }

  if(uppercaseRegex.test(pass) && lowercaseRegex.test(pass) && symbolRegex.test(pass) &&
      numberRegex.test(pass) && pass.length >= 8){

    if(pass===confirmpass){      
      sendData(name, pass, curpass);
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

function sendData(name, pass, curpass) {
    $.ajax({
        type: "POST",
        url: "editProfilesave",
        data: { 
            pass: pass,
            curpass: curpass,
            name:name
        },
        success: function(response) {
            $('#confirm-error').html(response);
        }
    });
}


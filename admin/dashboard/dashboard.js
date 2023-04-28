const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');


profileIcon.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
});




$(document).ready(function(){
    $('#search').on('input', function(){
        var search = $(this).val();
        if(search != ''){
            $.ajax({
                url: 'search',
                method: 'POST',
                data: {search: search},
                success: function(response){
                    $('#results').html(response);
                }
            });
        } else {
            $('#results').html('');
        }
    });
});

function deleteuser(){

    var username = document.getElementById('delete').value; 
    if(confirm("Do you want to delete this user")==true){
         $.ajax({
                url: 'userdelete',
                method: 'POST',
                data: {username: username},
                success: function(response){
                    window.location.href = "adminDash"
                }
            });
    }
    
}

function validate(curr,newpass,confpass){
 
  document.getElementById('curr-error').innerHTML = ' ';
  document.getElementById('password-error').innerHTML = ' ';
  document.getElementById('confirm-error').innerHTML = ' ';

  if(curr.length == 0){
    document.getElementById('curr-error').innerHTML = 'Enter Current Passwords.';
    return false;
  }

  const uppercaseRegex = /[A-Z]/;
  const lowercaseRegex = /[a-z]/;
  const numberRegex = /[0-9]/;
  const symbolRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;
  
  if(uppercaseRegex.test(newpass) && lowercaseRegex.test(newpass) && symbolRegex.test(newpass) &&
      numberRegex.test(newpass) && newpass.length >= 8){

    if(newpass===confpass){      
      sendpass(curr, newpass);
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


function sendpass(curr, newpass) {
    $.ajax({
        type: "POST",
        url: "PasswordChange",
        data: { 
            curr: curr,
            newpass: newpass
        },
        success: function(response) {
            $('#confirm-error').html(response);
        }
    });
}



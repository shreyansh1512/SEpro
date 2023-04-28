const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');

profileIcon.addEventListener('click', () => {
  dropdownMenu.classList.toggle('active');
});


function ChangePass(curr,newpass,confpass) {


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
      document.getElementById('passpro').innerHTML = 'Passwords do not match.';
      return false;
    }
  }
  else{
    document.getElementById('passpro').innerHTML = 'Password not strong enough';
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
            $('#passpro').html(response);
        }
    });
}



function ChangeInfo(name,git,insta,twit,face,Hskill,Hhandle) {

 
  if(name.length===0){
    document.getElementById('name-error').innerHTML = 'Enter your name.';
    return false;
  }
  else{
    sendData(name,git,insta,twit,face,Hskill,Hhandle);
  }

}


function sendData(name,git,insta,twit,face,Hskill,Hhandle) {
    $.ajax({
        type: "POST",
        url: "editProfilesave",
        data: { 
          name:name,
          git: git,
          insta: insta,
          twit: twit,
          face: face,
          Hskill: Hskill,
          Hhandle: Hhandle
        },
        success: function(response) {
            $('#detailpro').html(response);
        }
    });
}


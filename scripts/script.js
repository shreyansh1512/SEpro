function validateForm() {
  
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;

  const usernameRegex = new RegExp(
    /^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@iiita.ac.in/,
    'gm'
  );
  if (username.length == 10 || usernameRegex.test(username)) {
    if(password.length == 0){
      document.getElementById('test').innerHTML = 'Enter Password';
      return false;
    }
    else{
      sendData(username, password);
      return true;
    }
  } 
  else {
    document.getElementById('test').innerHTML = 'Invalid Username';
    document.getElementById('username').value = '';
    return false;
  }
}

function sendData(username, password) {
  
    $.ajax({
        type: "POST",
        url: "../authenticate/authenticate.php",
        data: { 
            username:username,
            password: password
        },
        success: function(response) {
          console.log(response);
          if(response=='student'){
            window.location.href = '../portfolio';
          }
          else if(response=='admin'){
             window.location.href = '../adminDash';
          }
          else{
            $('#test').html(response);
            document.getElementById('password').value = '';
          }
        }
    });
}


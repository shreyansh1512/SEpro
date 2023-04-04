function validateEmail(str) {
  let button = document.getElementById('button');
  let test =  document.getElementById('test');
  button.disabled = true;
  if (str.length == 0) {
    test.removeAttribute('hidden');
    document.getElementById('test').innerHTML = 'Enter your email!';
     button.disabled = false;
    return;
  } 
  else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        test.removeAttribute('hidden');
        document.getElementById('test').innerHTML = this.responseText;
        document.getElementById('email').value = '';
        button.disabled = false;
        return;
      }
    };

    xmlhttp.open('GET', 'verify.php?email=' + str, true);
    xmlhttp.send();
    
   }
}

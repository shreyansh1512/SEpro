function validateForm() {
  let x = document.forms['login']['username'].value;

  const usernameRegex = new RegExp(
    /^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@iiita.ac.in/,
    'gm'
  );
  if (x.length == 10 || usernameRegex.test(x)) {
    return true;
  } else {
    document.getElementById('test').innerHTML = 'Invalid Username';
    return false;
  }
}

var validator = new FormValidator('signup', [{
  name: 'username',
  display: 'Username',
  rules: 'required'
}, {
  name: 'password',
  rules: 'required'
}, {
  name: 'password_confirm',
  display: 'password confirmation',
  rules: 'required|matches[password]'
}, {
  name: 'email',
  display: 'Email',
  rules: 'required'
}], function(errors, event) {
  if (errors.length > 0) {
    var errorString = '';

    let elem = document.getElementById('target');

    for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
      errorString += '<li>' + errors[i].message + '</li>';
    }

    elem.innerHTML += '<ul>' + errorString + '</ul>';
  }
});

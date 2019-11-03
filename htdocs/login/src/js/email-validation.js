function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.getElementById('target').innerHTML = '';
document.signup.email.focus();
return true;
}
else
{
document.getElementById('target').innerHTML = "<ul><li>You have entered an invalid email address!</li></ul>";
document.signup.email.focus();
return false;
}
}

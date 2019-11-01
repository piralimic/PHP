var validator = new FormValidator('contact', [{
    name: 'website',
    rules: 'exact_length[0]'
}], function(errors, event) {
    if (errors.length > 0) {
        var errorString = '';

        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            errorString += errors[i].message + '<br />';
        }

        // RESET Honeypot > set website hidden field to ''
        var website = document.getElementById('website');
        website.value = '';

        // OPEN MODAL INFO
        var elem = document.getElementById('honeypot');
        var instance = M.Modal.getInstance(elem);
        instance.open();

        // RESET Email field > to prevent spam attack
        var email = document.getElementById('email');
        email.value = '';
        email.setAttribute('class', 'validate invalid');

    }
});

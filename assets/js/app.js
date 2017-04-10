$(document).ready(function() {

    /* Registration form */


    //extract username from email
    $(function() {
            var $email = $('#jira-setup-account-field-email');
            var $username = $('#jira-setup-account-field-username');

            function onChange() {
                $username.val($email.val().split('@')[0]);
            };
            $('#jira-setup-account-field-email')
                .change(onChange)
                .keyup(onChange);
        }) //username-email


    $("#jira-setup-account").validate({
        "rules": {
            "jira-setup-account-field-email": {
                "required": true
            },
            "jira-setup-account-field-username": {
                "required": true,
                "minlength": 5
            },
            "jira-setup-account-field-password": {
                "minlength": 6,
                "required": true
            },
            "jira-setup-account-field-retype-password": {
                "equalTo": "#jira-setup-account-field-password"
            }
        } //rules
    }); //validate

}); //ready

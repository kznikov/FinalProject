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

    //validate register form
    $("#jira-setup-account").validate({
        "rules": {
            "jira-setup-account-field-firstname": {
                "required": true,
                "minlength": 3
            },
            "jira-setup-account-field-lastname": {
                "required": true,
                "minlength": 3
            },
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

    //change username and email in forgot.php
    $(function(a) {
        (function() {
            var b = a("input:checked");
            if (b.length !== 0) {
                if (b.attr("id") === "forgotten_forgotPassword") {
                    a("#username-field,#email-field").addClass("hidden");
                    a("#username-field").removeClass("hidden");
                    a("#username,#email").removeProp("required");
                    a("#username").prop("required", true)
                } else {
                    if (b.attr("id") === "forgotten_forgotUserName") {
                        a("#username-field,#email-field").addClass("hidden");
                        a("#email-field").removeClass("hidden");
                        a("#username,#email").removeProp("required");
                        a("#email").prop("required", true)
                    }
                }
            }
            a("#forgotten_forgotPassword").change(function() {
                a("#username-field,#email-field").addClass("hidden");
                a("#username-field").removeClass("hidden");
                a("#username,#email").removeProp("required");
                a("#username").prop("required", true)
            });
            a("#forgotten_forgotUserName").change(function() {
                a("#username-field,#email-field").addClass("hidden");
                a("#email-field").removeClass("hidden");
                a("#username,#email").removeProp("required");
                a("#email").prop("required", true)
            })
        })()
    });

    //TODO ajax check of username and email of forgot.php
    


}); //ready

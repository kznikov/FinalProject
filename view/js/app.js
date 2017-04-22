//vaidated register form

$.validator.setDefaults( {
    submitHandler: function () {
       $('#ajax_msg').css('display', 'block').delay(5000).slideUp(300).html(data);
    }
} );

$( document ).ready( function () {
   

    $( "#jira-setup-account" ).validate( {
        rules: {
            firstname: "required",
            lastname: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            repassword: {
                required: true,
                minlength: 5,
                equalTo: "#jira-setup-account-field-password"
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            firstname: "Please, enter your firstname",
            lastname: "Please, enter your lastname",
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            repassword1: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-xs-12" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-xs-12" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-xs-12" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );
} );

//preview image

$(document).ready(function() {
    $("#image").on('change', function() {

        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder");
        image_holder.empty();
        var imageError = $("#errors");


        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {

                var size = parseFloat($("#image")[0].files[0].size / 1024).toFixed(2);
                if (size > 5000) {
                    imageError.innerHTML = "Need to reduce a photo's size.";
                    return false;
                }

                imageError.empty();

                for (var i = 0; i < countFiles; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "img-thumbnail"
                        }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }
            } else {
                imageError.innerHTML = 'This browser does not support FileReader.';
            }
        } else {
            imageError.innerHTML = 'Please select only images.';
        }
    });
});

function checkName() {
var name = document.getElementById("jira-setup-account-field-username");
var nameValue = name.value;
console.log(nameValue);

var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     document.getElementById("error").innerHTML =
     this.responseText;
     if (this.responseText) {
        document.getElementById("mySubmit").disabled = true;
        $( name ).parents( ".col-xs-12" ).addClass( "has-error" ).removeClass( "has-success" );
        $( name ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
     } else {
        document.getElementById("mySubmit").disabled = false;
     }
   }
 };
 xhttp.open("GET", "../controller/ValidateController.php?name=" + nameValue, true);
 xhttp.send();
}


function checkEmail() {
var email = document.getElementById("jira-setup-account-field-email");
var emailValue = email.value;
console.log(emailValue);

var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     document.getElementById("erroremail").innerHTML =
     this.responseText;
     if (this.responseText) {
        document.getElementById("mySubmit").disabled = true;
        $( email ).parents( ".col-xs-12" ).addClass( "has-error" ).removeClass( "has-success" );
        $( email ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
     } else {

        document.getElementById("mySubmit").disabled = false;
     }
   }
 };
 xhttp.open("GET", "../controller/ValidateController.php?email=" + emailValue, true);
 xhttp.send();
}


function checkUserName() {
var name = document.getElementById("username");
var nameValue = name.value;
console.log(nameValue);

var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     if (this.responseText) {
         document.getElementById("login").disabled = false; 
     } else {
       document.getElementById("login").disabled = true;
     }
   }
 };
 xhttp.open("GET", "../controller/ValidateController.php?name=" + nameValue, true);
 xhttp.send();
}

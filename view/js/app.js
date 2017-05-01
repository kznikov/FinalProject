//vaidated register form

$.validator.setDefaults({
    submitHandler: function() {
        $('#ajax_msg').css('display', 'block').delay(5000).slideUp(300).html(data);
    }
});

$(document).ready(function() {


    $("#jira-setup-account").validate({
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
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents(".col-xs-12").addClass("has-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!element.next("span")[0]) {
                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
            }
        },
        success: function(label, element) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!$(element).next("span")[0]) {
                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-xs-12").addClass("has-error").removeClass("has-success");
            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-xs-12").addClass("has-success").removeClass("has-error");
            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
        }
    });
});

//preview image


window.onload = function() {

    var fileInput = document.getElementById('image');
    var fileDisplayArea = document.getElementById('image-holder');

    fileInput.addEventListener('change', function(e) {

        var file = fileInput.files[0];
        var imageType = /image.*/;

        if (file.type.match(imageType)) {
            var reader = new FileReader();

            reader.onload = function(e) {

                fileDisplayArea.innerHTML = "";

                var img = new Image();
                img.src = reader.result;

                fileDisplayArea.appendChild(img);
            }

            reader.readAsDataURL(file);
            document.getElementById("uploadImage").disabled = false;
        } else {
            fileDisplayArea.innerHTML = "<p style='color:red;'>File not supported.</p>";
            document.getElementById("uploadImage").disabled = true;
        }

    });
}

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
                $(name).parents(".col-xs-12").addClass("has-error").removeClass("has-success");
                $(name).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            } else {
                document.getElementById("mySubmit").disabled = false;
            }
        }
    };
    xhttp.open("GET", "../controller/ValidateController.php?username=" + nameValue, true);
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
                $(email).parents(".col-xs-12").addClass("has-error").removeClass("has-success");
                $(email).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
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
                document.getElementById("exist").innerHTML =
                    this.responseText;
                document.getElementById("login").disabled = true;
            } else {
                document.getElementById("login").disabled = false;
                document.getElementById("exist").style.display = 'none';
            }
        }
    };

    xhttp.open("GET", "../controller/ValidateController.php?name=" + nameValue, true);
    xhttp.send();
}


// ckeck update registration form 
$(function() {

    $("form[name='edit-account']").validate({

        rules: {
            email: {
                email: true
            },
            password: {
                minlength: 5
            },
            repassword: {
                minlength: 5,
                equalTo: "#jira-setup-account-field-password"
            }
        },
        // Specify validation error messages
        messages: {
            password: {
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address"
        },
        repassword1: {
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});



// chek create project form 
$(function() {

    $("form[name='create-project']").validate({

        rules: {
            project_name: "required",
            prefix: {
                required: true,
                maxlength: 5
            }
        },
        messages: {
            project_name: "Please enter a project name",
            prefix: {
                required: "Please enter unique prefix",
                maxlength: "The prefix must not be more than 5 characters long"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});



function checkProjectName() {
    var project = document.getElementById("projectname");
    var projectValue = project.value;
    console.log(projectValue);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("errorname").innerHTML =
                this.responseText;
            if (this.responseText) {
                document.getElementById("createProject").disabled = true;
            } else {
                document.getElementById("createProject").disabled = false;
            }

        }
    };
    xhttp.open("GET", "../controller/ValidateController.php?project=" + projectValue, true);
    xhttp.send();
}


function checkPrefixName() {
    var prefix = document.getElementById("prefix");
    var prefixValue = prefix.value;
    console.log(prefixValue);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("errorprefix").innerHTML =
                this.responseText;
            if (this.responseText) {
                document.getElementById("createProject").disabled = true;
            } else {
                document.getElementById("createProject").disabled = false;
            }

        }
    };
    xhttp.open("GET", "../controller/ValidateController.php?prefix=" + prefixValue, true);
    xhttp.send();
}


$('.progress-wrap').each(function() {
    percent = $(this);
    bar = $(this).children('.progress-bar');
    moveProgressBar(percent, bar);
});

// on browser resize...
$(window).resize(function() {
    $('.progress-wrap').each(function() {
        percent = $(this);
        bar = $(this).children('.progress-bar');
        moveProgressBar(percent, bar);
    });
});

// SIGNATURE PROGRESS
function moveProgressBar(percent, bar) {
    var getPercent = (percent.data('progress-percent') / 100);
    var getProgressWrapWidth = percent.width();
    var progressTotal = getPercent * getProgressWrapWidth;
    var animationLength = 1000;

    // on page load, animate percentage bar to data percentage length
    // .stop() used to prevent animation queueing
    bar.stop().animate({
        left: progressTotal
    }, animationLength);
}


function viewUser(userId) {
    window.location = '../controller/ViewUserController.php?user=' + userId;
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
}


function viewProject(projectName) {
    window.location = '../controller/ViewProjectController.php?project=' + projectName;
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
}



function editUser(userId) {
    window.location = '../controller/editProfileController.php?user=' + userId;
}

//sort table

function sortTable(f, n) {
    var rows = $('#userlist tbody tr').get();

    rows.sort(function(a, b) {

        var A = getVal(a);
        var B = getVal(b);

        if (A < B) {
            return -1 * f;
        }
        if (A > B) {
            return 1 * f;
        }
        return 0;

    });

    function getVal(elm) {
        var v = $(elm).children('td').eq(n).text().toUpperCase();
        if ($.isNumeric(v)) {
            v = parseInt(v, 10);
        }
        return v;
    }

    $.each(rows, function(index, row) {
        $('#userlist').children('tbody').append(row);
    });
}



var f_name = 1;
var f_email = 1;
var f_username = 1;

$(".name").click(function() {
    f_name *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_name, n);
});

$(".email").click(function() {
    f_email *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_email, n);
});

$(".username").click(function() {
    f_username *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_username, n);
});



//search function
var $rows = $('#userlist tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});



//check create task
$(function() {

    $("form[name='create-task']").validate({

        rules: {
            project: "required",
            title: {
                required: true
            },
            owner: "required"
        },
        messages: {
            project: "Please choose project name",
            title: "Please enter a title",
            owner: "Please choose task owner"
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
});


//delete project
function deleteProject(projectId) {
    if (confirm("Do you realy want to delete this project?")) {

        $.ajax({
            url: '../controller/DeleteProjectController.php',
            method: 'POST',
            data: {projectId:projectId},
            success: function (data) {
                $('#ajax_msg').css('display', 'block').delay(3000).slideUp(300).html(data);
            }
        });
        window.location.reload();
    }
    return false;
}

//updatetask

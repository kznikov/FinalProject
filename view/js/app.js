$(document).ready(function() {

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

    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

}); //ready


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
                    error.innerHTML = "Need to reduce a photo's size.";
                    return false;
                }

                imageError.empty();
                
                for (var i = 0; i < countFiles; i++) 
                {
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
                error.innerHTML = 'This browser does not support FileReader.';
            }
          } else {
            error.innerHTML = 'Please select only images.';
          }
        });
    });

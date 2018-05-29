

jQuery.validator.addMethod("noSpace", function(value, element) { 
    return (value.trim() == value) || (value.indexOf(" ") < 0);
});

jQuery.validator.addMethod("onlynumeric", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
});

jQuery.validator.addMethod("onlynum", function(value, element) {
    return this.optional(element) || /^[0-9]+$/.test(value);
});


// jQuery.validator.addMethod("check_mail", function (value, element) { 
//     var emailReg =/^[-a-z0-9~!$%^&*_=+}{.\'?]+(\.[-a-z~!$%^&*_=+}{\'?]+)*@([a-z_][-a-z_]*(\.[-a-z_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
//     var sendmail = $('#email_id').val(); return emailReg.test(sendmail); 
// });

$(document).ready(function () {
    /*For back button*/ 
    

    $("#register").validate({
        rules: {
             fullname: {
                required: true,
            },
            email: {
              required: true,
              email:true
            },
            password: {
                required: true,
            },
            gender: {
                required: true,
            },
            education: {
                required: true,
            },
            profile_picture: {
                required: true,
            }
        },
        messages: {
             first_name: {
                required: "Please enter first name",
            },
            email: {
                required: "Please enter email",
                check_mail:"Please enter a valid email address"
            },
            password: {
                required: "Please enter password",
            },
            gender: {
                required: "Please select gender",
            },
            education: {
                required: "Please select education",
            },
            profile_picture: {
                required: "Please select file",
            }
        },
        errorPlacement: function (error, element) {
            var attr_name = element.attr('name');
            if (attr_name == 'type') {
                error.appendTo('.type_err');
            } else {
                error.insertAfter(element);
            }
        }

    });
    var typingTimerEmail;                //timer identifier
    var doneTypingIntervalEmail = 1000;  //time in ms, 5 second for example
    //var sendmail = $('#email').val();

});

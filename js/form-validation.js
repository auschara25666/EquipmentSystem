(function ($) {
  'use strict';
  $.validator.setDefaults({
    submitHandler: function () {
      alert("submitted!");
    }
  });
  $(function () {
    // validate the comment form when it is submitted
    $("#commentForm").validate({
      errorPlacement: function (label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        fname: "required",
        lname: "required",
        user_id: {
          required: true,
          minlength: 10
        },
        password: {
          required: true,
          minlength: 8
        },
        email: {
          required: true,
          email: true,

        },
        phone: {
          required: true,
          numbers: true,
          minlength: 10
        },
      },
      messages: {
        fname: "Please enter your firstname",
        lname: "Please enter your lastname",
        user_id: {
          required: "Please enter a username",
          minlength: "Your username must consist of at least 10 characters"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        email: "Please enter a valid email address",
        phone: {
          numbers: "Please enter a valid number.",
          minlength: "Your phone must consist of at least 10 numbers"
        },
        agree: "Please accept our policy",
        topic: "Please select at least 2 topics"
      },
      errorPlacement: function (label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // propose username by combining first- and lastname
    //code to hide topic selection, disable for demo
    // show when newsletter is checked
  });
})(jQuery);
function validateEmail(sEmail) {
  var filter = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
  if (filter.test(sEmail)) {
    return true;
  } else {
    return false;
  }
}

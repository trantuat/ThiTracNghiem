
	$().ready(function() {


		// validate signup form on keyup and submit
		$("#formUpdatePassword").validate({
			rules: {
				oldPassword: {
					required: true,
					minlength: 6
				},
				newPassword: {
					required: true,
					minlength: 6
				},
				confirmPassword: {
					required: true,
					minlength: 6,
					equalTo: "#newPassword"
				}
			},
			messages: {
                newPassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long"
				},
				oldPassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long"
				},
				confirmPassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long",
					equalTo: "Please enter the same password as above"
                }
            },
            submitHandler: function (form) {
               alert(123);
            }
        });
        
        	// validate signup form on keyup and submit
		$("#formUpdateProfile").validate({
			rules: {
				username: {
					required: true,
					minlength: 6
				},
				birthday: {
					required: true
				},
				fullname: {
					required: true,
					minlength: 6
				}
			},
			messages: {
                username: {
					required: "Please provide a username",
					minlength: "User name must be at least 6 characters long"
				},
				birthday: {
					required: "Please provide a birthday",
				},
				fullname: {
					required: "Please provide a fullname",
					minlength: "Your fullname must be at least 6 characters long",
                }
            },
            submitHandler: function (form) {
               alert("update profile");
            }
		});

		
	});
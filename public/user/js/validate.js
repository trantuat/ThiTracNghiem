
	$().ready(function() {
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
				alert("OK");
                $.ajax({
					url: '/Students/UpdatePassword',
					type: "POST", 
					beforeSend: function (xhr) {
					  var token = $('meta[name="csrf_token"]').attr('content');
			
					  if (token) {
							return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					  } else{
					  }
					},
					dataType: "json",
					data: {
					  oldPassword :$('#oldPassword').val(),
					  newPassword: $('#newPassword').val()
					},
					success: function (response) {
						if(response=="Thành công")
							$("#result").html("<div class='alert alert-success alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Thành công:</strong> Cập nhật thành công</div>");
						else{
							$("#result").html("<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Lỗi:</strong> Mật khẩu cũ nhập vào không đúng</div>");
							
						}
					}
				  });
            }
        });
        
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
				form.submit();
            }
		});

		
	});
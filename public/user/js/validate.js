
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
					required: "Không được để trống trường mật khẩu mới",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên"
				},
				oldPassword: {
					required: "Không được để trống trường mật khẩu cũ",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên"
				},
				confirmPassword: {
					required: "Không được để trống trường xác nhận mật khẩu",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					equalTo: "Xác nhận mật khẩu mới không khớp"
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
					required: "Không được để trống trường username",
					minlength: "Username phải từ 6 kí tự trở lên"
				},
				birthday: {
					required: "Phải nhập ngày sinh",
				},
				fullname: {
					required: "Không được để trống trường tên đầy đủ",
					minlength: "Tên đầy đủ phải từ 6 kí tự trở lên",
                }
            },
            submitHandler: function (form) {
				form.submit();
            }
		});

		$("#formLogin").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6
				}
			},
			messages: {
                email: {
					required: "Không được để trống trường email",
					email: "Định dạng email chưa đúng"
				},
				password: {
					required: "Không được để trống trường mật khẩu",
					minlength: "Trường mật khẩu phải từ 6 kí tự trở lên"
				}
			},
			
            submitHandler: function (form) {
				form.submit();
            }
		});

		$("#formRegister").validate({
			rules: {
				username: {
					required: true,
					minlength: 6
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6
				},
				confirmPassword: {
					required: true,
					minlength: 6,
					equalTo: "#password"
				}
				
			},
			messages: {
                username: {
					required: "Không được để trống trường username",
					minlength: "Username phải từ 6 kí tự trở lên"
				},
				email: {
					required: "Không được để trống trường email",
					email: "Định dạng email chưa đúng"
				},
				password: {
					required: "Không được để trống trường mật khẩu ",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên"
				},
				confirmPassword: {
					required: "Không được để trống trường xác nhận mật khẩu",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					equalTo: "Xác nhận mật khẩu mới không khớp"
                }
            },
            submitHandler: function (form) {
				form.submit();
            }
		});

		
	});
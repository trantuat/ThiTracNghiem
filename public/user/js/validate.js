
	$(document).ready(function() {

		$("#formUpdatePassword").validate({
			rules: {
				oldPassword: {
					required: true,
					minlength: 6,
					maxlength: 30
				},
				newPassword: {
					required: true,
					minlength: 6,
					maxlength: 30
				},
				confirmPassword: {
					required: true,
					minlength: 6,
					maxlength: 30,
					equalTo: "#newPassword"
				}
			},
			messages: {
                newPassword: {
					required: "Không được để trống trường mật khẩu mới",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự"
				},
				oldPassword: {
					required: "Không được để trống trường mật khẩu cũ",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự"
				},
				confirmPassword: {
					required: "Không được để trống trường xác nhận mật khẩu",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự",
					equalTo: "Xác nhận mật khẩu mới không khớp"
                }
            },
            submitHandler: function (form) {
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

		$("#formUpdatePasswordForTeacher").validate({
			rules: {
				oldPassword: {
					required: true,
					minlength: 6,
					maxlength: 30
				},
				newPassword: {
					required: true,
					minlength: 6,
					maxlength: 30
				},
				confirmPassword: {
					required: true,
					minlength: 6,
					maxlength: 30,
					equalTo: "#newPassword"
				}
			},
			messages: {
                newPassword: {
					required: "Không được để trống trường mật khẩu mới",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự"
				},
				oldPassword: {
					required: "Không được để trống trường mật khẩu cũ",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự"
				},
				confirmPassword: {
					required: "Không được để trống trường xác nhận mật khẩu",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự",
					equalTo: "Xác nhận mật khẩu mới không khớp"
                }
            },
            submitHandler: function (form) {
                $.ajax({
					url: '/Teachers/UpdatePassword',
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
						console.log(response);
						if(response=="Thành công")
							$("#result").html("<div class='alert alert-success alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Thành công:</strong> Cập nhật thành công</div>");
						else{
							$("#result").html("<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Lỗi:</strong> Mật khẩu cũ nhập vào không đúng</div>");
							
						}
					}
				  });
            }
		});
		
		
		
		$.validator.addMethod("username", function(value, element) {
			return this.optional(element) || value == value.match(/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/);
			},"Nhập đúng định dạng username ");
			
		$.validator.addMethod("fullname", function(value, element) {
			return this.optional(element) || value == value.match(/^[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]+ [A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]+ [A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]+$/);
			},"Nhập đúng định dạng tên ");


		$("#formUpdateProfile").validate({
			rules: {
				username: {
					required: true,
					minlength: 6,
					username:true
				},
				birthday: {
					required: true
				},
				fullname: {
					required: true,
					minlength: 6,
					fullname: true
				},
				phone:{
					number: true,
					digits: true,
					rangelength:[10,11]
				}
			},
			messages: {
                username: {
					required: "Không được để trống trường username",
					minlength: "Username phải có từ 6 kí tự trở lên"
				},
				birthday: {
					required: "Phải nhập ngày sinh đầy đủ cho trường này",
				},
				fullname: {
					required: "Không được để trống trường tên đầy đủ",
					minlength: "Tên đầy đủ phải có từ 6 kí tự trở lên",
				},
				phone: {
					number: "Phải nhập định dạng số. VD: 01111111111",
					digits: "Nhập sai định dạng kiểu số điện thoại",
					rangelength: "Số điện thoại giới hạn từ 10 - 11 chữ số"
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
					// customemail:true
				},
				password: {
					required: true,
					minlength: 6,
					maxlength: 30
				}
			},
			messages: {
                email: {
					required: "Không được để trống trường email",
					email: "Định dạng email chưa đúng"
				},
				password: {
					required: "Không được để trống trường mật khẩu",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự"
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
					minlength: 6,
					username: true
				},
				fullname: {
					required: true,
					minlength: 6,
					fullname: true
				},
				dayOfBirth:{
					required: true
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6,
					maxlength: 30
				},
				confirmPassword: {
					required: true,
					minlength: 6,
					maxlength: 30,
					equalTo: "#password"
				},
				phone:{
					number: true,
					digits: true,
					rangelength:[10,11]
				}
				
			},
			messages: {
                username: {
					required: "Không được để trống trường username",
					minlength: "Username phải từ 6 kí tự trở lên"
				},
				fullname: {
					required: "Không được để trống trường tên đầy đủ",
					minlength: "Tên đầy đủ phải từ 6 kí tự trở lên",
				},
				dayOfBirth: {
					required: "Phải nhập ngày sinh",
				},
				email: {
					required: "Không được để trống trường email",
					email: "Định dạng email chưa đúng"
				},
				password: {
					required: "Không được để trống trường mật khẩu ",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự"
				},
				confirmPassword: {
					required: "Không được để trống trường xác nhận mật khẩu",
					minlength: "Mật khẩu phải từ 6 kí tự trở lên",
					maxlength: "Mật khẩu không được vượt quá 30 kí tự",
					equalTo: "Xác nhận mật khẩu mới không khớp"
				},
				phone:{
					number:"Nhập định dạng số",
					digits:"Nhập sai định dạng",
					rangelength: "Giới hạn từ 10 - 11 chữ số"
				}
            },
            submitHandler: function (form) {
				form.submit();
            }
		});

		
	});
(function($) {
    
        $(document).ready(function() {
            $(document).on("click","#sendCode",function() {
                $("#sendCode").blur();
                resetPassword();
               
              });
        });
})(jQuery);

function resetPassword(){
    $.ajax({
      url: '/PerformReset',
      type: "POST",
      beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');
        if (token) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        } else{
        }
      },
      dataType : "html",
      data: {
        email: $('#email').val()
      },
       success: function(response){ // What to do if we succeed
           $('#notice').html(response);
      },
      error: function(response){
          $('#notice').html(response);
     }
    });
  }
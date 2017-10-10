
(function($) {
    $(document).ready(function() {
        $('.dataTable').DataTable();
    
        //add more answers for question
        var ans=5;
        $(document).on("click","#addAnswer",function() {
          event.preventDefault();
          $('#addMoreAnswer').append('<div class="input-group"><span class="input-group-addon"><input type="checkbox" aria-label="The right answer" id="radio'+ans+'"> </span><input type="text" class="form-control" id="answer'+ans+'" ></div><br>');
          $('#numberOfAnswer').val(ans);
          ans++;
        });

        //clear modal when closed
        $('#addQuestion').on('hidden.bs.modal', function(e)
        { 
          $(this).find("input[type=text],textarea").val('')
                .find("input[type=checkbox], input[type=radio]").prop("checked", "") ;
          $('#addMoreAnswer').html("");
          ans=5;
          $('#numberOfAnswer').val(4);
        });
    
        //submit form add question
        $(document).on("click","#btnAddQuestion",function() {
          if (!confirm("Do you want to add this question?")) return
          var number_answer=parseInt($('#numberOfAnswer').val());
          var right_answer=document.querySelectorAll('input[type="checkbox"]:checked').length ;
          var is_multichoise= (right_answer>1 ? 1:0); 
          var content = $('textarea#addQuestion').val();
          var level_id=parseInt($('#addQuestionLevel').val());
          var topic_id=parseInt($('#addQuestionSubject').val());
          var class_id=parseInt($('#addQuestionClass').val());
          var data = {"content":content,"img_link": null,"topic_id":topic_id,"level_id":level_id,"class_id":class_id,
                    "is_multichoise":is_multichoise,"number_answer":number_answer};
          var jsonArray1=[];
          
        //   alert(json);
          var tmp = {};
          var i = 1;
          var is_correct_answer=0;
          for(i=1;i<= number_answer; i++) {
            var answer = $(".modal-body-answer #answer".concat(i)).val();
            if($("#radio".concat(i)).is(':checked')){
                is_correct_answer=1;
            } else{
                is_correct_answer=0;
            }
            var img_link=null;
            var question=[{"content":answer,"is_correct_answer":is_correct_answer,"img_link":img_link}];
            // alert(JSON.stringify(question));
            jsonArray1 = jsonArray1.concat(question);

          }
          var object1 = {"answer":jsonArray1};
          $.extend(data, object1);
          let json = JSON.stringify(data);
          alert(json);
          var api=$('#api').val(); 

          $.ajax({
            // url: 'http://127.0.0.1:8088/api/question/add',
            url: '/Teachers/Question',
            // headers: {
            //     // 'Content-Type': 'application/json',
            //     // 'api_token':api,
            //     // 'Access-Control-Allow-Origin' : '*'
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            type: "POST", /* or type:"GET" or type:"PUT" */
            beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');
  
              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              } else{
              }
            },
            dataType: "json",
            data: {
              sendJson: data
            },
            success: function (response) {
                console.log(response);
                alert("Thêm câu hỏi thành công");
            },
            error: function (response) {
                console.log(response);
                alert("Đã xảy ra lỗi");
            }
          });

        });

        $('#addQuestionClass').change(function() {
          $.ajax({
            url: '/Teachers/GetSubject',
            type: "GET",
            dataType : "html",
            data: {
              classId: $('#addQuestionClass').val()
            },
             success: function(response){ // What to do if we succeed
              $('#formAddQuestion').find("select[name='addQuestionSubject']").html(response);
                // console.log(response);
                //   alert("OK"); 
            },
            error: function(response){
                alert('Error'+response);
                }
          });
        });

        $('#updateQuestionClass').change(function() {
          $.ajax({
            url: '/Teachers/GetSubject',
            type: "GET",
            dataType : "html",
            data: {
              classId: $('#updateQuestionClass').val()
            },
             success: function(response){ // What to do if we succeed
              $('#formUpdateQuestion').find("select[name='updateQuestionSubject']").html(response);
                // console.log(response);
                //   alert("OK"); 
            },
            error: function(response){
                alert('Error'+response);
                }
          });
        });

       
      });
      
    
    })(jQuery); 

    function showUpdateForm(detail){

        loadSubjectForUpdate();
        // console.log(detail.level_id);
        // alert("OK");
        // console.log(detail.content);
        $('#updateQuestionClass').val(detail.topic_class_id);
        var subject=detail.topic_id;
        switch (subject){
          case 1: $('#updateQuestionSubject').val("toan"); break;
        }
        $('#updateQuestionLevel').val(detail.level_id);
        
       
        
        //   $.ajax({
        //     method: "GET",
        //     url: "http://127.0.0.1:8088/api/question/answer/2",
        //     // data: {
        //     //   questionId : $('#updateQuestion1').val(detail.content);
        //     // }
        //   })
        //   .done(function(data){
        //     console.log(data);
        //     // var dataObj = JSON.parse(data);
        //     // console.log(dataObj);
        //     // inform(dataObj);
        // });
      }
      


      function loadSubject(){
        $.ajax({
          url: '/Teachers/GetSubject',
          type: "GET",
          dataType : "html",
          data: {
            classId: $('#addQuestionClass').val()
          },
           success: function(response){ // What to do if we succeed
            $('#formAddQuestion').find("select[name='addQuestionSubject']").html(response);
              // console.log(response);
              //   alert("OK"); 
          },
          error: function(response){
              alert('Error'+response);
              }
        });
      }

        function loadSubjectForUpdate(){
          $.ajax({
            url: '/Teachers/GetSubject',
            type: "GET",
            dataType : "html",
            data: {
              classId: $('#updateQuestionClass').val()
            },
             success: function(response){ // What to do if we succeed
              $('#formUpdateQuestion').find("select[name='updateQuestionSubject']").html(response);
                // console.log(response);
                //   alert("OK"); 
            },
            error: function(response){
                alert('Error'+response);
                }
          });
      }
      
      
    
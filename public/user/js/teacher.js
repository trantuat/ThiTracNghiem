
(function($) {
    $(document).ready(function() {
        $('.dataTable').DataTable();
    
       //add more answers for question
        var ans=3;
        $(document).on("click","#addAnswer",function() {
           
            $('#addMoreAnswer').append('<div class="editor'+ans+'" > <div class="input-group"><span class="input-group-addon" style="border-bottom: none; border-radius: 0px;"><input type="checkbox" aria-label="The right answer" id="checkbox_answer'+ans+'" ></span><input type="text" class="form-control" id="answer" value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly><span class="input-group-btn"><button class="btn btn-secondary" type="button" id ="editor'+ans+'" onclick="deleteAnswer(this.id)" style="height: 38px; border-bottom: none; border-radius: 0px; background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_delete.png" ></button></span><span class="input-group-btn"><button class="btn btn-secondary" name="addAnswer" id="addAnswer" style="height: 38px; border-bottom: none; border-radius: 0px;  background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_add.png" ></button></span></div><Textarea class="form-control" id="answer'+ans+'"  name="answer'+ans+'" ></Textarea><script>CKEDITOR.replace( "answer'+ans+'",{filebrowserBrowseUrl : "/editor/ckfinder/ckfinder.html",filebrowserImageBrowseUrl : "/editor/ckfinder/ckfinder.html?type=Images",filebrowserFlashBrowseUrl : "/editor/ckfinder/ckfinder.html?type=Flash",filebrowserUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",filebrowserImageUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",filebrowserFlashUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"});</script><br></div></div>');

          $('#numberOfAnswer').val(ans);
          ans++;
          event.preventDefault();
         });
    
   //submit form add question
        $(document).on("click","#btnAddQuestion",function() {
          if (!confirm("Do you want to add this question?")) return;
          var number_answer=parseInt($('#numberOfAnswer').val());
          var n_answer = 0;
          for(var i=1; i<= number_answer; i++) {
            if ($('#answer'.concat(i)).length == 0) {
              continue;
            }
            n_answer++ ;
          }
          var right_answer=document.querySelectorAll('input[type="checkbox"]:checked').length ;
          var is_multichoise= (right_answer>1 ? 1:0); 
          var content = CKEDITOR.instances['questionContent'].getData();
          var level_id=parseInt($('#addQuestionLevel').val());
          var topic_id=parseInt($('#addQuestionSubject').val());
          var class_id=parseInt($('#addQuestionClass').val());
          var data = {"content":content,"img_link": null,"topic_id":topic_id,"level_id":level_id,"class_id":class_id,
                    "is_multichoise":is_multichoise,"number_answer":n_answer};
          var jsonArray1=[];
          
        //   alert(json);
          var tmp = {};
          var is_correct_answer=0;
          for(var i=1;i<= number_answer; i++) {
            if ($('#answer'.concat(i)).length == 0) {
              continue;
            }
            var answer = CKEDITOR.instances['answer'.concat(i)].getData();
            if($("#checkbox_answer".concat(i)).is(':checked')){
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

          return;
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
      
      
       function deleteAnswer(id) {
        $(".".concat(id)).remove();
      }

      function addAnswer(id) {
        $(".".concat(id)).remove();
      }
      
    
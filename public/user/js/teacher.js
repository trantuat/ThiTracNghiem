
(function($) {
    $(document).ready(function() {
        $('.dataTable').DataTable();
    
       //add more answers for question
        var ans=3;
        $(document).on("click","#addAnswer",function() {
          $('#addMoreAnswer').append('<div class="editor'+ans+'" > <div class="input-group"><span class="input-group-addon" style="border-bottom: none; border-radius: 0px;"><input type="checkbox" aria-label="The right answer" id="checkbox_answer'+ans+'" ></span><input type="text" class="form-control"  value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly><span class="input-group-btn"><button class="btn btn-secondary" type="button" id ="editor'+ans+'" onclick="deleteAnswer(this.id)" style="height: 38px; border-bottom: none; border-radius: 0px; background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_delete.png" ></button></span><span class="input-group-btn"><button class="btn btn-secondary" name="addAnswer" id="addAnswer" style="height: 38px; border-bottom: none; border-radius: 0px;  background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_add.png" ></button></span></div><Textarea class="form-control" id="answer'+ans+'"  name="answer'+ans+'" ></Textarea><script>CKEDITOR.replace( "answer'+ans+'",{filebrowserBrowseUrl : "/editor/ckfinder/ckfinder.html",filebrowserImageBrowseUrl : "/editor/ckfinder/ckfinder.html?type=Images",filebrowserFlashBrowseUrl : "/editor/ckfinder/ckfinder.html?type=Flash",filebrowserUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",filebrowserImageUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",filebrowserFlashUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"});</script><br></div></div>');
          $('#numberOfAnswer').val(ans);
          ans++;
          event.preventDefault();
         });

         var ans_update=$('#numberOfAnswerUpdate').val();
         $(document).on("click","#addAnswerForUpdate",function() {
           $('#updateMoreAnswer').append('<div class="editor'+ans_update+'" > <div class="input-group"><span class="input-group-addon" style="border-bottom: none; border-radius: 0px;"><input type="checkbox" aria-label="The right answer" id="checkbox_answer'+ans_update+'" ></span><input type="text" class="form-control" value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly><span class="input-group-btn"><button class="btn btn-secondary" type="button" id ="editor'+ans_update+'" onclick="deleteAnswer(this.id)" style="height: 38px; border-bottom: none; border-radius: 0px; background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_delete.png" ></button></span><span class="input-group-btn"><button class="btn btn-secondary" name="addAnswerForUpdate" id="addAnswerForUpdate" style="height: 38px; border-bottom: none; border-radius: 0px;  background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_add.png" ></button></span></div><Textarea class="form-control" id="answer'+ans_update+'"  name="answer'+ans_update+'" ></Textarea><script>CKEDITOR.replace( "answer'+ans_update+'",{filebrowserBrowseUrl : "/editor/ckfinder/ckfinder.html",filebrowserImageBrowseUrl : "/editor/ckfinder/ckfinder.html?type=Images",filebrowserFlashBrowseUrl : "/editor/ckfinder/ckfinder.html?type=Flash",filebrowserUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",filebrowserImageUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",filebrowserFlashUploadUrl : "/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"});</script><br></div></div>');

           ans_update++;
          $('#numberOfAnswerUpdate').val(ans_update);
          event.preventDefault();
        });
    
        //submit form add question
        $(document).on("click","#btnAddQuestion",function() {
          if (!confirm("Bạn có muốn thêm câu hỏi này?")) return;
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
          var level_id=$('#addQuestionLevel').val();
          var topic_id=$('#addQuestionSubject').val();
          var class_id=$('#addQuestionClass').val();
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
          // alert(json);
          $.ajax({
            url: '/Teachers/AddNewQuestion',
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
              sendJson: data
            },
            success: function (response) {
                console.log(response);
                alert("Thêm câu hỏi thành công");
                window.location.href="/Teachers/Question";
            },
            error: function (response) {
                console.log(response);
                alert("Đã xảy ra lỗi");
            }
          });

        });

        $(document).on("click","#btnUpdateQuestion",function() {
          if (!confirm("Bạn có muốn cập nhật câu hỏi này?")) return;
          var question_id=$('#question_id').val();
          var number_answer=$('#numberOfAnswerUpdate').val();
          var n_answer = 0;
          for(var i=0; i<number_answer; i++) {
            if ($('#answer'.concat(i)).length == 0) {
              continue;
            }
            n_answer++ ;
          }
          var right_answer=document.querySelectorAll('input[type="checkbox"]:checked').length ;
          var is_multichoise= (right_answer>1 ? 1:0); 
          var content = CKEDITOR.instances['questionContent'].getData();
          var level_id=$('#updateQuestionLevel').val();
          var topic_id=$('#updateQuestionSubject').val();
          var class_id=$('#updateQuestionClass').val();
          var data = {"question_id":question_id,"content":content,"img_link": null,"topic_id":topic_id,"level_id":level_id,"class_id":class_id,
                    "is_multichoise":is_multichoise,"number_answer":n_answer};
          var jsonArray1=[];
          var jsonArray2=[];
          
        //   alert(json);
          var tmp = {};
          var is_correct_answer=0;
          for(var i=0;i<number_answer; i++) {
            if ($('#answer'.concat(i)).length == 0) {
              continue;
            }
            var answer = CKEDITOR.instances['answer'.concat(i)].getData();
            var answer_id=$('#answer_id'.concat(i)).val()==null? "0" : $('#answer_id'.concat(i)).val();
            if($("#checkbox_answer".concat(i)).is(':checked')){
                is_correct_answer=1;
            } else{
                is_correct_answer=0;
            }
            var img_link=null;
            var question=[{"answer_id":answer_id,"content":answer,"is_correct_answer":is_correct_answer,"img_link":img_link}];
            var oneAnswer=[{"id":answer_id,"content":answer,"img_link'":null,"is_correct_answer":is_correct_answer}]
            // alert(JSON.stringify(question));
            jsonArray1 = jsonArray1.concat(question);
            jsonArray2 = jsonArray2.concat(oneAnswer);

          }          
          var object1 = {"answer":jsonArray1};
          var updateAnswer={"question_id":question_id,"answer":jsonArray2};
          alert(JSON.stringify(updateAnswer));
          $.extend(data, object1);
          let json = JSON.stringify(data);
          // alert(json);
       
          $.ajax({
            url: '/Teachers/UpdateQuestion',
            
            type: "PUT",
            beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');
  
              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              } else{
              }
            },
            dataType: "json",
            data: {
              sendJson: data,
              updateAnswer:updateAnswer
            },
            success: function (response) {
                console.log(response);
                window.location.href="/Teachers/UncheckedQuestion";
                // $('#success_message').fadeIn().html("Cập nhật câu hỏi thành công");
                // setTimeout(function() {
                //   $('#success_message').fadeOut("slow");
                // }, 2000 );
                alert("Cập nhật câu hỏi thành công");
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

      function loadClassForAdd(){
        $.ajax({
          url: '/Teachers/GetClass',
          type: "GET",
          dataType : "html",
          data: {
          },
          success: function(response){ // What to do if we succeed
            $('#formAddQuestion').find("select[name='addQuestionClass']").html(response);
              // console.log(response);
              //   alert("OK"); 
          },
          error: function(response){
              alert('Error'+response);
              }
        });
      }
      function loadSubjectForAdd(){
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
      function loadLevelForAdd(){
        $.ajax({
          url: '/Teachers/GetLevel',
          type: "GET",
          dataType : "html",
          data: {
            // classId: $('#addQuestionClass').val()
          },
           success: function(response){ // What to do if we succeed
            $('#formAddQuestion').find("select[name='addQuestionLevel']").html(response);
              // console.log(response);
              //   alert("OK"); 
          },
          error: function(response){
              alert('Error'+response);
              }
        });
      }

        function loadClassForUpdate(){
            $.ajax({
              url: '/Teachers/GetClassForUpdate',
              type: "GET",
              dataType : "html",
              data: {
                classId: $('#class_id').val(),
                question_id: $('#question_id').val()
              },
              success: function(response){ // What to do if we succeed
                $('#formUpdateQuestion').find("select[name='updateQuestionClass']").html(response);
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
            url: '/Teachers/GetSubjectForUpdate',
            type: "GET",
            dataType : "html",
            data: {
              topicId: $('#topic_id').val(),
              classId: $('#class_id').val()
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

      function loadLevelForUpdate(){
        $.ajax({
          url: '/Teachers/GetLevelForUpdate',
          type: "GET",
          dataType : "html",
          data: {
            levelId: $('#level_id').val(),
            question_id: $('#question_id').val()
          },
           success: function(response){ // What to do if we succeed
            $('#formUpdateQuestion').find("select[name='updateQuestionLevel']").html(response);
              // console.log(response);
              //   alert("OK"); 
          },
          error: function(response){
              alert('Error'+response);
              }
        });
      }
      
      
       function deleteAnswer(id) {
         var numberAnswer=$('#numberOfAnswer').val();
         if(numberAnswer<=2){
           alert("Câu hỏi phải có ít nhất 2 câu trả lời");
         } else{
            $(".".concat(id)).remove();
            $('#numberOfAnswer').val(numberAnswer-1);
         }
        
      }

      function deleteAnswerUpdate(id) {
        var numberAnswer=$('#numberOfAnswerUpdate').val();
          if(numberAnswer<=2){
            alert("Câu hỏi phải có ít nhất 2 câu trả lời");
          } else{
           $('#numberOfAnswerUpdate').val(numberAnswer-1);
           $(".".concat(id)).remove();
           
        }
      }

      function deleteQuestion(questionId){
        if(!confirm("Bạn muốn xoá câu hỏi này?")) return;
        $.ajax({
          url: '/Teachers/DeleteQuestion',
          type: "DELETE",
          beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
  
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            } else{
            }
          },
          dataType : "json",
          data: {
            questionId: questionId
          },
           success: function(response){ // What to do if we succeed
              console.log(response);
              alert("Xoá câu hỏi thành công");
              location.reload();
          },
          error: function(response){
              alert('Error'+response);
              }
        });
      }
      
    
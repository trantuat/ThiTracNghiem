
(function($) {
  
      $(document).ready(function() {
        $('.dataTable').DataTable();
        $('.dataTable tfoot th').each( function () {
          var title = $(this).text();
          if(title!="Hành động"){
            $(this).html( '<input type="text" style="width:95px" class="form-control" placeholder="'+title+'"/>' );
          }
      } );
   
      // DataTable
      var table = $('.dataTable').DataTable();
   
      // Apply the search
      table.columns().every( function () {
          var that = this;
   
          $( 'input', this.footer() ).on( 'keyup change', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          } );
      } );

        $(document).on("click","#btnSubmitTest",function() {
          if(!confirm("Bạn có muốn nộp bài?")) return;
          submitQuizz();
        });

        $(document).on("click","#btnDetailResult",function() {
          window.onbeforeunload = null;
          historyId=$('#historyId').val();
          window.location.href = '/Students/Result/'+historyId;
         
        });

        $('#doTestClass').change(function() {
          $.ajax({
            url: '/Teachers/GetSubject',
            type: "GET",
            dataType : "html",
            data: {
              classId: $('#doTestClass').val()
            },
             success: function(response){ // What to do if we succeed
              $('#formDoTest').find("select[name='doTestSubject']").html(response);
                // console.log(response);
                //   alert("OK"); 
            },
            error: function(response){
                alert('Error'+response);
                }
          });
        });
        
      });
      var clock=null;
      function submitQuizz(){
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var endTime = date+' '+time;
        var startTime=$('#startTime').val();

        var quizzId=$('#quizzId').val();
        var numberQuestion=$('#numberQuestion').val();
        var data={'quizz_id':quizzId,};
        var answer=[];
        var k=0;
        for(i=0;i<numberQuestion;i++){
          var isMulti = $(".question".concat(i).concat(" .mutiquestion")).val();
          var numberAnswer= $("#numberAnswer".concat(i)).val();
          var questionId=$("#questionId".concat(i)).val();
          if (isMulti == 1) {
            for(j=0;j<numberAnswer;j++){
               var answerId =$(".question".concat(i).concat(" .form-group_checkbox #checkbox").concat(j).concat(":checked")).val();
               if(answerId!=null){
                  answerQuestion=[{'question_id':questionId,'option_choose':answerId}];
                  answer=answer.concat(answerQuestion);
               } else{
                 k++;
            }
            if(k==numberAnswer){
              answerQuestion=[{'question_id':questionId,'option_choose':'0'}];
              answer=answer.concat(answerQuestion);
              k=0;
            }
          }
          k=0;
  
          } else {
            var answerId =$(".question".concat(i).concat(" .form-group_radio #radio").concat(i).concat(":checked")).val();
            if (answerId == null) {
              answerQuestion=[{'question_id':questionId,'option_choose':'0'}];
            } else {
              answerQuestion=[{'question_id':questionId,'option_choose':answerId}];
            }
            answer=answer.concat(answerQuestion);
  
           
          }
         }
         var object1 = {"answer":answer};
         $.extend(data, object1);
         var object2 ={"start_time":startTime,"end_time":endTime};
         $.extend(data, object2);
         let json = JSON.stringify(data);
         clearTimeout(clock);
  
         $.ajax({
          url: '/Students/Answer',
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
            quizzId:quizzId,
            sendJson: data
          },
          success: function (response) {
              
              $("#correctAnswer").text(response['result']['correct_answer'].toFixed(2));
              $("#wrongAnswer").text(response['result']['wrong_answer'].toFixed(2));
              $("#point").text(response['result']['score'].toFixed(2));
              $("#historyId").val(response['history_id']['data']);
              $('#showResultQuizz').modal({backdrop: 'static', keyboard: false});
              $('#showResultQuizz').modal('show');
              event.preventDefault();
              // clearTimeout(clock);
              
          },
          error: function (response) {
          }
        });
      }
      
      
      // document.getElementById('timer').innerHTML =
      // 60 + ":" + 00;
      startTimer();
    
      function startTimer() {
        var presentTime = document.getElementById('timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if(s==59){
            m=m-1;
            if(m<0){
              if(window.confirm("Đã hết giờ làm bài! Xem kết quả?")){
                submitQuizz();
                return;
            } else{
                window.location.href="/Students/Quizz";
                return;
            }
          }
        }
        document.getElementById('timer').innerHTML =
          m + ":" + s;
        
        clock= setTimeout(startTimer, 1000);
      }
    
    function checkSecond(sec) {
      if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
      if (sec < 0) {sec = "59"};
      return sec;
    }
    })(jQuery); 

    function showOptionChoose(){
      $.ajax({
        url: '/Teachers/GetSubject',
        type: "GET",
        dataType : "html",
        data: {
          classId: $('#doTestClass').val()
        },
         success: function(response){ // What to do if we succeed
          $('#formDoTest').find("select[name='doTestSubject']").html(response);
            // console.log(response);
            //   alert("OK"); 
        },
        error: function(response){
            alert('Error'+response);
            }
      });
    }

    function showClass(detail){
      $('#formDoQuizz').find("input[id='doTestSubjectIndex']").val(detail.topic_name);
      $('#formDoQuizz').find("input[id='doTestSubject']").val(detail.id);
        $.ajax({
          url: '/Students/GetClass',
          type: "GET",
          dataType : "html",
          data: {
            topicId: detail.id
          },
          success: function(response){ 
            console.log(response);
            $('#formDoQuizz').find("select[id='doTestClass']").html(response);
          },
          error: function(response){
              alert('Error'+response);
              }
        });

    }

    function createQuizz(data){
      $.ajax({
        url: '/Students/CreateQuizzFromTemplate',
        type: "GET",
        dataType : "json",
        data: {
          doTestQuizzName: data.quizz_name,
          doTestClass: data.class_id,
          doTestLevel: data.level_id,
          doTestSubject: data.topic_id,
          doTestTotal: data.total,
          doTestTime: data.duration
        },
        success: function(response){ 
          console.log(response);
          if(response=="error"){
            alert("Không đủ số lượng câu hỏi");
          } else{
          window.location.href="/Students/DoTest/"+response+"/"+data.duration;
          }
          
        },
        error: function(response){
            alert('Error'+response);
            }
      });
    }

    function deleteHistory(historyId){
      if(!confirm("Bạn muốn xoá lịch sử lần thi này?")) return;
      $.ajax({
        url: '/Students/DeleteHistory',
        type: "DELETE", /* or type:"GET" or type:"PUT" */
        beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');
          if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          } else{
          }
        },
        dataType: "json",
        data: {
          historyId:historyId
        },
        success: function (response) {
            console.log(response);
            alert("Đã xoá thành công");
            location.reload();
        },
        error: function (response) {
          alert("Error"+ response);
        }
      });
    }
    

    
    
  
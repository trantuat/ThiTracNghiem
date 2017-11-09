
(function($) {
      "use strict"; // Start of use strict
     
      $(document).ready(function() {

      // Configure tooltips for collapsed side navigation
      $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
        template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
      })

      // Toggle the side navigation
      $("#sidenavToggler").click(function(e) {
        e.preventDefault();
        $("body").toggleClass("sidenav-toggled");
        $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
        $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
      });

      // Force the toggled class to be removed when a collapsible nav link is clicked
      $(".navbar-sidenav .nav-link-collapse").click(function(e) {
        e.preventDefault();
        $("body").removeClass("sidenav-toggled");
      });

      // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
      $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
      });

      // Scroll to top button appear
      $(document).scroll(function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
          $('.scroll-to-top').fadeIn();
        } else {
          $('.scroll-to-top').fadeOut();
        }
      });

      $(document).ready(function() {
        $('.dataTable tfoot th').each( function () {
          var title = $(this).text();
          if(title!="Hành động"){
            $(this).html( '<input type="text" class="form-control" placeholder="'+title+'"/>' );
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
      

      // Configure tooltips globally
      $('[data-toggle="tooltip"]').tooltip()

      // Smooth scrolling using jQuery easing
      $(document).on('click', 'a.scroll-to-top', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
      });

      $(document).on("click","#btnCheckQuestion",function() {
        $.ajax({
          url: '/Admins/CheckQuestion',
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
            questionId: $('#questionId').val()
          },
          success: function (response) {
              console.log(response);
              window.location.href="/Admins/UncheckedQuestion";
              alert("Câu hỏi đã được xét duyệt");
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
        if(right_answer==0){
          alert("Phải check ít nhất 1 đáp án đúng!");
          return;
        }
        if(right_answer==number_answer){
          alert("Không được check hết đáp án!");
          return;
        }
        var is_multichoise= (right_answer>1 ? 1:0); 
        var content = CKEDITOR.instances['questionContent'].getData();
        var level_id=$('#updateQuestionLevel').val();
        var topic_id=$('#updateQuestionSubject').val();
        var class_id=$('#updateQuestionClass').val();
        // var data = {"question_id":question_id,"content":content,"img_link": null,"topic_id":topic_id,"level_id":level_id,"class_id":class_id,
                  // "is_multichoise":is_multichoise,"number_answer":n_answer};
        var jsonArray1=[];
     
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
          var question=[{"id":answer_id,"content":answer,"is_correct_answer":is_correct_answer,"img_link":img_link}];
          // alert(JSON.stringify(question));
          jsonArray1 = jsonArray1.concat(question);

        }   
        var object1 = {"answer":jsonArray1};
        question={"question_id":question_id,"question_content":content,"class_id":class_id,"level_id":level_id,"topic_id":topic_id};
        $.extend(question, object1);
        $.ajax({
          url: '/Admins/UpdateQuestion',
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
            updateAnswer:question
          },
          success: function (response) {
            console.log(response);
            alert("Cập nhật câu hỏi thành công");
            location.replace(document.referrer);
          },
          error: function (response) {
            console.log(response);
            alert("Loi");
          }
        });

      });
      
  });
});
    
    })(jQuery); 
    
    function blockUser(userId,status){
      if(status==1){
        if(!confirm("Bạn có muốn chặn user này?")) return;
      } else{
        if (!confirm("Bạn có muốn bỏ chặn user này?")) return;
      }
      $.ajax({
        url: '/Admins/BlockUser',
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
          userId: userId
        },
        success: function (response) {
            console.log(response);
            alert("Thực hiện thành công");
            window.location.reload();
        },
        error: function (response) {
            console.log(response);
            alert("Đã xảy ra lỗi");
        }
      });
    }
    function showProfile(userId){
      $.ajax({
        url: '/Admins/GetInfoUser',
        type: "GET",
        dataType: "json",
        data: {
          userId: userId
        },
        success: function (response) {
            console.log(response);
            $('#username').val(response['username']);
            $('#fullname').val(response['info']['fullname']);
            $('#address').val(response['info']['address']);
            $('#phone').val(response['info']['phone']);
            $('#dayOfBirth').val(response['info']['day_of_birth']);
            $('#gender').val(response['info']['gender']);
            $('#email').val(response['email']);
        },
        error: function (response) {
            console.log(response);
            alert("Đã xảy ra lỗi");
        }
      });
    }

    function checkQuestion(questionId){
      if(!confirm("Bạn muốn duyệt câu hỏi này?")) return;
      $.ajax({
        url: '/Admins/CheckQuestion',
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
          questionId: questionId
        },
        success: function (response) {
            console.log(response);
            alert("Câu hỏi đã được xét duyệt");
            location.reload();
        },
        error: function (response) {
            console.log(response);
            alert("Đã xảy ra lỗi");
        }
      });
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
            window.location.href="/Admins/UncheckedQuestion";
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


  
    
    




// // Chart.js scripts
// // -- Set new default font family and font color to mimic Bootstrap's default styling
// Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = '#292b2c';

// // -- Area Chart Example
// var ctx = document.getElementById("myAreaChart");
// var myLineChart = new Chart(ctx, {
//   type: 'line',
//   data: {
//     labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
//     datasets: [{
//       label: "Sessions",
//       lineTension: 0.3,
//       backgroundColor: "rgba(2,117,216,0.2)",
//       borderColor: "rgba(2,117,216,1)",
//       pointRadius: 5,
//       pointBackgroundColor: "rgba(2,117,216,1)",
//       pointBorderColor: "rgba(255,255,255,0.8)",
//       pointHoverRadius: 5,
//       pointHoverBackgroundColor: "rgba(2,117,216,1)",
//       pointHitRadius: 20,
//       pointBorderWidth: 2,
//       data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
//     }],
//   },
//   options: {
//     scales: {
//       xAxes: [{
//         time: {
//           unit: 'date'
//         },
//         gridLines: {
//           display: false
//         },
//         ticks: {
//           maxTicksLimit: 7
//         }
//       }],
//       yAxes: [{
//         ticks: {
//           min: 0,
//           max: 40000,
//           maxTicksLimit: 5
//         },
//         gridLines: {
//           color: "rgba(0, 0, 0, .125)",
//         }
//       }],
//     },
//     legend: {
//       display: false
//     }
//   }
// });

// // -- Bar Chart Example
// var ctx = document.getElementById("myBarChart");
// var myLineChart = new Chart(ctx, {
//   type: 'bar',
//   data: {
//     labels: ["January", "February", "March", "April", "May", "June"],
//     datasets: [{
//       label: "Revenue",
//       backgroundColor: "rgba(2,117,216,1)",
//       borderColor: "rgba(2,117,216,1)",
//       data: [4215, 5312, 6251, 7841, 9821, 14984],
//     }],
//   },
//   options: {
//     scales: {
//       xAxes: [{
//         time: {
//           unit: 'month'
//         },
//         gridLines: {
//           display: false
//         },
//         ticks: {
//           maxTicksLimit: 6
//         }
//       }],
//       yAxes: [{
//         ticks: {
//           min: 0,
//           max: 15000,
//           maxTicksLimit: 5
//         },
//         gridLines: {
//           display: true
//         }
//       }],
//     },
//     legend: {
//       display: false
//     }
//   }
// });

// // -- Pie Chart Example
// var ctx = document.getElementById("myPieChart");
// var myPieChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     labels: ["Blue", "Red", "Yellow", "Green"],
//     datasets: [{
//       data: [12.21, 15.58, 11.25, 8.32],
//       backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
//     }],
//   },
// });



@extends('layouts.admin.app')
@section('title_page')
<title>Admin page</title>
@endsection
@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <b>Trang chủ</b>
        </li>
        <li class="breadcrumb-item active">Thống kê</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-question"></i>
              </div>
              <div class="mr-6" style="font-size:20px;"><center><?php echo $question ?> câu hỏi !</center></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Thống kê</span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-6" style="font-size:20px;"><center><?php echo $quizz ?> bài quizz !</center></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Thống kê</span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-6" style="font-size:20px;"><center><?php echo $teacher ?> giáo viên !</center></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Thống kê</span>
              
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-6" style="font-size:20px;"><center><?php echo $student ?> thí sinh !</center></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Thống kê</span>
            </a>
          </div>
        </div>        
      </div>
      <div class="row" >
      <div class="col-sm-6" style="width: 400px; height: 100px;">
          <canvas id="chart" ></canvas>
            <script>
           new Chart(document.getElementById("chart"), {
                type: 'pie',
                data: {
                  labels: ["Giáo viên","Thí sinh","Bài quizz","Câu hỏi"],
                  datasets: [
                    {
                      label: "Số câu đúng",
                      backgroundColor: ["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)","rgb(54, 162, 235)","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                      data: [<?php echo $teacher?>,<?php echo $student ?>, <?php echo $quizz ?>, <?php echo $question ?>]
                    }
                  ]
                },
                options: {
                  legend: { display: true },
                  title: {
                    display: true,
                    text: 'BIỂU ĐỒ THỐNG KÊ HỆ THỐNG',
                    fontSize:20
                  },
                  tooltips: {
                      callbacks: {
                          label: function(tooltipItem, data) {
                              var allData = data.datasets[tooltipItem.datasetIndex].data;
                              var tooltipLabel = data.labels[tooltipItem.index];
                              var tooltipData = allData[tooltipItem.index];
                              var total = 0;
                              for (var i in allData) {
                                  total += allData[i];
                              }
                              var tooltipPercentage = Math.round((tooltipData / total) * 100);
                              return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
                          }
                      }
                  }
                }
            });
          </script>		
          </div>
          <div class="col-sm-6" style="width: 400px; height: 200px;">
            <canvas id="bar-chart" ></canvas>
            <script>
           new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                  labels: [<?php 
                      for($i=0;$i<count($top10);$i++){
                        if($i!=count($top10)-1){
                        echo "'".$top10[$i]['fullname']."(".$top10[$i]['topic_name'].")',";
                        } else{
                          echo "'".$top10[$i]['fullname']."(".$top10[$i]['topic_name'].")'";
                        }
                      }
                    ?>],
                  datasets: [
                    {
                      label: "Điểm số",
                      backgroundColor: ["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)","rgb(54, 162, 235)","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                      data: [<?php 
                      for($i=0;$i<count($top10);$i++){
                        if($i!=count($top10)-1){
                          echo $top10[$i]['score'].",";
                        } else{
                          echo $top10[$i]['score'];
                        }
                      }
                    ?>]
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  title: {
                    display: true,
                    text: 'Top 5 thí sinh có điểm số cao nhất',
                    fontSize:20
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          },

                      }]
                  }
                }
            });
          </script>
          </div>	
          
        </div>	
        
    </div>      

@endsection

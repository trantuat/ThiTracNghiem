
@extends('layouts.teacher.app')
@section('title_page')
<title>Trang chủ</title>
@endsection
@section('content')
      <div class="container-fluid">
        <div style="width: 80%; height: 70%;">
          <canvas id="bar-chart" ></canvas>
          <script>
          new Chart(document.getElementById("bar-chart"), {
                type: 'doughnut',
                data: {
                  labels: ["Câu hỏi đã đăng", "Câu hỏi chờ duyệt"],
                  indexLabelFontFamily: "Garamond",
                  indexLabelFontSize: 20,
                  fontSize: 20,
                  datasets: [
                    {
                      label: "Câu hỏi",
                      showPercentInTooltip: true,
                      backgroundColor: ["green", "black","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                      data: [<?php echo $public ;?> ,<?php echo $nonpublic ;?>]
                    }
                  ],
                  dataPoint:[10,20]
                },
                options: {
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
                  },
                  legend: { 
                    display: true 
                  },
                  title: {
                    display: true,
                    text: 'THỐNG KÊ SỐ CÂU HỎI CÁ NHÂN',
                    fontSize: 20
                  }
                }
            });
           
            
          </script>
      </div>
     
    </div>
@endsection


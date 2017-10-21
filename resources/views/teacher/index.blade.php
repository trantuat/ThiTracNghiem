@extends('layouts.teacher.app')
@section('title_page')
<title>Teacher page</title>
@endsection
@section('content')
      <div class="container-fluid">
      <div style="width: 100%; height: 80%;">
      <canvas id="bar-chart" ></canvas>
      <script>
       new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
              labels: ["Africa", "Asia", "Europe", "Latin America", "North America","Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [
                {
                  label: "Population (millions)",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                  data: [10,7,3,2,5,10,7,3,2,5]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Predicted world population (millions) in 2050'
              }
            }
        });
      </script>
     
      </div>
     
      </div>
@endsection

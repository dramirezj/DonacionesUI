var filtrado = false;

$(window).ready(function() {

  $("#filtrar").click(function() {

    enterprise_id = $("#enterprise_id").val();

    if(enterprise_id != "NULL") {

      generarGraficoFiltrado(enterprise_id);
      $("#filtro").show();
      $("#todo").hide();
      filtrado = true;

    }

  });

  $("#limpiar").click(function() {

    window.location.reload(true);
    filtrado = false;

  });

  if(!filtrado)
    generarGrafico();

});

function generarGrafico() {

  $.ajax({
      
    url: "controlador/graphic.controller.php",
    method: "POST",
    datatype: "json",
    success: function(data) {

      datasets = generarDataset(data);

      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      var areaChart       = new Chart(areaChartCanvas);
      var areaChartData = {
        labels  : ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: datasets
      }

      var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale               : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - Whether the line is curved between points
        bezierCurve             : true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension      : 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot                : true,
        //Number - Radius of each point dot in pixels
        pointDotRadius          : 2,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth     : 2,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke           : true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth      : 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill             : false,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio     : true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive              : true
      }
      
      //Create the line chart
      areaChart.Line(areaChartData, areaChartOptions);

    }

  });

};

function generarGraficoFiltrado(enterprise_id) {

  $.ajax({
      
    url: "controlador/graphic.controller.php",
    method: "POST",
    datatype: "json",
    data : {

      enterprise_id: enterprise_id

    },
    success: function(data) {

      console.log(data);

      datasets = generarDataset(data);

      var areaChartCanvas = $('#areaChart1').get(0).getContext('2d')
      var areaChart       = new Chart(areaChartCanvas);
      var areaChartData = {
        labels  : ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: datasets
      }

      var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale               : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - Whether the line is curved between points
        bezierCurve             : true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension      : 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot                : true,
        //Number - Radius of each point dot in pixels
        pointDotRadius          : 2,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth     : 2,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke           : true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth      : 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill             : false,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio     : true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive              : true
      }
      
      //Create the line chart
      areaChart.Line(areaChartData, areaChartOptions);

    }

  });

}

function generarDataset(datos) {

  let datasets = [];
  let resultado = JSON.parse(datos);
  
  for(i = 0; i < resultado.length; i++) {
    
    let color = colorRGB();
    let label = resultado[i]["app_name"];
    let data = resultado[i]["datos"];
    let cantidades = [];

    for(j = 0; j < data.length; j++) {
      cantidades.push(data[j]["cantidad"]);
    }

    let dataset = new Object();
    dataset.label                = label;
    dataset.data                 = cantidades;
    dataset.fillColor            = color;
    dataset.strokeColor          = color;
    dataset.pointColor           = color;
    dataset.pointStrokeColor     = color;
    dataset.pointHighlightFill   = color;
    dataset.pointHighlightStroke = color;

    datasets.push(dataset);

  }

  return datasets;

}

function colorRGB() {

  R = Math.floor(Math.random(0,255) * (255 - 0)) + 0;
  G = Math.floor(Math.random(0,255) * (255 - 0)) + 0;
  B = Math.floor(Math.random(0,255) * (255 - 0)) + 0;

  return "rgba(" + R + "," + G + "," + B + ", 0.8)";

}

function limpiarGrafico() {
  var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
  var areaChart       = new Chart(areaChartCanvas);

  areaChart.destroy();
  filtrado = false;

}
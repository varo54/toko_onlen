<div class="container-fluid"> 

<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Keuntungan (<?php echo date('F');?>)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($pendapatan_bulan,0,',','.') ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Keuntungan Harian</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($pendapatan_hari,0,',','.') ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Barang belum sampai</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

  // Create the data table.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Topping');
  data.addColumn('number', 'Slices');
  data.addRows([
    <?php foreach($chart_barang as $chart):?>
    ['<?php echo $chart->nama_brg?>', <?php echo $chart->total ?>],
    <?php endforeach; ?>
  ]);

  // Set chart options
  var options = {'title':'Barang Paling Laku Di Toko',
                 'width':530,
                 'height':400};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>

<script type="text/javascript">

// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart2);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart2() {

  // Create the data table.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Topping');
  data.addColumn('number', 'Barang Terjual');
  data.addRows([
    ['Januari', <?php echo $chart_bulan1?>],
    ['Februari', <?php echo $chart_bulan2?>],
    ['Maret', <?php echo $chart_bulan3?>],
    ['April', <?php echo $chart_bulan4?>],
    ['Mei', <?php echo $chart_bulan5?>],
    ['Juni', <?php echo $chart_bulan6?>],
    ['Juli', <?php echo $chart_bulan7?>],
    ['Agustus', <?php echo $chart_bulan8?>],
    ['September', <?php echo $chart_bulan9?>],
    ['Oktober', <?php echo $chart_bulan10?>],
    ['November', <?php echo $chart_bulan11?>],
    ['Desember', <?php echo $chart_bulan12?>],
  ]);

  // Set chart options
  var options = {'title':'Keuntungan bulanan pada tahun 2021',
                 'width':530,
                 'height':400};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
  chart.draw(data, options);
}
</script>

<div class="col-xl-6 col-md-6 mb-4">
<div id="chart_div"> </div>
</div>

<div class="col-xl-6 col-md-6 mb-4">
<div id="chart_div2"> </div>
</div>

  
<?php echo $chart_bulan4 ?> 


</div>













<!-- Content Row -->

</div>
@extends('admin.index')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detai Survey
      </h1>
      <ol class="breadcrumb">
        <li><a href="/hasilsurvey"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detail Survey</li>
      </ol>
    </section>

    <!-- Main content -->
    @php
        $array = array(
            $data->review->kerapihan,
            $data->review->efisiensi,
            $data->review->keramahan,
            $data->review->kepuasan
        );
        $avg = array_sum($array)/4;
    @endphp
    <section class="content">
        <table class="table">
            <tr>
                <th colspan="3" class="col text-center"><h2>Profile Teknisi</h2></th>
            </tr>
            <tr>
                <td rowspan="6" class="col" width="180"> <img src="/teknisi.png" width="150"> </td>
                <td class="col">{{$data->user->id_teknisi}}</td>
                <td rowspan="6" class="col text-center"><h1 class="display-1">{{$avg}}</h1></td>
            </tr>
            <tr>
                <td class="col">{{$data->user->no_hp}}</td>
            </tr>
            <tr>
                <td class="col">{{$data->user->name}}</td>                             
            </tr>
            <tr>
                <td class="col">Tim : </td>                
            </tr>
            <tr>
                <td class="col">{{$data->user->anggota1}}</td>  
            </tr>
            <tr>                
                <td class="col">{{$data->user->anggota2}}</td> 
            </tr>
        </table>

        <div id="diagram_batang"> </div> 

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col">Kerapihan Instalasi</th>
                        <th class="col">Keterangan</th>
                        <th class="col">Efisiensi Waktu</th>
                        <th class="col">Keterangan</th>
                        <th class="col">Keramahan</th>
                        <th class="col">Keterangan</th>
                        <th class="col">Kepuasan</th>
                        <th class="col">Keterangan</th>
                        <th class="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->review->kerapihan}}</td>
                        <td>{{$data->review->desc_kerapihan}}</td>
                        <td>{{$data->review->efisiensi}}</td>
                        <td>{{$data->review->desc_efisiensi}}</td>
                        <td>{{$data->review->keramahan}}</td>
                        <td>{{$data->review->desc_keramahan}}</td>
                        <td>{{$data->review->kepuasan}}</td>
                        <td>{{$data->review->desc_kepuasan}}</td>
                        <td>{{$avg}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><b>Kritik dan Saran</b></div>
            <div class="panel-body">{{$data->review->kritik_saran}}</div>
        </div>

    </section>
    <!-- /.content -->
  </div>

  <script>
      var kategori = ['Kerapihan Instalasi', 'Efisiensi Waktu', 'Keramahan', 'Kepuasan'];

      $('#diagram_batang').highcharts({
		chart: {
			type: 'bar',
		},
		title: {
			text: 'Grafik Survei'
		},
		series: [
			{
				pointWidth: 30,
				data: [
					{y: <?php echo $data->review->kerapihan ?>, color: 'blue'},
					{y: <?php echo $data->review->efisiensi ?>, color: 'green'},
					{y: <?php echo $data->review->keramahan ?>, color: 'orange'},
					{y: <?php echo $data->review->kepuasan ?>, color: 'red'},
					]
			},
		],
		yAxis: {
			allowDecimals: false
		},
		xAxis: {
			categories: kategori,
			allowDecimals: true
		},
	});
  </script>
@endsection
<script src="{{asset ('js/jquery.js')}}"></script>
<script src="{{asset ('js/highcharts.src.js')}}"></script>
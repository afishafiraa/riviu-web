@extends('admin.index')
  @section('content')

  @php
        $trapi=0;
        $tefisien=0;
        $tramah=0;
        $tpuas=0;
        $i=0;
        foreach ($all as $row) {

            $trapi+=$row->review->kerapihan;
            $tefisien+=$row->review->efisiensi;
            $tramah+=$row->review->keramahan;
            $tpuas+=$row->review->kepuasan;
            $i++;
        }

        if ($i===0) {
            $trapi = $trapi/1;
            $tefisien = $tefisien/1;
            $tramah = $tramah/1;
            $tpuas = $tpuas/1;
        } else {
            $trapi = $trapi/$i;
            $tefisien = $tefisien/$i;
            $tramah = $tramah/$i;
            $tpuas = $tpuas/$i;
        }
        
        $trapi = number_format((float)$trapi, 2, '.', '');
        $tefisien = number_format((float)$tefisien, 2, '.', '');
        $tramah = number_format((float)$tramah, 2, '.', '');
        $tpuas = number_format((float)$tpuas, 2, '.', '');
        
        $tavg=($trapi+$tefisien+$tramah+$tpuas)/4;
        $tavg = number_format((float)$tavg, 2, '.', '');

    @endphp

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile Akun Teknisi
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile Akun Teknisi</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content">
        <table class="table">
            <tr>
                <th colspan="3" class="col text-center"><h2>Profile Teknisi</h2></th>
            </tr>
            <tr>
                <td rowspan="3" class="col" width="180"> <img src="/teknisi.png" width="150"> </td>
                <td class="col">{{$user->name}}</td>
            <td rowspan="3" class="col text-center"><h1 class="display-1"> {{$tavg}} </h1></td>
            </tr>
            <tr>
                <td class="col">{{$user->no_hp}}</td>
            </tr>
            <tr>
                <td class="col">{{$user->id_teknisi}}</td>
            </tr>
        </table>

        <div id="diagram_batang"> </div> 

        

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col">No</th>
                        <th class="col">Bulan</th>
                        <th class="col">Kerapihan Instalasi</th>
                        <th class="col">Efisiensi Waktu</th>
                        <th class="col">Keramahan</th>
                        <th class="col">Kepuasan</th>
                        <th class="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no=1;
                    setlocale(LC_ALL, 'id_ID');
                    // $date=$data->created_at;
                    $drapi = array();
                    $defisien = array();
                    $dramah = array();
                    $dpuas = array();
                    $dbulan = array();
                    @endphp
                    @foreach($data as $post)
                    <tr>
                        
                        @php
                            $rapi=0;
                            $efisien=0;
                            $ramah=0;
                            $puas=0;
                            $i=0;

                            foreach ($post as $row) {
                
                                $rapi+=$row->review->kerapihan;
                                $efisien+=$row->review->efisiensi;
                                $ramah+=$row->review->keramahan;
                                $puas+=$row->review->kepuasan;
                                $i++;

                                // testteasda
                                // test
                            }
                
                            if ($i===0) {
                                $rapi = $rapi/1;
                                $efisien = $efisien/1;
                                $ramah = $ramah/1;
                                $puas = $puas/1;
                            } else {
                                $rapi = $rapi/$i;
                                $efisien = $efisien/$i;
                                $ramah = $ramah/$i;
                                $puas = $puas/$i;
                            }
                            
                            $rapi = number_format((float)$rapi, 2, '.', '');
                            $efisien = number_format((float)$efisien, 2, '.', '');
                            $ramah = number_format((float)$ramah, 2, '.', '');
                            $puas = number_format((float)$puas, 2, '.', '');
                            
                            $avg=($rapi+$efisien+$ramah+$puas)/4;
                            $avg = number_format((float)$avg, 2, '.', '');
                
                            // $dbulan->push(date("M Y", strtotime($post[0]->created_at)));
                            $tempbulan = "'".date("M Y", strtotime($post[0]->created_at))."'";
                            array_push($dbulan,$tempbulan);
                            array_push($defisien,$efisien);
                            array_push($dramah,$ramah);
                            array_push($dpuas,$puas);
                            array_push($drapi,$rapi);

                        @endphp
                        {{-- coba fi | wait | cek wa--}}
                        <th scope="row">{{$no++}}</th>
                        {{-- <th scope="row">{{$post[0]->created_at}}</th> --}}
                        {{-- <td>{{ $bulan }}</td> --}}
                        <td>{{ date("M Y", strtotime($post[0]->created_at)) }}</td>
                        {{-- {{ date("M", strtotime($post->created_at)) }} --}}
                        <!-- test udah kesave belum | kebawah coba, yg error dibawah--> 
                        <td>{{$rapi}}</td>
                        <td>{{$efisien}}</td>
                        <td>{{$ramah}}</td>
                        <td>{{$puas}}</td>
                        
                        <td>{{$avg}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">No Tiket</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; 
                    setlocale(LC_ALL, 'id_ID');
                    $dbulan = implode(",", $dbulan);
                    $drapi = implode(",", $drapi);
                    $defisien = implode(",", $defisien);
                    $dramah = implode(",", $dramah);
                    $dpuas = implode(",", $dpuas);
                    // $drapi->toJson();
                    // $defisien->toJson();
                    // $dramah->toJson();
                    // $dpuas->toJson();
                    @endphp
                    @foreach($all as $post)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{ date("j M Y", strtotime($post->created_at)) }}</td>
                        <td>{{$post->ticket_code}}</td>
                        <td>{{$post->customer_name}}</td>
                        <td>{{$post->customer_phone}}</td>
                        <td>
                            <a href="{{route('admin.detailSurvey',$post->id)}}" class=" btn btn-sm btn-primary"><i class="far fa-file-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
    <!-- /.content -->
  </div>

  <script>
      var kategori = ['Kerapihan Instalasi', 'Efisiensi Waktu', 'Keramahan', 'Kepuasan'];

      $('#diagram_batang').highcharts({
		chart: {
			type: 'column',
		},
		title: {
			text: 'Progress Pekerjaan'
		},
		series: [{
            name: 'Kerapihan',
            data: <?php echo '['.$drapi.']' ?>

        }, {
            name: 'Efisiensi',
            data: <?php echo '['.$defisien.']' ?>

        }, {
            name: 'Keramahan',
            data: <?php echo '['.$dramah.']' ?>

        }, {
            name: 'Kepuasan',
            data: <?php echo '['.$dpuas.']' ?>

        }],
		yAxis: {
			allowDecimals: true,
            max: 5
		},
		xAxis: {
			categories: <?php echo '['.$dbulan.']' ?>,
			allowDecimals: true
		},
    });
    
    

  </script>
@endsection
<script src="{{asset ('js/jquery.js')}}"></script>
<script src="{{asset ('js/highcharts.src.js')}}"></script>
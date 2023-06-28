@extends('admin.index')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Teknisi
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Teknisi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    @if(Session::has('alert-success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
        </div>
    @endif

        <table id="myTable" class="table table-bordered table-hover">
            <thead >
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">ID Teknisi</th>
                <th scope="col" class="text-center">Nama Lengkap</th>
                <th scope="col" class="text-center">No HP</th>
                <th scope="col" class="text-center">Kinerja</th>
                <th scope="col" class="text-center">Keterangan</th>
                {{-- <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Aksi</th> --}}
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($data as $post)
                    
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
          
                            $idteknisi = $row->user->id;
                            $id_teknisi = $row->user->id_teknisi;
                            $name = $row->user->name;
                            $no_hp = $row->user->no_hp;
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
          
                        
                    @endphp
                    <td scope="row" class="text-center">{{$no++}}</td>
                    <td scope="row" class="text-center">{{$id_teknisi}}</td>
                    <td scope="row" class="text-center">{{$name}}</td>
                    <td scope="row" class="text-center">{{$no_hp}}</td>
                    <td scope="row" class="text-center">{{$avg}}</td>
                    <td scope="row" class="text-center"><a href="{{route('admin.detailTeknisi',$idteknisi)}}">lihat detail</a></td>
                    {{-- <td class="text-center">{{$r->status}}</td>
                    <td class="text-center">
                        <a href="{{route('insert-cek',$id)}}" style="color:white" class="btn btn-primary btn-sm">
                            Masukan data
                        </a>
                    </td> --}}
                </tr> 
                @endforeach
                @foreach ($teknisi as $baris)
                    
                <tr>
                    <td scope="row" class="text-center">{{$no++}}</td>
                    <td scope="row" class="text-center">{{$baris->id_teknisi}}</td>
                    <td scope="row" class="text-center">{{$baris->name}}</td>
                    <td scope="row" class="text-center">{{$baris->no_hp}}</td>
                    <td scope="row" class="text-center">0.00</td>
                    <td scope="row" class="text-center"><a href="{{route('admin.detailTeknisi',$baris->id)}}">lihat detail</a></td>
                    {{-- <td class="text-center">{{$r->status}}</td>
                    <td class="text-center">
                        <a href="{{route('insert-cek',$id)}}" style="color:white" class="btn btn-primary btn-sm">
                            Masukan data
                        </a>
                    </td> --}}
                </tr> 
                @endforeach
            </tbody>
          </table>
    
  
    <!-- End Section before end -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('js')
<script>
  $(document).ready( function () {
    $('#myTable').DataTable( {
        "order": [[ 4, "desc" ]]
    } );
  } );
</script>
@endsection
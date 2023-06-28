@extends('admin.index')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content" style="overflow:hidden">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Hasil Survey
      </h1>
      <br/>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Hasil Survey</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding:0">
    
    @if(Session::has('alert-success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
        </div>
    @endif

      <div class="container-fluid">
          <div class="row">
              <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                      <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">No Tiket </th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th class="text-center">No HP </th>
                            <th class="text-center">ID Teknisi</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $no=1; 
                            setlocale(LC_ALL, 'id_ID')
                            @endphp
                            @foreach($data as $post)
                              <tr>
                                <td>{{$no++}}</td>
                                <td>{{ date("j M Y", strtotime($post->created_at)) }}</td>
                                <td>{{$post->ticket_code}}</td>
                                <td>{{$post->customer_name}}</td>
                                <td>{{$post->customer_phone}}</td>
                                <td class="text-center">{{$post->user->id_teknisi}}</td>
                                <td style="color:darkgray; float:initial;" class="text-center">
                                  <a href="{{route('admin.detailSurvey',$post->id)}}" class=" btn btn-sm btn-primary"><i class="far fa-file-alt"></i></a>
                                </td>
                              </tr>
                              @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">No Tiket </th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th class="text-center">No HP </th>
                            <th class="text-center">ID Teknisi</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
    </div>
    <!-- End Section before end -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('js')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
  
@endsection
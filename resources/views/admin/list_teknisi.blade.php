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

    <a style="float:right;padding:10px;" href="{{ route('teknisi.create') }}" class=" btn btn-sm btn-primary" >Tambah</a>
    <div class="container">
    
    <table id="myTable" class="table table-striped">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>ID Teknisi</th>
        <th>Nama Lengkap</th>
        <th>No HP </th>
        <th>Kinerja</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @php $no=1; @endphp
      @foreach($data as $post)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$post->id_teknisi}}</td>
        <td>{{$post->name}}</td>
        <td>{{$post->no_hp}}</td>
        <td><a href="{{route('admin.detailTeknisi',$post->id)}}">lihat detail</a></td>
        <td>
            <form action="{{ route('teknisi.destroy', $post->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{ route('teknisi.edit',$post->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
    <!-- End Section before end -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('js')
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
@endsection
<style>
  .bg {
      background-image: url(back-telkom.png);
      background-color:#0000FF;
      background-position: center;
  }
</style>
@extends('admin.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content">
  
  
      <div class="text-center">
        <br/>
        <br/>
        <h1> Selamat Datang, Admin!</h1>
        <h3> Pilih salah satu menu</h1>
        <br/>
        <br/>
        <br/>
      </div>
  
      <div class="text-center">
      <a href="{{ route('teknisi.index') }}" class=" btn btn-sm btn-primary" style="margin:20px;"><img src="{{ asset('img/teknisi.png') }}" width="150" height="150"></a>
        <a href="{{ route('admin.hasilSurvey') }}" class=" btn btn-sm btn-primary" style="margin:20px;"><img src="{{ asset('img/survey.png') }}" width="150" height="150"></a>
      </div>
      
      </section>
      <!-- /.content -->
    </div>
  
@endsection
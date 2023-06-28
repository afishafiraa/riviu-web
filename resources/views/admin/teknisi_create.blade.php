@extends('admin.index')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
        <section class="content-header">
            <h1>
                Data Teknisi
            </h1>
            <ol class="breadcrumb">
                <li><a href="/teknisi"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Data Teknisi</li>
             </ol>
        </section>
        <hr>
            <!-- Remove This Before You Start -->
            <div class ="box">
                <div class ="box-header">
                    <h1 class="box-title">Tambah Akun Teknisi</h1>
                    <hr>
                </div>

            <div class = "box-body">
            <form action="{{ route('teknisi.store') }}" method="post" encytype="multipart/form-data">
                {{ csrf_field() }}
				<div class="form-group">
                    <label for="id_teknisi">ID Teknisi:</label>
                    <input type="text" class="form-control" id="usr" name="id_teknisi" maxlength="10">
                    @if ($errors->has('id_teknisi'))
                    <div class="error" style="font-size:10pt;color:red">
                            <strong>{{ $errors->first('id_teknisi') }}</strong>
                    </div>
                    @endif
                </div>
				<div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="usr" name="name">
                    @if ($errors->has('name'))
                    <div class="error" style="font-size:10pt;color:red">
                            <strong>{{ $errors->first('name') }}</strong>
                    </div>
                    @endif
                </div>
				<div class="form-group">
                    <label for="nama_lengkap">Email:</label>
                    <input type="email" class="form-control" id="usr" name="email">
                    @if ($errors->has('email'))
                    <div class="error" style="font-size:10pt;color:red">
                            <strong>{{ $errors->first('email') }}</strong>
                    </div>
                    @endif
                </div>
				<div class="form-group">
                    <label for="no_hp">No HP:</label>
                    <input type="text" class="form-control" id="usr" name="no_hp" maxlength="13">
                    @if ($errors->has('no_hp'))
                    <div class="error" style="font-size:10pt;color:red">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="usr" name="password" minlength="8">
                    @if ($errors->has('password'))
                    <div class="error" style="font-size:10pt;color:red">
                            <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Re-password:</label>
                    <input type="password" class="form-control" id="usr" name="password_confirmation">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                <a type="reset" class="btn btn-md btn-danger" href="{{ route('teknisi.index') }}">Cancel</a>
                </div>
            </form>
            </div>
        </div>
     </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection
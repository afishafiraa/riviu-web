<style>
        .boxy{
            margin-top: 40px;
            text-align: center;
        }
</style>

@extends('layouts.bg')

@section('content')

<div class="container d-flex justify-content-center">
  
    <form  class="form-horizontal" method="POST" action="{{ route('review.simpan') }}">
        <br/>

        <h3>Form Ini Diisi Oleh Teknisi</h3></p>
        <hr>
        
            {{ csrf_field() }}
            {{-- ini hidden input  --}}
            <input type="hidden" name="ticket_code" value="{{$ticket}}">
        <div class="form-group">
            <label for="nama">Nama Pelanggan : </label>
            <input type="text" class="form-control" name="customer_name" id="nama" placeholder="Nama Pelanggan" >
            @if ($errors->has('customer_name'))
            <div class="error" style="font-size:10pt;color:red">
                    <strong>{{ $errors->first('customer_name') }}</strong>
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="nomor">Nomor Handphone : </label>
            <input type="text" class="form-control" name="customer_phone" id="nohp" placeholder="Nomor Handphone" >
            @if ($errors->has('customer_phone'))
            <div class="error" style="font-size:10pt;color:red">
                    <strong> {{ $errors->first('customer_phone') }} </strong>
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="nomor">Email Pelangan : </label>
            <input type="email" class="form-control" name="customer_email" id="email" placeholder="Email pelanggan" >
            @if ($errors->has('customer_email'))
            <div class="error" style="font-size:10pt;color:red">
                    <strong> {{ $errors->first('customer_email') }} </strong>
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="anggota1">Anggota 1 : </label>
            <input type="text" class="form-control" name="anggota1" id="anggota1" placeholder="Anggota 1" >
        </div>
        <div class="form-group">
            <label for="anggota2">Anggota 2 : </label>
            <input type="text" class="form-control" id="anggota2" name="anggota2" placeholder="Anggota 2" >
        </div>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
  </form>


    

@endsection
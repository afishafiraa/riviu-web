<style>
        .boxy{
            margin-top: 40px;
            text-align: center;
        }
        .img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            width:200px;
            height: 120px;
        }
</style>

@extends('layouts.bg')

@section('content')
            <a style="float:right;margin-bottom:0em;" class="btn btn-sm btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;margin-bottom:0px;">
                @csrf
            </form>

    <div class="row justify-content-center" style="margin-left:60px;">
        <br>
        <form method="POST" action="{{ route('ticket.store') }}" class="boxy px-4">
            {{ csrf_field() }}
            <div class="form-group">
                <img src="{{ asset('img/logo-telkom.png') }}" alt="Logo Telkom Indonesia" class="img">
            </div>
            <br/>
            <div class ="box-header">
                        <h5 class="box-title">Masukkan kode tiket layanan anda dibawah ini</h5>
                        <hr> 
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="ticket_code" placeholder="Kode Tiket" maxlength="10">
                @if ($errors->has('ticket_code'))
                <div class="error" style="font-size:10pt;color:red">
                        <strong>{{ $errors->first('ticket_code') }}</strong>
                </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
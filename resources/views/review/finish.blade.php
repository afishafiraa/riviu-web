<style>
        .boxy{
            margin-top: 40px;
            text-align: center;
        }
</style>

@extends('layouts.bg')
  @section('content')
    <div class ="boxy">
        <br/>
        <br/>
        <h3> Survey submitted, Thank You! </h3>
        <br/>
        <br/>
        <img src="/thumbs.png" class="img">
        <br/>
        <br/>
    <a href="{{ route('ticket.index') }}"><button class="btn btn-secondary" type="buttonx">Back to first page</button></a>
    </div>
    
  @endsection
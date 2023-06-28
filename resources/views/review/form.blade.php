<style>
        .boxy{
            margin-top: 40px;
            text-align: center;
        }
</style>

@extends('layouts.bg')

@section('content')

<div class="container">

<!-- Header -->
    <div class="boxy" style="margin-top: 2rem;">
        <h3>SURVEY KEPUASAN PELANGGAN</h3>
        <p>Silakan untuk memberi nilai kepada performa pekerjaan kami.</p>
        <hr>
    </div>

    <div class="d-flex justify-content-center">
        <div id="signupbox" style=" margin-top:10px" class="mainbox">
            <div class="panel panel-info">
                <div class="panel-body" >
                    <form  class="form-horizontal" method="POST" action="{{ route('review.save') }}">
                        {{ csrf_field() }}
                        {{-- ini hidden input  --}}
                        <input type="hidden" name="subjek_id" value="{{$data}}">
                        <!-- Kerapihan -->
                        <div id="kerapihan" class="form-group required"> 
                            <label for="kerapihan" class="control-label col-md-4 requiredField" style="margin-bottom: -0.5rem;"><b style="font-size: x-large;">Kerapihan</b><span class="asteriskField">*</span> </label>
                            <p style="margin-bottom: -0.3rem; margin-left: 1rem;">(Kerapihan instalasi yang dikerjakan teknisi)</p>
                            <div class="controls col-md-8 "> 
                                <div class="rate-kerapihan">
                                    <input type="radio" id="rapih5" name="kerapihan" value="5" />
                                    <label for="rapih5" title="text">5 stars</label>
                                    <input type="radio" id="rapih4" name="kerapihan" value="4" />
                                    <label for="rapih4" title="text">4 stars</label>
                                    <input type="radio" id="rapih3" name="kerapihan" value="3" />
                                    <label for="rapih3" title="text">3 stars</label>
                                    <input type="radio" id="rapih2" name="kerapihan" value="2" />
                                    <label for="rapih2" title="text">2 stars</label>
                                    <input type="radio" id="rapih1" name="kerapihan" value="1" />
                                    <label for="rapih1" title="text">1 star</label>
                                </div>
                                <input class="input-md textinput textInput form-control" id="kerapihan" name="desc_kerapihan" placeholder="Keterangan" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div> 
                        <!-- Keramahan -->
                        <div id="keramahan" class="form-group required"> 
                            <label for="keramahan" class="control-label col-md-4 requiredField" style="margin-bottom: -0.5rem;"><b style="font-size: x-large;">Keramahan</b><span class="asteriskField">*</span> </label>
                            <p style="margin-bottom: -0.3rem; margin-left: 1rem;">(Keramahan teknisi dalam melayani pelanggan)</p>
                            <div class="controls col-md-8 "> 
                                <div class="rate-keramahan">
                                    <input type="radio" id="ramah5" name="keramahan" value="5" />
                                    <label for="ramah5" title="text">5 stars</label>
                                    <input type="radio" id="ramah4" name="keramahan" value="4" />
                                    <label for="ramah4" title="text">4 stars</label>
                                    <input type="radio" id="ramah3" name="keramahan" value="3" />
                                    <label for="ramah3" title="text">3 stars</label>
                                    <input type="radio" id="ramah2" name="keramahan" value="2" />
                                    <label for="ramah2" title="text">2 stars</label>
                                    <input type="radio" id="ramah1" name="keramahan" value="1" />
                                    <label for="ramah1" title="text">1 star</label>
                                </div>
                                <input class="input-md textinput textInput form-control" id="keramahan" name="desc_keramahan" placeholder="Keterangan" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div> 
                        <!-- Efisiensi -->
                        <div id="efisiensi" class="form-group required"> 
                            <label for="efisiensi" class="control-label col-md-4 requiredField" style="margin-bottom: -0.5rem;"><b style="font-size: x-large;">Efisiensi</b><span class="asteriskField">*</span> </label>
                            <p style="margin-bottom: -0.3rem; margin-left: 1rem;">(Efisiensi waktu pengerjaan oleh teknisi)</p>
                            <div class="controls col-md-8 "> 
                                <div class="rate-efisiensi">
                                    <input type="radio" id="efisien5" name="efisiensi" value="5" />
                                    <label for="efisien5" title="text">5 stars</label>
                                    <input type="radio" id="efisien4" name="efisiensi" value="4" />
                                    <label for="efisien4" title="text">4 stars</label>
                                    <input type="radio" id="efisien3" name="efisiensi" value="3" />
                                    <label for="efisien3" title="text">3 stars</label>
                                    <input type="radio" id="efisien2" name="efisiensi" value="2" />
                                    <label for="efisien2" title="text">2 stars</label>
                                    <input type="radio" id="efisien1" name="efisiensi" value="1" />
                                    <label for="efisien1" title="text">1 star</label>
                                </div>
                                <input class="input-md textinput textInput form-control" id="efisiensi" name="desc_efisiensi" placeholder="Keterangan" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div> 
                        <!-- Kepuasan -->
                        <div id="kepuasan" class="form-group required"> 
                            <label for="kerapihan" class="control-label col-md-4 requiredField" style="margin-bottom: -0.5rem;"><b style="font-size: x-large;">Kepuasan</b><span class="asteriskField">*</span> </label>
                            <p style="margin-bottom: -0.3rem; margin-left: 1rem;">(Kepuasan pelanggan terhadap hasil kerja teknisi)</p>
                            <div class="controls col-md-8 "> 
                                <div class="rate-kepuasan">
                                    <input type="radio" id="kepuasan5" name="kepuasan" value="5" />
                                    <label for="kepuasan5" title="text">5 stars</label>
                                    <input type="radio" id="kepuasan4" name="kepuasan" value="4" />
                                    <label for="kepuasan4" title="text">4 stars</label>
                                    <input type="radio" id="kepuasan3" name="kepuasan" value="3" />
                                    <label for="kepuasan3" title="text">3 stars</label>
                                    <input type="radio" id="kepuasan2" name="kepuasan" value="2" />
                                    <label for="kepuasan2" title="text">2 stars</label>
                                    <input type="radio" id="kepuasan1" name="kepuasan" value="1" />
                                    <label for="kepuasan1" title="text">1 star</label>
                                </div>
                                <input class="input-md textinput textInput form-control" id="kepuasan" name="desc_kepuasan" placeholder="Keterangan" style="margin-bottom: 10px" type="text" />
                            </div>
                        <!-- Kritik dan saran -->
                        <div id="kritikdansaran" class="form-group required"> 
                            <label for="kritik_saran" class="control-label requiredField" style="margin-bottom: -0.5rem; margin-left: 1rem;"><b style="font-size: x-large;">Kritik & Saran</b> </label>
                            <p style="margin-left: 1rem;">(Kritik dan saran untuk layanan <b>myIndihome</b>)</p>
                            <div class="controls col-md-8 ">
                                <textarea class="input-md textinput textInput form-control" id="kritik_saran" name="kritik_saran" placeholder="Masukkan kritik ataupun saran" style="margin-bottom: 10px" type="text"></textarea>
                            </div>
                        </div>
                        <br/>
                        <div style="margin-left: 1rem;">
                            <input type="submit" class="btn btn-primary col-md-4" value="KIRIM"> 
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>

</div>

@endsection
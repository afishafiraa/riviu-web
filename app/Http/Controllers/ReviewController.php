<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Ticket;
use App\SubjekReview;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($id_random){
      
        $id = Crypt::decrypt($id_random);
        $data = SubjekReview::where('id',$id)->first();
        $data = $data->id;
        return view('review.form', compact('data'));
    }

    public function subjek($ticket){
        //$data = Review::all();
        return view('review.input-by-teknisi', compact('ticket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Review;
        $data->kerapihan = $request->kerapihan;
        $data->desc_kerapihan = $request->desc_kerapihan;
        $data->keramahan = $request->keramahan;
        $data->desc_keramahan = $request->desc_keramahan;
        $data->efisiensi = $request->efisiensi;
        $data->desc_efisiensi = $request->desc_efisiensi;
        $data->kepuasan = $request->kepuasan;
        $data->desc_kepuasan = $request->desc_kepuasan;
        $data->kritik_saran = $request->kritik_saran;
        $data->subjek_id = $request->subjek_id;
        $data->save();
        return redirect()->route('review.finish-p');
    }

    public function finishReview(){
        return view('review.finish');
    }

    public function finishpReview(){
        return view('review.finish-p');
    }

    public function simpan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|max:120',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|regex:/(08)[0-9]{9,11}$/'
            ]);


        if ($validator->passes()) {
            $tiket = new Ticket;
            $tiket->ticket_code = $request->ticket_code;
            $tiket->save();

            $data = new SubjekReview;
            $data->ticket_code = $request->ticket_code;
            $data->customer_name = $request->customer_name;
            $data->customer_phone = $request->customer_phone;
            $data->customer_email = $request->customer_email;
            $data->user_id = Auth::user()->id;
            $data->anggota1 = $request->anggota1;
            $data->anggota2 = $request->anggota2;
            
            $data->save();

            $id_random = Crypt::encrypt($data->id);
            Mail::to($request->customer_email)->queue(new ReviewEmail($id_random,$data));
            return redirect()->route('review.finish');
        } else{
            return redirect()->back()->withErrors($validator);
        }
    }

}

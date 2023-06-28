<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\SubjekReview;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct(){
        // $this->middleware('auth:admin');
    }

    /**
     * show the application dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        $user = User::all();

        return view('admin/dashboard', compact('user'));
    }

    public function index(){
        $data = User::role('teknisi')->get();

        return view('admin.list_teknisi', compact('data'));
    }

    public function topRank(){
        $data = SubjekReview::
            whereHas('review')
            ->with(['user','review'])
            ->get()
            ->groupBy('user_id');
            // dd($data);
        
        $teknisi = User::role('teknisi')->whereDoesntHave('review')->get();

        return view('admin.list_teknisi2', compact('data', 'teknisi'));
    }

    public function hasilSurvey(){
        $data = SubjekReview::with('user')->whereHas('review')->get();
        // $data = SubjekReview::with('user')->whereDoesntHave('review')->get(); ini yah

        return view('admin.hasil_survey', compact('data'));
    }
    public function pendingSurvey(){
        // $data = SubjekReview::with('user')->whereHas('review')->get();
        $data = SubjekReview::with('user')->whereDoesntHave('review')->get();

        return view('admin.hasil_survey2', compact('data'));
    }

    public function detailSurvey($id){
        $data = SubjekReview::with(['user','review'])->where('id', $id)->first();

        return view('admin.detail_survey', compact('data'));
    }

    public function detailTeknisi($id){
        $user = User::findOrFail($id);
        $data = SubjekReview::
                orderBy('created_at', 'asc') // ini ngurutin berdasar tanggal
                ->where('user_id', $id)
                ->whereHas('review')
                ->with(['user','review'])
                
                ->get()
                ->groupBy(function($d) {
                    return Carbon::parse($d->created_at)->format('m');
                });

        $all = SubjekReview::
                orderBy('created_at', 'asc') // ini ngurutin berdasar tanggal
                ->where('user_id', $id)
                ->whereHas('review')
                ->with(['user','review'])
                
                ->get();
                
        // let me delete this foreach, we move to detail_teknisi.blade.php = alrite
        // bagaimana? still looking for ideas

        
        return view('admin.detail_teknisi', compact('data','user', 'all'));
    }

    public function showUser(){
        $user = User::all();
        return view('admin/user', compact('user'));
    }

    public function addUser(){
        return view('admin/adduser');
    }

    public function storeUser(Request $request){
        $data = new User;
        $data->username = $request->username;
        $data->name = $request->name;
        $data->no_hp = $request->no_hp;
        $data->password = $request->password;

        $data->save();
        return redirect()->route('admin.user')->with('alert', 'Teknisi berhasil ditambahkan!');
    }

    public function destroyUser($id){
        User::destroy($id);
        return redirect()->route('admin.user')->with('alert', 'Teknisi berhasil dihapus!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teknisi_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_teknisi' => ['required', 'string', 'max:10','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->passes()) {
            $data = new User();
            $data->id_teknisi = $request->id_teknisi;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->no_hp = $request->no_hp;
            $data->password = bcrypt($request->password);
            $data->save();
            $data->assignRole('teknisi');
            return redirect()->route('teknisi.index')->with('alert-success','Berhasil Menambahkan Data!');
        } else {
            return redirect()->back()->withErrors($validator);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id',$id)->get();
        return view('admin.teknisi_edit',compact('data'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'id_teknisi' => ['required', 'string', 'max:10','unique:users,id_teknisi,'.$id],
                'name' => ['required', 'string', 'max:255'],
                'email' => 'email|max:255|unique:users,email,'.$id,
                'password' => ['string', 'min:8', 'confirmed'],
            ]);
        }else {
            $validator = Validator::make($request->all(), [
                'id_teknisi' => ['required', 'string', 'max:10','unique:users'],
                'name' => ['required', 'string', 'max:255'],
                'email' => 'email|max:255|unique:users,email,'.$id,
                // 'password' => ['string', 'min:8', 'confirmed'],
            ]);
        }
        
        if ($validator->passes()) {

            $data = User::where('id',$id)->first();
            $data->id_teknisi = $request->id_teknisi;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->no_hp = $request->no_hp;
            if ($request->password) {
                $data->password = bcrypt($request->password);
            }
            $data -> save();
            return redirect()->route('teknisi.index')->with(
                'alert-success','Data Berhasil diubah'
            );
        } else {
            return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('teknisi.index')->with('alert-success','Berhasil dihapus!');

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         //get posts
         $ship = Ship::all();
        //  $ship = DB::table('Ship')->whereNotNull('kedatangan')->simplePaginate(5);
        //  $ship1 = DB::table('Ship')->whereNotNull('keberangkatan')->simplePaginate(5);
        //  echo json_encode($ship);die();
         return view('home',['ship'=>$ship]);
    }
    public function create_page()
    {
         return view('create');
    }
    public function edit_page($id)
    {
        $ship = Ship::all()->where('id',$id)->first();
        // echo json_encode($ship);die();
        return view('edit',['ship'=>$ship]);   
    }

    public function delete($id)
    {
        // echo $id;die();
         $ship = Ship::where('id',$id)->delete();
         // echo json_encode($ship);die();
         return redirect()->route('home')
                        ->with('success','Ship deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kapal' => 'required',
            'schedule' => 'required',
            'status' => 'required',
            ]);

        $ship = new Ship;

        $ship->nama_kapal = $request->get('nama_kapal');
        $ship->schedule = $request->get('schedule');
        $ship->from = $request->get('from');
        $ship->kedatangan = $request->get('kedatangan');
        $ship->keberangkatan = $request->get('keberangkatan');
        $ship->destination = $request->get('destination');
        $ship->status = $request->get('status');

        $ship->save();

        return redirect()->route('home');
    }
    public function update(Request $request , $id)
    {
        $request->validate([
            'schedule' => 'required',
            'status' => 'required',
            ]);

        $ship = Ship::all()->where('id',$id)->first();

        $ship->schedule = $request->get('schedule');
        $ship->kedatangan = $request->get('kedatangan');
        $ship->from = $request->get('from');
        $ship->keberangkatan = $request->get('keberangkatan');
        $ship->status = $request->get('status');
        $ship->destination = $request->get('destination');

        $ship->save();

        return redirect()->route('home');
    }
}

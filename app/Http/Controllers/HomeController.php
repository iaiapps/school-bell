<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cluster;
use App\Models\Schedule;
use Illuminate\Http\Request;

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
        $kelompok = Cluster::where('active', 1)->first();
        // dd($kelompok);
        $hari = Carbon::today()->isoFormat('dddd');
        $schedules = Schedule::where('cluster_id', $kelompok->id)->where('day', $hari)->with('file:id,file')->get();
        // dd($schedules);
        return view('home', compact('schedules', 'kelompok'));
    }
}

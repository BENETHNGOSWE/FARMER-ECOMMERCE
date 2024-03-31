<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mazao;
use App\Models\Pembejeozakilimo;
use App\Models\Beizamazao;

class DashboardController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        $this->middleware('permission:view mazao', ['only' => ['index']]);
        $this->middleware('permission:create mazao', ['only' => ['create', 'store']]);
        $this->middleware('permission:update mazao', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete mazao', ['only' => ['destroy']]);
        // $this->data['mazaos'] = Mazao::all();
        // $this->date['pembejeos'] = Pembejeozakilimo::all();
        $this->data['beizamazaos'] = Beizamazao::all();
        
    }

    public function index()
    {
        if(auth()->user()->hasRole('super-admin')){
            $this->data['mazaos'] = Mazao::all();
            $this->data['jumlayamazao'] = Mazao::all()->count();


        }else{
            $this->data['mazaos'] = auth()->user()->mazaos;
            $this->data['jumlayamazao'] = auth()->user()->mazaos->count();
        }
        
        $this->data['beizamazaos'] = Beizamazao::all();
        return view('dashboardpages.home', $this->data);
    }

    public function indexfront(){
        $this->data['mazaos'] = Mazao::all();
        return view('welcome', $this->data);
    }
}

<?php

namespace App\Http\Controllers\Bei;

use App\Http\Controllers\Controller;
use App\Models\Beizamazao;
use App\Models\Makundiyamazao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeizamazaoController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        $this->middleware('permission:view beizamazao', ['only' => ['index']]);
        $this->middleware('permission:create beizamazao', ['only' => ['create', 'store']]);
        $this->middleware('permission:update beizamazao', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete beizamazao', ['only' => ['destroy']]);
        $this->data['beizamazaos'] = Beizamazao::all();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('beizamazao.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['makundiyamazaos'] = Makundiyamazao::pluck('jinalakundi', 'id');
        return view('beizamazao.create', $this->data);
    }

    public function validate_beizamazao(Request $request)
    {
        return $request->validate([
            'makundiyamazao_id' => 'required|integer|exists:makundiyamazaos,id',
            'name' => 'required|string|max:255',
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:0',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate_beizamazao($request);

        try {
            DB::beginTransaction();
            $beizamazao = new Beizamazao();
            $beizamazao->fill($validate);
            $beizamazao->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th->getMessage() . '' . $th->getTraceAsString());
            return back()->with('error', $th->getMessage());
        }
        return to_route('beizamazao.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beizamazao $beizamazao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beizamazao $beizamazao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beizamazao $beizamazao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beizamazao $beizamazao)
    {
        //
    }
}

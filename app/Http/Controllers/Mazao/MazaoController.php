<?php

namespace App\Http\Controllers\Mazao;

use App\Http\Controllers\Controller;
use App\Models\Mazao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MazaoController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        // $this->middleware('permission:view product', ['only' => ['index']]);
        // $this->middleware('permission:create product', ['only' => ['create', 'store']]);
        // $this->middleware('permission:update product', ['only' => ['update', 'edit']]);
        // $this->middleware('permission:delete product', ['only' => ['destroy']]);
        $this->data['mazao'] = Mazao::all();
    }

    public function index()
    {
        // Get the total count of mazao
        $totalmazao = $mazao->count();

        return view('mazao.index', ['totalmazao' => $totalmazao]);
    }

    public function create()
    {
        $this->data['mazao'] = Mazao::all();
        return view('mazao.create', $this->data);
    }

    public function validate_mazao(Request $request)
    {
        return $request->validate([
            'mazao_jina' => 'required',
            'mazao_maelezo' => 'required',
            'mazao_bei' => 'required',
            'mazao_picha' => 'required',
        ]);
        
    }

    public function store(Request $request)
    {
        $validate = $this->validate_mazao($request);

        try {
            DB::beginTransaction();
            $mazao = new Mazao();

            if ($request->hasFile('mazao_picha') && $request->file('mazao_picha')->isValid()) {
                $file_name = time() . '.' . $request->mazao_picha->getClientOriginalExtension();
                $request->mazao_picha->move(public_path('images'), $file_name);
                $validate['mazao_picha'] = $file_name;
            }
            $mazao->fill($validate);
            $mazao->save();
            DB::commit();
            return view('mazao.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th->getMessage() . '' . $th->getTraceAsString());
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit(Request $request, Mazao $mazao)
    {
        $this->data['mazao'] = $mazao;
        return view('mazao.edit', $this->data);
    }

    public function update(Request $request, Mazao $mazao)
    {
        $validate = $this->validate_mazao($request);

        try {
            DB::beginTransaction();

            if ($request->hasFile('mazao_picha')) {
                $destination = 'images/' . $mazao->mazao_picha;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file_name = time() . '.' . request()->mazao_picha->getClientOriginalExtension();
                request()->mazao_picha->move(public_path('images'), $file_name);
                $mazao->mazao_picha = $file_name;
            }

            $mazao->fill($validate);
            $mazao->save();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th->getMessage() . '' . $th->getTraceAsString());
            return back()->with('error', $th->getMessage());
        }
        return to_route('mazao.index');
    }

    public function delete(Request $request, Mazao $mazao)
    {
        $this->data['mazao'] = $mazao;
        $mazao->delete();
        return redirect()->route('mazao.index', $mazao)->with('success', 'Deleted');
    }




}

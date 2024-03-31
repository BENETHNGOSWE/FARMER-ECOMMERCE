<?php

namespace App\Http\Controllers\Pembejeo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembejeozakilimo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PembejeoController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        $this->middleware('permission:view pembejeo', ['only' => ['index']]);
        $this->middleware('permission:create pembejeo', ['only' => ['create', 'store']]);
        $this->middleware('permission:update pembejeo', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete pembejeo', ['only' => ['destroy']]);
        $this->data['pembejeos'] = Pembejeozakilimo::all();
    }

    public function index()
    {
        $this->data['pembejeos'] = Pembejeozakilimo::all();
        return view('pembejeo.index', $this->data);
    }

    public function create()
    {
        return view('pembejeo.create', $this->data);
    }

    public function validate_pembejeo(Request $request)
    {
        return $request->validate([
            'pembejeo_jina' => 'sometimes|required',
            'pembejeo_maelezo' => 'sometimes|required',
            'pembejeo_bei' => 'sometimes|required|numeric',
        ]);
    }

    public function store(Request $request)
    {
        $validate = $this->validate_pembejeo($request);

        try {
            DB::beginTransaction();
            $pembejeo = new Pembejeozakilimo();

            if ($request->hasFile('pembejeo_picha') && $request->file('pembejeo_picha')->isValid()) {
                $file_name = time() . '.' . $request->pembejeo_picha->getClientOriginalExtension();
                $request->pembejeo_picha->move(public_path('images'), $file_name);
                $validate['pembejeo_picha'] = $file_name;
            }
            $pembejeo->fill($validate);
            $pembejeo->save();
            DB::commit();
            

        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th->getMessage() . '' . $th->getTraceAsString());
            return back()->with('error', $th->getMessage());
        }
        return to_route('pembejeo.index')->with('success', 'Pembejeo created successfully');
    }

    public function edit(Request $request, Pembejeozakilimo $pembejeo)
    {
        $this->data['pembejeo'] = $pembejeo;
        return view('pembejeo.edit', $this->data);
    }

    public function update(Request $request, Pembejeozakilimo $pembejeo)
    {
        $validate = $this->validate_pembejeo($request);

        try {
            DB::beginTransaction();

            if ($request->hasFile('pembejeo_picha')) {
                $destination = 'images/' . $pembejeo->pembejeo_picha;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file_name = time() . '.' . request()->pembejeo_picha->getClientOriginalExtension();
                request()->pembejeo_picha->move(public_path('images'), $file_name);
                $validate['pembejeo_picha'] = $file_name;
            }

            $pembejeo->update($validate);
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th->getMessage() . '' . $th->getTraceAsString());
            return back()->with('error', $th->getMessage());
        }
        return to_route('pembejeo.index')->with('success', 'Pembejeo updated successfully');;
    }

    public function delete(Request $request, Pembejeozakilimo $pembejeo)
    {
        $this->data['pembejeo'] = $pembejeo;
        $pembejeo->delete();
        return redirect()->route('pembejeo.index', $pembejeo)->with('success', 'Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CostCenter;
use Illuminate\Http\Request;

class CostCenterController extends Controller
{
    public function index()
    {
        $data = CostCenter::all();
        return view ('admin.costCenter', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cc_code' => 'required|unique:table_costcenter,cc_code',
            'name' => 'required|string|max:255',
        ]);

        CostCenter::create([
            'cc_code' => $request->cc_code,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.costCenter')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cc_code' => 'required|unique:table_costcenter,cc_code',
            'name' => 'required|string|max:255',
        ]);

        $data = CostCenter::findOrFail($id);
        $data->update([
            'cc_code' => $request->cc_code,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.costCenter')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = CostCenter::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.costCenter')->with('success', 'Data berhasil dihapus');
    }
}

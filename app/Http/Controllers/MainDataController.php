<?php

namespace App\Http\Controllers;

use App\Models\CostCenter;
use App\Models\MainData;
use App\Models\Mta;
use Illuminate\Http\Request;

class MainDataController extends Controller
{
    public function userView()
    {
        $data = MainData::with(['costCenter', 'mta'])->get();
        $costCenters = CostCenter::all(); 
        $mtas = Mta::all();
        return view("user.maindata", compact('data','costCenters','mtas'));
    }

    public function adminView()
    {
        $data = MainData::with(['costCenter', 'mta'])->get();
        $costCenters = CostCenter::all(); 
        $mtas = Mta::all();
        return view("admin.maindata", compact('data','costCenters','mtas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'nomor_proposal' => 'nullable|string',
            'deskripsi_pekerjaan' => 'required|string',
            'amount_sc' => 'required|numeric',
            'amount_po' => 'required|numeric',
            'budget' => 'nullable|string',
            'cost_center_id' => 'required|exists:table_costcenter,id',
            'mta_id' => 'required|exists:table_mta,id',
            'vendor' => 'required|string',
            'sc_no' => 'required|string',
            'po_no' => 'required|string',
            'status_gr' => 'required|string',
            'periode' => 'required|string',
            'gr_no' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        MainData::create($request->all());
        return redirect()->route('admin.maindata')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, MainData $mainData)
    {
        $request->validate([
            'date' => 'required|date',
            'nomor_proposal' => 'nullable|string',
            'deskripsi_pekerjaan' => 'required|string',
            'amount_sc' => 'required|numeric',
            'amount_po' => 'required|numeric',
            'budget' => 'nullable|string',
            'cost_center_id' => 'required|exists:table_costcenter,id',
            'mta_id' => 'required|exists:table_mta,id',
            'vendor' => 'required|string',
            'sc_no' => 'required|string',
            'po_no' => 'required|string',
            'status_gr' => 'required|string',
            'periode' => 'required|string',
            'gr_no' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        $mainData->update($request->all());
        return redirect()->route('admin.maindata')->with('success', 'Data berhasil terupdate');
    }

    public function destroy(MainData $mainData, Request $request)
    {
        $mainData->delete();
        return redirect()->route('admin.maindata')->with('success', 'Data berhasil dihapus');
    }
}

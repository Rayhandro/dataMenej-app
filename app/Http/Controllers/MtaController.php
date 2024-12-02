<?php

namespace App\Http\Controllers;

use App\Models\Mta;
use Illuminate\Http\Request;

class MtaController extends Controller
{
    public function index()
    {
        $data = Mta::all();
        return view('admin.mta', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mta_code' => 'required|unique:table_mta,mta_code',
            'event' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Mta::create([
            'mta_code' => $request->mta_code,
            'event' => $request->event,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.mta')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mta_code' => 'required|unique:table_mta,mta_code,'.$id,
            'event' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data = Mta::findOrFail($id);
        $data->update([
            'mta_code' => $request->mta_code,
            'event' => $request->event,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.mta')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Mta::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.mta')->with('success', 'Data berhasil dihapus');
    }
}

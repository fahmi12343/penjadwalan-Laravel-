<?php

namespace App\Http\Controllers;

use App\matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkul = matkul::all();

        return view('spv.matkul.index', ['matkul' => $matkul]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kd = $this->incrementMatkul();
        return view('spv.matkul.create')
        ->with('kd', $kd);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi inputan
        $validatedData = $request->validate([
            'kd_matkul' => 'required|max:20',
            'nama_matkul' => 'required|max:100',
        ]);

        $kd_matkul = $request -> get('kd_matkul');
        $nama = $request -> get('nama_matkul');

        $matkul = new matkul();

        $matkul -> kd_matkul = $kd_matkul;
        $matkul -> nama_matkul = $nama;

        $matkul->save();

        return redirect()->route('matkul.index')
                         ->with('success', 'Show is successfully saved');

    }

    public function incrementMatkul()
    {
        // $for = 100;
        // for ($i=0; $i < $for; $i++) {
        //     $string = 'LAB001';
        //     return $string;
        // }
        //google version
        $max = matkul::max('kd_matkul');
        $ide = $max;
        $noUrut = (int) substr($ide, 3, 3);
        $noUrut++;

        $char = "MAT";
        $idevn = $char . sprintf("%03s", $noUrut);

        return $idevn;

        // $string = "LAB09";
        // return $string;
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
    public function edit(matkul $matkul)
    {
        return view('spv.matkul.edit',compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, matkul $matkul)
    {
        $request->validate([
            'nama_matkul' => 'required',
        ]);

        $matkul->update($request->all());

        return redirect()->route('matkul.index')
                         ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(matkul $matkul)
    {
        $matkul->delete();

        return redirect()->route('matkul.index')
                        ->with('success','Product deleted successfully');

    }
}

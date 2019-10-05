<?php

namespace App\Http\Controllers;

use App\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // mengambil data pegawai
    	$lab = Lab::all();

    	// mengirim data pegawai ke view pegawai
    	return view('spv.lab\index', ['lab' => $lab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $namalab = $this->incrementLab();
        return view('spv.lab.create')
        ->with('namalab', $namalab);
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
            'nama_lab' => 'required|max:20',
            'desk_lab' => 'required|max:100',
        ]);
        // $lab = Lab::create($validatedData);

        //add data
        // $nama = $this->incrementLab();
        $nama = $request->get('nama_lab');

        $desk = $request->get('desk_lab');

        $lab = new lab();

        $lab -> nama_lab    = $nama;
        $lab -> desk_lab    = $desk;

        $lab->save();

        return redirect()->route('lab.index')
                         ->with('success', 'Show is successfully saved');
    }

    public function incrementLab()
    {
        // $for = 100;
        // for ($i=0; $i < $for; $i++) {
        //     $string = 'LAB001';
        //     return $string;
        // }
        //google version
        $max = lab::max('nama_lab');
        $ide = $max;
        $noUrut = (int) substr($ide, 3, 3);
        $noUrut++;

        $char = "LAB";
        $idevn = $char . sprintf("%03s", $noUrut);

        return $idevn;

        // $string = "LAB09";
        // return $string;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        return view('spv.lab.edit',compact('lab'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab)
    {
        $request->validate([
            'nama_lab' => 'required',
            'desk_lab' => 'required',
        ]);

        $lab->update($request->all());

        return redirect()->route('lab.index')
                         ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        $lab->delete();

        return redirect()->route('lab.index')
                        ->with('success','Product deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Exception;
use PDOException;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['pengguna'] = Pengguna::get();
            return view('pengguna.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenggunaRequest $request)
    {
        // return $request->all();
        Pengguna::create($request->all());
        return redirect('pengguna')->with('success', 'Data berhasil ditambahkan :D');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenggunaRequest  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenggunaRequest $request, Pengguna $pengguna)
    {
        $pengguna->update($request->all());

        return redirect('pengguna')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        try {
            DB::beginTransaction();
            $pengguna->delete();
            DB::commit();
            return redirect('pengguna')->with('success', 'data berhasil dihapus');
        } catch (QueryException | Exception  | PDOException $error) {
            DB::rollback();
            return redirect('pengguna')->with("terjadi kesalahan" . $error->getMessage());
        }
    }
}

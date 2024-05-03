<?php

namespace App\Http\Controllers;

use App\Models\SeriBuku;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeriBukuController extends Controller
{
    private function pre($arr = [])
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seri = SeriBuku::all();
        return view('seri_buku.index', ['seri' => $seri]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['store'] = 'Input';
        $data['seri'] = new SeriBuku();
        $data['action'] = url('seri_buku');
        return view('seri_buku.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seri = new SeriBuku();
        $seri->nama = $request->input('nama');
        $seri->lokasi = $request->input('lokasi');
        $seri->keterangan = $request->input('keterangan');
        $rm = $this->rules_messages();
        $validator = Validator::make($request->all(), $rm['rules'], $messages = $rm['messages']);
        if ($validator->fails()) {
            return redirect('/seri_buku/create')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validate();
        if ($validated) {
            $seri->save();
        }
        return redirect('/seri_buku');
    }

    private function rules_messages()
    {
        $rules = [
            'nama' => 'required |max:50',
            'lokasi' => 'required | max:5'
        ];
        $messages = [
            'required' => 'Kolom ini harus diisi.',
            'max' => 'Karakter yang diisi melebihi ketentuan.'
        ];
        $data = [
            'rules' => $rules,
            'messages' => $messages
        ];
        return $data;
    }
    /**
     * Display the specified resource.
     */
    public function show(SeriBuku $seriBuku)
    {
        return view('seri_buku.destroy', ['seri' => $seriBuku]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeriBuku $seriBuku)
    {
        $data['store'] = 'Ubah';
        $data['seri'] = $seriBuku;
        $data['action'] = url('seri_buku' . '/' . $seriBuku->id);
        return view('seri_buku.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeriBuku $seriBuku)
    {
        $seriBuku->nama = $request->input('nama');
        $seriBuku->lokasi = $request->input('lokasi');
        $seriBuku->keterangan = $request->input('keterangan');
        $rm = $this->rules_messages();
        $validator = Validator::make($request->all(), $rm['rules'], $messages = $rm['messages']);
        if ($validator->fails()) {
            return redirect('/seri_buku/' . $seriBuku->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validate();
        if ($validated) {
            $seriBuku->save();
        }
        return redirect('/seri_buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeriBuku $seriBuku)
    {
        $seriBuku->delete();
        return redirect('/seri_buku');
    }

    public function store_ajax(Request $request)
    {
        $seri = new SeriBuku();
        $seri->nama = $request->input('nama');
        $seri->lokasi = $request->input('lokasi');
        $seri->keterangan = $request->input('keterangan');
        $json = Response::json_encode($seri);
        return $json;
    }
}

<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = "localhost:8000/api/pemasok";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('pemasok.data_pemasok', ['data_pemasok' => $data]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $id_pemasok = $request->id_pemasok;
        $nama_pemasok = $request->nama_pemasok;
        $alamat_pemasok = $request->alamat_pemasok;
        $telepon = $request->telepon;
        $jenis_kelamin = $request->jenis_kelamin;

        $parameter = [
            'id_pemasok' => $id_pemasok,
            'nama_pemasok' => $nama_pemasok,
            'alamat_pemasok' => $alamat_pemasok,
            'telepon' => $telepon,
            'jenis_kelamin' => $jenis_kelamin,
        ];

        $client = new Client();
        $url = "localhost:8000/api/pemasok";

        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['data'];
            return redirect()->to('add_pemasok')->withErrors($error)->withInput();
        }else{
            return redirect()->to('pemasok')->with('success', 'Berhasil Memasukkan Data');
        }
    }

    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "localhost:8000/api/pemasok/$id";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['message'];
            return redirect()->to('pemasok')->withErrors($error);
        }else{
            $data = $contentArray['data'];
            return view('pemasok.edit_pemasok', ['data' => $data]);
        }
    }

    public function update(Request $request, string $id_pemasok)
    {
        $id_pemasok = $request->id_pemasok;
        $nama_pemasok = $request->nama_pemasok;
        $alamat_pemasok = $request->alamat_pemasok;
        $telepon = $request->telepon;
        $jenis_kelamin = $request->jenis_kelamin;

        $parameter = [
            'id_pemasok' => $id_pemasok,
            'nama_pemasok' => $nama_pemasok,
            'alamat_pemasok' => $alamat_pemasok,
            'telepon' => $telepon,
            'jenis_kelamin' => $jenis_kelamin,
        ];

        $client = new Client();
        $url = "localhost:8000/api/pemasok/$id_pemasok";

        $response = $client->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['data'];
            return redirect()->to("pemasok/$id_pemasok")->withErrors($error)->withInput();
        }else{
            return redirect()->to('pemasok')->with('success', 'Berhasil Mengubah Data');
        }
    }

    public function destroy(string $id_pemasok)
    {
        $client = new Client();
        $url = "localhost:8000/api/pemasok/$id_pemasok";

        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['data'];
            return redirect()->to("pemasok")->withErrors($error);
        }else{
            return redirect()->to('pemasok')->with('success', 'Berhasil Menghapus Data');
        }
    }

    public function form_add()
    {
        $random = random_int(10000,99999);

        $client = new Client();
        $url = "localhost:8000/api/pemasok";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data_pemasok = $contentArray['data'];

        foreach($data_pemasok as $i){
            if($random == $i['id_pemasok']){
                $this->form_add();
            }
        }
        
        return view('pemasok.add_pemasok', ['random' => $random]);
        
    }
}

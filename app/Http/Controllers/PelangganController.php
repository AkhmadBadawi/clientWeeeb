<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PelangganController extends Controller
{

    public function index()
    {
        $client = new Client;
        $url = "localhost:8000/api/pelanggan";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('pelanggan.data_pelanggan', ['data_pelanggan' => $data]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $id_pelanggan = $request->id_pelanggan;
        $nama_pelanggan = $request->nama_pelanggan;
        $email = $request->email;
        $alamat = $request->alamat;
        $jenis_kelamin = $request->jenis_kelamin;

        $parameter = [
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $nama_pelanggan,
            'email' => $email,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
        ];

        $client = new Client();
        $url = "localhost:8000/api/pelanggan";

        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('add_pelanggan')->withErrors($error)->withInput();
        } else {
            $url2 = "localhost:8000/api/barang";

            $response2 = $client->request('GET', $url2);
            $content2 = $response2->getBody()->getContents();
            $contentArray2 = json_decode($content2, true);
            $data2 = $contentArray2['data'];

            return view('penjualan.add_penjualan', ['id_pelanggan' => $id_pelanggan, 'data_barang' => $data2]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "localhost:8000/api/pelanggan/$id";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['message'];
            return redirect()->to('pelanggan')->withErrors($error);
        } else {
            $data = $contentArray['data'];
            return view('pelanggan.edit_pelanggan', ['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pelanggan)
    {
        $id_pelanggan = $request->id_pelanggan;
        $nama_pelanggan = $request->nama_pelanggan;
        $alamat = $request->alamat;
        $email = $request->email;
        $jenis_kelamin = $request->jenis_kelamin;

        $parameter = [
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $nama_pelanggan,
            'alamat' => $alamat,
            'email' => $email,
            'jenis_kelamin' => $jenis_kelamin,
        ];

        $client = new Client();
        $url = "localhost:8000/api/pelanggan/$id_pelanggan";

        $response = $client->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to("pelanggan/$id_pelanggan")->withErrors($error)->withInput();
        } else {
            return redirect()->to('pelanggan')->with('success', 'Berhasil Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pelanggan)
    {
        $client = new Client();
        $url = "localhost:8000/api/pelanggan/$id_pelanggan";

        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to("pelanggan")->withErrors($error);
        } else {
            return redirect()->to('pelanggan')->with('success', 'Berhasil Menghapus Data');
        }
    }

    public function form_add()
    {
        return view('pelanggan.add_pelangggan');
    }
}

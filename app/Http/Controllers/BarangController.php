<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client;
        $url = "localhost:8000/api/barang";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        if ($data != null) {
            foreach ($data as $item) {
                $id_pemasok = $item['id_pemasok'];

                $url2 = "localhost:8000/api/pemasok/$id_pemasok";
                $response2 = $client->request('GET', $url2);
                $content2 = $response2->getBody()->getContents();
                $contentArray2 = json_decode($content2, true);
                $data_pemasok[] = $contentArray2['data'];
            }
            $nama_pemasok = array_column($data_pemasok, 'nama_pemasok');

            return view('barang.data_barang', ['data_barang' => $data, 'nama_pemasok' => $nama_pemasok]);
        }else{
            return view('barang.data_barang_kosong');
        }

    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $id_barang = $request->id_barang;
        $nama_barang = $request->nama_barang;
        $stok_barang = $request->stok_barang;
        $harga_barang = $request->harga_barang;
        $deskripsi = $request->deskripsi;
        $id_pemasok = $request->id_pemasok;


        $parameter = [
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang,
            'stok_barang' => $stok_barang,
            'harga_barang' => $harga_barang,
            'deskripsi' => $deskripsi,
            'id_pemasok' => $id_pemasok,
        ];

        $client = new Client();
        $url = "localhost:8000/api/barang";

        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('add_barang')->withErrors($error)->withInput();
        } else {
            return redirect()->to('barang')->with('success', 'Berhasil Memasukkan Data');
        }
    }


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
        $url = "localhost:8000/api/barang/$id";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);


        if ($contentArray['status'] != true) {
            $error = $contentArray['message'];
            return redirect()->to('barang')->withErrors($error);
        } else {
            $data = $contentArray['data'];

            $id_pemasok = $data['id_pemasok'];
            $url2 = "localhost:8000/api/pemasok/$id_pemasok";
            $response2 = $client->request('GET', $url2);
            $content2 = $response2->getBody()->getContents();
            $contentArray2 = json_decode($content2, true);
            $pemasok = $contentArray2['data'];

            $url3 = "localhost:8000/api/pemasok";
            $response3 = $client->request('GET', $url3);
            $content3 = $response3->getBody()->getContents();
            $contentArray3 = json_decode($content3, true);
            $data_pemasok = $contentArray3['data'];

            return view('barang.edit_barang', ['data' => $data, 'pemasok' => $pemasok, 'data_pemasok' => $data_pemasok]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_barang)
    {
        $id_barang = $request->id_barang;
        $nama_barang = $request->nama_barang;
        $stok_barang = $request->stok_barang;
        $harga_barang = $request->harga_barang;
        $deskripsi = $request->deskripsi;
        $id_pemasok = $request->id_pemasok;


        $parameter = [
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang,
            'stok_barang' => $stok_barang,
            'harga_barang' => $harga_barang,
            'deskripsi' => $deskripsi,
            'id_pemasok' => $id_pemasok,
        ];

        $client = new Client();
        $url = "localhost:8000/api/barang/$id_barang";

        $response = $client->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to("barang/$id_barang")->withErrors($error)->withInput();
        } else {
            return redirect()->to('barang')->with('success', 'Berhasil Mengubah Data');
        }
    }

    public function destroy(string $id_barang)
    {
        $client = new Client();
        $url = "localhost:8000/api/barang/$id_barang";

        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect()->to('barang')->withErrors($error);
        } else {
            return redirect()->to('barang')->with('success', 'Berhasil Menghapus Data');
        }
    }

    public function form_add()
    {
        $client = new Client;
        $url = "localhost:8000/api/pemasok";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        $random = random_int(10000,99999);

        $url1 = "localhost:8000/api/barang";
        $response1 = $client->request('GET', $url1);
        $content1 = $response1->getBody()->getContents();
        $contentArray1 = json_decode($content1, true);
        $data_barang = $contentArray1['data'];

        foreach($data_barang as $i){
            if($random == $i['id_barang']){
                $this->form_add();
            }
        }

        return view('barang.add_barang', ['data_pemasok' => $data, 'random' => $random]);
    }
}

<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "localhost:8000/api/penjualan";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data_penjualan = $contentArray['data'];
        if ($data_penjualan != null){
            foreach ($data_penjualan as $item){
                $id_barang = $item['id_barang'];
                $id_pelanggan = $item['id_pelanggan'];
    
                $url2 = "localhost:8000/api/barang/$id_barang";
                $response2 = $client->request('GET', $url2);
                $content2 = $response2->getBody()->getContents();
                $contentArray2 = json_decode($content2, true);
                $data_barang[] = $contentArray2['data'];
                
                $url3 = "localhost:8000/api/pelanggan/$id_pelanggan";
                $response3 = $client->request('GET', $url3);
                $content3 = $response3->getBody()->getContents();
                $contentArray3 = json_decode($content3, true);
                $data_pelanggan[] = $contentArray3['data'];
            }
            
            $nama_barang = array_column($data_barang, 'nama_barang');
            $nama_pelanggan = array_column($data_pelanggan, 'nama_pelanggan');
    
    
            return view('penjualan.data_penjualan', ['data_penjualan' => $data_penjualan, 'nama_barang' => $nama_barang, 'nama_pelanggan' => $nama_pelanggan ]);
        }else{
            return view('penjualan.data_penjualan_kosong');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_penjualan = $request->id_penjualan;
        $id_pelanggan = $request->id_pelanggan;
        $id_barang = $request->id_barang;
        $metode_pembayaran = $request->metode_pembayaran;
        $status_pembayaran = $request->status_pembayaran;
        $jumlah = $request->jumlah;
        $tanggal = $request->tanggal;
        $client = new Client();
        $url = "localhost:8000/api/barang/$id_barang";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data_barang = $contentArray['data'];
        $harga_barang = $data_barang['harga_barang'];

        $total_pembayaran = $harga_barang * $jumlah;

        
        $parameter = [
            'id_penjualan' => $id_penjualan,
            'id_barang' => $id_barang,
            'id_pelanggan' => $id_pelanggan,
            'total_pembayaran' => $total_pembayaran,
            'metode_pembayaran' => $metode_pembayaran,
            'status_pembayaran' => $status_pembayaran,
            'tanggal' => $tanggal,
        ];
        $url2 = "localhost:8000/api/penjualan";

        $response2 = $client->request('POST', $url2, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content2 = $response2->getBody()->getContents();
        $contentArray2 = json_decode($content2, true);
        if ($contentArray2['status'] != true) {
            $error = $contentArray2['data'];
            return redirect()->to('add_penjualan')->withErrors($error)->withInput();
        } else {
            return redirect()->to('penjualan')->with('success', 'Berhasil Memasukkan Data');
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
        $url = "localhost:8000/api/penjualan/$id";

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['message'];
            return redirect()->to('penjualan')->withErrors($error);
        }else{
            $data_penjualan = $contentArray['data'];
            $url2 = "localhost:8000/api/barang";

            $response2 = $client->request('GET', $url2);
            $content2 = $response2->getBody()->getContents();
            $contentArray2 = json_decode($content2, true);
            $data_barang = $contentArray2['data'];

            return view('penjualan.edit_penjualan', ['data' => $data_penjualan, 'data_barang' => $data_barang]);
        }
    }
    public function update(Request $request, string $id_penjualan)
    {
        $id_penjualan = $request->id_penjualan;
        $id_barang = $request->id_barang;
        $id_pelanggan = $request->id_pelanggan;
        $total_pembayaran = $request->total_pembayaran;
        $metode_pembayaran = $request->metode_pembayaran;
        $status_pembayaran = $request->status_pembayaran;
        $tanggal = $request->tanggal;

        $parameter = [
            'id_penjualan' => $id_penjualan,
            'id_barang' => $id_barang,
            'id_pelanggan' => $id_pelanggan,
            'total_pembayaran' => $total_pembayaran,
            'metode_pembayaran' => $metode_pembayaran,
            'status_pembayaran' => $status_pembayaran,
            'tanggal' => $tanggal,
        ];
        $client = new Client();
        $url = "localhost:8000/api/penjualan/$id_penjualan";

        $response = $client->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['data'];
            return redirect()->to("penjualan/$id_penjualan")->withErrors($error)->withInput();
        }else{
            return redirect()->to('penjualan')->with('success', 'Berhasil Mengubah Data');
        }
    }


    public function destroy(string $id_penjualan)
    {
        $client = new Client();
        $url = "localhost:8000/api/penjualan/$id_penjualan";

        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['data'];
            return redirect()->to("penjualan")->withErrors($error);
        }else{
            return redirect()->to('penjualan')->with('success', 'Berhasil Menghapus Data');
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

        $url2 = "localhost:8000/api/barang";
        $response2 = $client->request('GET', $url2);
        $content2 = $response2->getBody()->getContents();
        $contentArray2 = json_decode($content2, true);
        $data2 = $contentArray2['data'];

        return view('barang.add_barang', ['data_pemasok' => $data, 'data_barang' => $data2]);
    }

    public function form_add_pelanggan()
    {
        return view('pelanggan.add_pelanggan');
    }

    public function form_add_penjualan()
    {
        $client = new Client;

        $url = "localhost:8000/api/barang";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        return view('penjualan.add_penjualan', ['data_barang' => $data]);
    }
}

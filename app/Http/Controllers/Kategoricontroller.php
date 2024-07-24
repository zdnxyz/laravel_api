<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class Kategoricontroller extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();
        $respons = [
            'success' => true,
            'massage' => 'Daftar Kategori',
            'data' => $kategori,
        ];

        return response()->json($respons, 200);
    }

    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'message' => 'data kategori berhasil disimpan',
        ], 201);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'detail kategori',
                'data' => $kategori,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data kategori tidak ditemukan',
        ], 404);
        }
    }

    public function update (Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
            return response()->json([
                'success' => true,
                'message' => 'detail kategori dsimpan',
                'data' => $kategori,
            ], 200);
        } else {
                return response()->json([
                    'success' => false,
                    'message' => 'data berhasil diperbarui',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->delete();
            return response()->json([
                'success' => true,
                'message' => 'data' . $kategori->nama_kategori . 'berhasil di hapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data kategori tidak ditemukan',
            ], 404);
            }
    }
}
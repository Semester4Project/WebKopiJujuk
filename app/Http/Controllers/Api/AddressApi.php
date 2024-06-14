<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

class AddressApi extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerima' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'kode_pos' => 'required|string|max:10',
            'alamat_lengkap' => 'required|string',
            'user_id' => 'required|exists:users,user_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $address = Address::create($request->all());

        return response()->json(['message' => 'Address created successfully', 'data' => $address], 201);
    }

        // Method to get all addresses
        public function index()
        {
            $addresses = Address::all();
            return response()->json([
                'status' => 'Data Alamat',
                'data' => $addresses], 200);
        }
}

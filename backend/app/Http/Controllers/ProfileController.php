<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'lastName' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'image' => 'nullable|url',
            ]);

            $encryptedData = [
                'name' => $data['name'],
                'lastName' => $data['lastName'],
                'phone' => Crypt::encryptString($data['phone']),
                'email' => Crypt::encryptString($data['email']),
                'image' => $data['image'],
            ];

            $hash = sha1(serialize($data));

            $existingProfile = Profile::where('hash', $hash)->first();

            if ($existingProfile) {
                return response()->json(['message' => 'El perfil ya existe'], 422);
            }

            $encryptedData['hash'] = $hash;

            $profile = Profile::create($encryptedData);

            return response()->json($profile, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el perfil'], 500);
        }
    }
}

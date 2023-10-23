<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Services\ApiConnectionService;

class ProfileController extends Controller
{
    protected $apiService;
    
    public function __construct(ApiConnectionService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        try {
            $nombre = $request->get('nombre', 'No especificado');
            $apellidos = $request->get('apellidos', 'No especificado');
            $telefono = $request->get('telefono', '+000000000000');
            $correo = $request->get('correo', 'no@especificado.com');
            $imagen = $request->get('imagen', 'https://via.placeholder.com/150');

            $data = [
                'name' => $nombre,
                'lastName' => $apellidos,
                'phone' => $telefono,
                'email' => $correo,
                'image' => $imagen,
            ];

            if ($this->apiService->sendDataToApi($data)) {
                return view('profile.index', compact('nombre', 'apellidos', 'telefono', 'correo', 'imagen'));
            } else {
                return view('profile.error');
            }
        } catch (\Exception $e) {
            return view('profile.error');
        }
    }

    public function createForm()
    {
        return view('profile.form');
    }

    public function generateProfileUrl(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'telefono' => 'required|string|max:20',
                'correo' => 'required|email|max:255',
                'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $nombre = $request->input('nombre', 'No especificado');
            $apellidos = $request->input('apellidos', 'No especificado');
            $telefono = $request->input('telefono', '+000000000000');
            $correo = $request->input('correo', 'no@especificado.com');

            if (env('AWS_ACCESS_KEY_ID') !== "") {
                $path = $this->uploadImageToS3($request->imagen);
            } else {
                $path = $this->uploadImageToStorage($request);
            }

            $profileUrl = route('profile', [
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'telefono' => $telefono,
                'correo' => $correo,
                'imagen' => $path,
            ]);

            return view('profile.success', compact('profileUrl'));
        } catch (\Exception $e) {
            return view('profile.error');
        }
    }

    private function uploadImageToS3($image)
    {
        $imageName = time().'.'.$image->extension();
        $path = Storage::disk('s3')->put('', $image);
        return Storage::disk('s3')->url($path);
    }

    private function uploadImageToStorage($request)
    {
        $path = 'images/';
        $file = $request->file('imagen');
        $fileName   = time() . $file->getClientOriginalName();
        Storage::disk('public')->put($path . $fileName, File::get($file));
        $file_name  = $file->getClientOriginalName();
        $file_type  = $file->getClientOriginalExtension();
        return asset('storage/images/'.$fileName);
    }
}

@extends('layouts.app')

@section('title', 'Éxito')

@section('content')
<div class="flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md">
        <p class="text-green-500 text-xl font-bold text-center mb-4">¡Perfil generado con éxito!</p>
        <p class="text-center">Haz clic en el enlace a continuación para ver el perfil:</p>
        <a href="{{ $profileUrl }}" class="block text-blue-500 hover:underline text-center mt-2">Ver Perfil Generado</a>
    </div>
</div>
@endsection

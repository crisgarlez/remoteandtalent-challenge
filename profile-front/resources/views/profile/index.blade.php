@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    <div class="flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md">
            <img src="{{ $imagen }}" alt="Imagen de perfil" class="rounded-full h-20 w-20 mx-auto mb-4">
            <h1 class="text-2xl font-bold text-center mb-2">{{ $nombre }}</h1>
            <h2 class="text-xl text-gray-600 text-center mb-4">{{ $apellidos }}</h2>
            <p class="text-gray-700 mb-2"><strong>Teléfono:</strong> {{ $telefono }}</p>
            <p class="text-gray-700 mb-2"><strong>Correo:</strong> {{ $correo }}</p>
        </div>
    </div>
@endsection

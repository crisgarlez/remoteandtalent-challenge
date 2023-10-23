@extends('layouts.app')

@section('title', 'Formulario')

@section('content')
<div class="flex items-center justify-center">
    <form action="{{ route('generate-profile-url') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="bg-white p-8 rounded shadow-md">
            <div class="mb-4">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="correo">Correo Electrónico</label>
                <input type="email" name="correo" id="correo" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="imagen">Subir Imagen</label>
                <input type="file" name="imagen" id="imagen" class="border w-full p-2" required>
            </div>
            @error('imagen')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Generar</button>
        </div>
    </form>
</div>
@endsection

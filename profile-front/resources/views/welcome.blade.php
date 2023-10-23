@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <nav>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
            <!-- Tarjeta 1: Página dinámica -->
            <div class="max-w-md rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Página dinámica</div>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('profile') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 w-full block">Ir</a>
                </div>
            </div>

            <!-- Tarjeta 2: Formulario de datos -->
            <div class="max-w-md rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Formulario de datos</div>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('profile-form') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 w-full block">Ir</a>
                </div>
            </div>

            <!-- Tarjeta 3: Simulador de Email -->
            <div class="max-w-md rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Simulador de Email</div>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('mail') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 w-full block">Ir</a>
                </div>
            </div>

            <!-- Tarjeta 4: Página dinámica con ejemplos -->
            <div class="max-w-md rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Página dinámica con ejemplos</div>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('profile', [
                        'nombre' => 'Juan',
                        'apellidos' => 'Perez',
                        'telefono' => '123456',
                        'correo' => 'juan@ejemplo.com',
                        'imagen' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png'
                    ]) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 w-full block">Ir</a>
                </div>
            </div>
        </div>
    </nav>
@endsection
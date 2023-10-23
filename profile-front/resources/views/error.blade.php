@extends('layouts.app')

@section('title', 'Éxito')

@section('content')
<div class="p-4 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md text-center">
        <p class="text-red-500 text-2xl font-bold mb-4">¡Hubo un error al enviar el correo!</p>
        <a href="{{ route('mail') }}" class="text-blue-500 hover:underline">Volver al formulario</a>
    </div>
</div>
@endsection

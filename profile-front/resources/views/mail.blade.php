@extends('layouts.app')

@section('title', 'Email')

@section('content')
    <form action="{{ route('send-email') }}" method="post" class="bg-white p-4 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="emailTo" class="block text-gray-700">Destinatario:</label>
            <input type="email" name="emailTo" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="emailSubject" class="block text-gray-700">Asunto:</label>
            <input type="text" name="emailSubject" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="emailBody" class="block text-gray-700">Cuerpo del Correo:</label>
            <textarea name="emailBody" class="w-full p-2 border rounded" required></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Enviar</button>
    </form>
@endsection

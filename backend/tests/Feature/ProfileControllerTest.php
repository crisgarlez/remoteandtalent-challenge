<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Profile;

class ProfileControllerTest extends TestCase
{
    public function test_store_method_creates_new_profile()
    {
        // Simula una solicitud POST a la ruta 'api/profile' con los datos necesarios
        $response = $this->postJson('/api/profile', [
            'name' => 'John',
            'lastName' => 'Doe',
            'phone' => '1234567890',
            'email' => 'john@example.com',
            'image' => 'http://example.com/image.jpg',
        ]);

        // Verifica que la respuesta sea 201 (creado) y contiene los datos del perfil
        $response->assertStatus(201)
            ->assertJsonStructure([
                'name',
                'lastName',
                'phone',
                'email',
                'image',
                'hash',
            ]);

        // Verifica que se haya creado un perfil en la base de datos
        $this->assertDatabaseHas('profiles', [
            'name' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@example.com',
        ]);
    }

    public function test_store_method_returns_error_for_existing_profile()
    {
        // Crea un perfil con los mismos datos
        $profileData = [
            'name' => 'Jane',
            'lastName' => 'Doe',
            'phone' => '1234567890',
            'email' => 'jane@example.com',
            'image' => 'http://example.com/image.jpg',
        ];
        Profile::create(array_merge($profileData, ['hash' => sha1(serialize($profileData))]));

        // Intenta crear un perfil con los mismos datos
        $response = $this->postJson('/api/profile', $profileData);

        // Verifica que la respuesta sea 422 (unprocessable entity) y contiene un mensaje de error
        $response->assertStatus(422)
            ->assertJson(['message' => 'El perfil ya existe']);
    }
}

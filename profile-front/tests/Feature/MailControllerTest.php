<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailControllerTest extends TestCase
{

    public function test_showMailForm_method()
    {
        $response = $this->get(route('mail'));

        $response->assertStatus(200)
            ->assertViewIs('mail');
    }

    public function test_sendEmail_method()
    {
        // Simula una solicitud POST con datos válidos
        $formData = [
            'emailTo' => 'escipion25@gmail.com',
            'emailSubject' => 'Asunto de prueba',
            'emailBody' => 'Cuerpo de prueba',
        ];

        $response = $this->post(route('send-email'), $formData);

        $response->assertStatus(200)
            ->assertViewIs('success');
    }

}


<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class EmailControllerTest extends TestCase
{
    public function test_sendEmail_method_sends_email_and_logs()
    {
        $response = $this->postJson('/api/sendEmail', [
            'emailTo' => 'recipient@example.com',
            'emailSubject' => 'Test Subject',
            'emailBody' => 'Test Body',
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Simulación de correo enviada y log registrada']);


    }
}

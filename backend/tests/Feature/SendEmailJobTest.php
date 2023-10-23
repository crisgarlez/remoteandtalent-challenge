<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Log;

class SendEmailJobTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_logs_message_to_email_log()
    {
        $emailTo = 'test@example.com';
        $emailSubject = 'Test Subject';
        $emailBody = 'Test Body';

        Log::shouldReceive('info')->with("Mensaje enviado al correo: $emailTo")->once();

        $job = new SendEmailJob($emailTo, $emailSubject, $emailBody);
        $job->handle();

    }
}


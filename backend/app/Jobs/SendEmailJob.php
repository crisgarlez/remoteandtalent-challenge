<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailTo;
    protected $emailSubject;
    protected $emailBody;

    /**
     * Create a new job instance.
     */
    public function __construct($emailTo, $emailSubject, $emailBody)
    {
        $this->emailTo = $emailTo;
        $this->emailSubject = $emailSubject;
        $this->emailBody = $emailBody;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(5);
        Log::info("Mensaje enviado al correo: $this->emailTo");
    }
}

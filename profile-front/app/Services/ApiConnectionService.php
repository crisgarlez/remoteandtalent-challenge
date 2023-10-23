<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiConnectionService
{
    public function sendDataToApi($data)
    {
        try {
            $response = Http::post(env('API_URL'), $data);

            return $response->successful() ? json_decode($response->body(), true) : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function sendEmail($data)
    {
        try {
            $response = Http::post(env('MAIL_API_URL'), $data);

            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }
}

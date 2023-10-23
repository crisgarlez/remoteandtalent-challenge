<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            $request->validate([
                'emailTo' => 'required|email',
                'emailSubject' => 'required|string',
                'emailBody' => 'required|string',
            ]);

            $emailTo = $request->input('emailTo');
            $emailSubject = $request->input('emailSubject');
            $emailBody = $request->input('emailBody');

            SendEmailJob::dispatch($emailTo, $emailSubject, $emailBody);

            return response()->json(['message' => 'Simulación de correo enviada y log registrada'], 200);
        } catch (\Exception $e) {
            Log::error('Error en el envío de correo: ' . $e->getMessage());
            return response()->json(['error' => 'Error en el envío de correo'], 500);
        }
    }
}

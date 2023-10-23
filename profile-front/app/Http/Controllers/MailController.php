<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiConnectionService;

class MailController extends Controller
{
    protected $apiService;
    
    public function __construct(ApiConnectionService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function showMailForm()
    {
        return view('mail');
    }

    public function sendEmail(Request $request)
    {
        try {
            $data = $request->validate([
                'emailTo' => 'required|email',
                'emailSubject' => 'required|string|max:255',
                'emailBody' => 'required|string',
            ]);

            if ($this->apiService->sendEmail($data)) {
                return view('success');
            } else {
                return view('error');
            }
        } catch (\Exception $e) {
            return view('error');
        }
    }
}

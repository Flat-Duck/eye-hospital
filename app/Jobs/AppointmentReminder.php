<?php

namespace App\Jobs;

use App\Models\Patient;
use App\Models\Template;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AppointmentReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Patient $patient;
    private Template $template;

    /**
     * Create a new job instance.
     */
    public function __construct(Patient $patient, Template $template)
    {
        $this->patient = $patient;
        $this->template = $template;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $code = "xxx";
        $name = $this->patient->name;
        $phone = $this->patient->phone;
        $text = $this->template->text;
        
        if (str_contains($text, $code)) {
           $message = str_replace($code, $name, $text);
        } else {
        $message = "Def";
        }
        $client = new Client();
        $headers = [
            'x-auth-token' => ' marsol_token_17469ce61e06c01b6a214c8ddba405fd84d5a32f3eea1d18f8068351fcf6d5ec',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer marsol_token_17469ce61e06c01b6a214c8ddba405fd84d5a32f3eea1d18f8068351fcf6d5ec'
        ];

        $body = '{
            "phoneNumbers": [ "'.$phone.'" ],
            "message": "'.$message.'",
            "senderId": "9186a3ea-a249-4e5d-9448-91bf3201493a"
        }';

        $request = new Request('POST', 'https://api.marsol.ly/public/sms/send', $headers, $body);
        $client->sendAsync($request)->wait();
    }
}

<?php

namespace App\Jobs;

use App\Models\ConsultationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendToGoogleSheets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public ConsultationRequest $consultation) {}

    public function handle(): void
    {
        $url = config('services.google_sheets.webhook_url');
        if (!$url) return;

        $response = Http::asJson()->post($url, [
            'name'  => $this->consultation->name,
            'phone' => $this->consultation->phone,
            'role'  => $this->consultation->role,
            'need'  => $this->consultation->need,
            'status' => $this->consultation->status,
            'date'  => $this->consultation->created_at->toIso8601String(),
        ]);

        if ($response->failed()) {
            Log::warning('Google Sheets webhook failed', ['body' => $response->body()]);
        }
    }
}
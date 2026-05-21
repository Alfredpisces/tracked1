<?php

namespace App\Services\Ai;

use Illuminate\Support\Facades\Http;
use Throwable;

class DllPrecheckerClient
{
    public function precheck(array $payload): array
    {
        $external = $this->callExternalService($payload);

        if ($external !== null) {
            return $external;
        }

        return $this->localFallback($payload);
    }

    protected function callExternalService(array $payload): ?array
    {
        $url = config('services.ai_prechecker.url');

        if (! $url) {
            return null;
        }

        try {
            $response = Http::timeout((int) config('services.ai_prechecker.timeout', 10))
                ->acceptJson()
                ->withToken((string) config('services.ai_prechecker.token'))
                ->post(rtrim($url, '/').'/v1/dll-precheck', [
                    'subject' => $payload['subject'] ?? null,
                    'objectives' => $payload['objectives'] ?? null,
                    'content' => $payload['content'] ?? null,
                    'learning_resources' => $payload['learning_resources'] ?? null,
                    'procedures' => $payload['procedures'] ?? null,
                    'reflection' => $payload['reflection'] ?? null,
                ]);

            if (! $response->successful()) {
                return null;
            }

            return $response->json();
        } catch (Throwable) {
            return null;
        }
    }

    protected function localFallback(array $payload): array
    {
        $required = ['subject', 'objectives', 'content', 'learning_resources', 'procedures'];
        $missing = [];

        foreach ($required as $field) {
            if (blank($payload[$field] ?? null)) {
                $missing[] = $field;
            }
        }

        $passed = $missing === [];

        $requiredCount = max(1, count($required));

        return [
            'passed' => $passed,
            'score' => $passed ? 1.0 : max(0.2, 1 - (count($missing) / $requiredCount)),
            'provider' => 'local-fallback',
            'feedback' => $passed
                ? ['DLL draft is complete enough to submit for review.']
                : ['Please complete the following sections: '.implode(', ', $missing).'.'],
        ];
    }
}

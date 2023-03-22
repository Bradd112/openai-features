<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class OpenAIService
{
    public function sendToChat(string $input): string
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $input,
                ],
            ],
        ]);

        return $result['choices'][0]['message']['content'];
    }

    public function createImages(string $input): array
    {
        $inputInEnglish = $this->sendToChat("Translate this to English: {$input}");

        $response = OpenAI::images()->create([
            'prompt' => $inputInEnglish,
            'n' => 4,
            'size' => '1024x1024',
            'response_format' => 'b64_json',
        ]);

        return $response->data;
    }
}

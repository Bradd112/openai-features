<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GptChatController extends Controller
{
    public function __construct(private OpenAIService $openAIService)
    {
    }

    public function index(): View
    {
        return view('chat');
    }

    public function sendGpt(Request $request): RedirectResponse
    {
        $question = $request->get('question');

        $text = $this->openAIService->sendToChat($question);

        return redirect()->back()->with([
            'text' => $text,
            'question' => $question,
        ]);
    }

    public function createImage(Request $request): RedirectResponse
    {
        $text = $request->get('text');

        $imageUrl = $this->openAIService->createImage($text);

        return redirect($imageUrl);
    }
}

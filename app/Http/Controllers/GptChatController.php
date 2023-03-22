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

        $answer = $this->openAIService->sendToChat($question);

        return redirect()->back()->with(compact('answer', 'question'));
    }

    public function createImage(Request $request): RedirectResponse
    {
        $text = $request->get('text');

        $images = $this->openAIService->createImages($text);

        return redirect()->back()->with(compact('text', 'images'));
    }
}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>OpenAI Quickstart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>

<body>
<div class="container">
    <h3>GPT 3.5 chat & DALL·E kép készítő AI API</h3>

    <form action="{{ route('sendGpt') }}" method="post">
        @csrf
        <input type="text" name="question" placeholder="Kérdésed..." required value="{{ session()->get('question') }}" style="min-width: 80%; min-height: 30px;">
        <input type="submit" value="Küldés" />
    </form>

    <h3>{{ session()->get('answer') }}</h3>

    <form action="{{ route('createImage') }}" method="post">
        @csrf
        <input type="text" name="text" placeholder="Kép leírása..." required value="{{ session()->get('text') }}" style="min-width: 80%; min-height: 30px;">
        <input type="submit" value="Kép készítése" />
    </form>

    @if(session()->has('images'))
        <div class="row mt-3">
            @foreach(session()->get('images') as $image)
                <div class="col-6 mb-3">
                    <img src="data:image/png;base64, {{ $image->b64_json }}" style="max-width: 100%;">
                </div>
            @endforeach
        </div>
    @endif
</div>
</body>
</html>

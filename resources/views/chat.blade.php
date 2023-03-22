<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>OpenAI Quickstart</title>
    <link rel="shortcut icon" href="/images/dog.png"/>
    @vite(['resources/css/app.css'])
</head>

<body>
<h3>GPT 3.5 chat</h3>
<form action="{{ route('sendGpt') }}" method="post">
    @csrf
    <input type="text" name="question" placeholder="Kérdésed..." required value="{{ session()->get('question') }}" style="min-width: 80%; min-height: 30px;">
    <input type="submit" value="Küldés" />
</form>
<h3>{{ session()->get('text') }}</h3>
<form action="{{ route('createImage') }}" method="post" target="_blank">
    @csrf
    <input type="text" name="text" placeholder="Kép leírása..." required value="{{ session()->get('question') }}" style="min-width: 80%; min-height: 30px;">
    <input type="submit" value="Kép készítése" />
</form>
</body>
</html>

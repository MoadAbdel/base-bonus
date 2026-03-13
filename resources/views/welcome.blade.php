<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="max-w-xl mx-auto">

        <h1 class="text-2xl font-bold mb-8">Upload de fichiers</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire avatar --}}
        <div class="bg-white rounded-xl shadow p-6 mb-8">
            <h2 class="text-lg font-semibold mb-4">Avatar</h2>
            <form action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="avatar" class="block text-sm font-medium text-gray-700 mb-2">
                    Choisir une image (JPG, PNG, GIF — max 2 Mo)
                </label>
                <input type="file" id="avatar" name="avatar" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                    Uploader l'avatar (public)
                </button>
            </form>
        </div>

        {{-- Formulaire PDF --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Document PDF</h2>
            <form action="{{ route('upload.pdf') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="pdf" class="block text-sm font-medium text-gray-700 mb-2">
                    Choisir un fichier PDF (max 5 Mo)
                </label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 mb-4">
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-2 px-4 rounded">
                    Uploader le PDF (privé)
                </button>
            </form>
        </div>

    </div>

</body>

</html>
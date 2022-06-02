<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Igor URL Shortener')}}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
          <form method="POST" action="{{ route('generate') }}">
            @csrf
<div class="w-[300px]">
  <!-- {{ __('Log in') }} -->
  <label for="url" class="block text-sm font-medium text-gray-700">Enter URL</label>
  <div class="mt-1 relative rounded-md shadow-sm">
    <input type="url" name="url" id="url" class="block w-full pr-10 @error('url') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror sm:text-sm rounded-md" placeholder="https://example.com" :value="old('url')"  aria-invalid="@error('url') true @enderror" required>
    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
      <!-- Heroicon name: solid/exclamation-circle -->
      @error('url')
      <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
      </svg>
      @enderror
    </div>
  </div>
  <div class="flex items-center justify-end mt-4">

      <x-button class="ml-4">
          {{ __('Generate') }}
      </x-button>
  </div>

    @if (session('message'))
        <div class="text-green-700">
            {{ session('message') }}
        </div>
    @endif

  @if ($errors->any())
    <div class="mt-2 text-sm text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>
</div>

        </div>
    </body>
</html>

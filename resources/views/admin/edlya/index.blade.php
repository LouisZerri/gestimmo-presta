@extends('admin.layouts.app')

@section('title', 'Edlya - Codes d\'activation')
@section('header', 'Edlya - Codes d\'activation')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Générer un code d'activation</h3>
        <p class="text-sm text-gray-500 mb-6">
            Saisissez l'email du client. Un code unique sera généré et lié à cet email.
            Le client devra entrer ce code dans l'application Edlya après son inscription.
        </p>

        <form action="{{ route('admin.edlya.create-code') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email du client</label>
                <input type="email" name="email" id="email" required
                    value="{{ old('email') }}"
                    placeholder="client@exemple.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-brand-blue text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition-colors font-medium">
                Générer le code
            </button>
        </form>
    </div>
</div>
@endsection

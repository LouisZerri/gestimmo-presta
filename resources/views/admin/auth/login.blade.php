<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Gestimmo France</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#1e3a5f',
                            accent: '#e63946',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-brand-blue">GEST'IMMO</h1>
                <p class="text-gray-600 mt-2">Administration</p>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Adresse email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent @error('email') border-red-500 @enderror"
                        required
                        autofocus
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Mot de passe
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent @error('password') border-red-500 @enderror"
                        required
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center mb-6">
                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="h-4 w-4 text-brand-blue focus:ring-brand-blue border-gray-300 rounded"
                    >
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Se souvenir de moi
                    </label>
                </div>

                <button
                    type="submit"
                    class="w-full bg-brand-blue text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition-colors font-medium"
                >
                    Se connecter
                </button>
            </form>
        </div>

        <p class="text-center text-gray-500 text-sm mt-4">
            <a href="{{ route('home') }}" class="hover:text-brand-blue">
                &larr; Retour au site
            </a>
        </p>
    </div>
</body>
</html>

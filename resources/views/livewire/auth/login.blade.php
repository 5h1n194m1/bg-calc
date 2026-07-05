<div class="max-w-md mx-auto mt-12 rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Admin Login</h1>
        <p class="mt-1 text-sm text-gray-500">Masukkan username dan password untuk masuk.</p>
    </div>

    <form wire:submit.prevent="login" class="space-y-4">
        @if ($errors->any())
            <div class="rounded-md border border-red-200 bg-red-50 p-3 text-sm text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input
                wire:model="username"
                id="username"
                type="text"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
            >
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input
                wire:model="password"
                id="password"
                type="password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
            >
        </div>

        <label class="flex items-center">
            <input wire:model="remember" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-500 focus:ring-red-500">
            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
        </label>

        <button type="submit" class="w-full rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-600">
            Masuk
        </button>
    </form>
</div>
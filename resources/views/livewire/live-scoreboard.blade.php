<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 uppercase tracking-tight">{{ $tournament->name }}</h1>
        <p class="text-gray-500 mt-2 font-medium">KLASEMEN SEMENTARA &bull; {{ $tournament->game }}</p>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider w-16">#</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Nama Tim</th>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Kills</th>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Place</th>
                        <th class="px-6 py-4 text-center text-sm font-extrabold uppercase tracking-wider text-yellow-400">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($leaderboard as $index => $team)
                        <tr class="hover:bg-gray-50 transition duration-150 {{ $index == 0 ? 'bg-yellow-50/40' : ($index == 1 ? 'bg-gray-50/50' : ($index == 2 ? 'bg-orange-50/30' : '')) }}">
                            
                            <td class="px-6 py-4 whitespace-nowrap text-center font-black 
                                {{ $index == 0 ? 'text-yellow-500 text-2xl' : ($index == 1 ? 'text-gray-400 text-xl' : ($index == 2 ? 'text-orange-600 text-xl' : 'text-gray-500 text-lg')) }}">
                                {{ $index + 1 }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900 text-lg">
                                {{ $team->name }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-600 font-semibold text-lg">
                                {{ $team->total_kills }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-600 font-semibold text-lg">
                                {{ $team->total_placement }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-center font-black text-2xl text-gray-900">
                                {{ $team->total_score }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 whitespace-nowrap text-center text-gray-500 font-medium">
                                Belum ada data tim yang bertanding di turnamen ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-8 text-center">
        <a href="/" class="inline-flex items-center text-gray-500 hover:text-red-600 transition font-medium">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali ke Lobby
        </a>
    </div>

</div>
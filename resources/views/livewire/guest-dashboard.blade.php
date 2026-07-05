<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
            Battleground<span class="text-red-600">Calc</span> Hub
        </h1>
        <p class="mt-4 text-xl text-gray-500">
            Sistem Manajemen Turnamen & Live Scoreboard
        </p>
    </div>

    <div class="mb-14">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center border-b border-gray-200 pb-3">
            <span class="w-3 h-3 bg-red-600 rounded-full animate-pulse mr-3"></span>
            Sedang Berlangsung (LIVE)
        </h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($liveTournaments as $tourney)
                <div class="bg-white rounded-2xl shadow-sm border-2 border-red-100 overflow-hidden hover:shadow-md hover:border-red-300 transition duration-300 flex flex-col">
                    <div class="p-6 flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $tourney->name }}</h3>
                        <p class="text-sm font-medium text-gray-500 mb-4">{{ $tourney->game }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 border-t border-gray-100">
                        <a href="/live-tour/{{ $tourney->slug }}" class="w-full inline-flex justify-center items-center px-4 py-2.5 border border-transparent text-sm font-bold rounded-xl text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                            Lihat Klasemen Live &rarr;
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-2xl p-8 text-center border border-gray-200 shadow-sm">
                    <p class="text-gray-500 text-lg">Saat ini tidak ada turnamen yang sedang Live.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="mb-14">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-3">
            Segera Datang
        </h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($upcomingTournaments as $tourney)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden opacity-90 hover:opacity-100 transition">
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-1">{{ $tourney->name }}</h3>
                        <p class="text-xs text-gray-500 mb-3">{{ $tourney->game }}</p>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                            Persiapan / Pendaftaran
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-4">
                    <p class="text-gray-400 italic">Belum ada turnamen baru yang dijadwalkan.</p>
                </div>
            @endforelse
        </div>
    </div>
    
    <div>
        <h2 class="text-xl font-bold text-gray-400 mb-6 border-b border-gray-100 pb-3">
            Riwayat Turnamen Selesai
        </h2>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($completedTournaments as $tourney)
                <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden grayscale hover:grayscale-0 transition duration-300">
                    <div class="p-4">
                        <h3 class="text-sm font-bold text-gray-700 mb-1 line-clamp-1">{{ $tourney->name }}</h3>
                        <span class="text-xs font-medium text-gray-500">Selesai</span>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic col-span-full">Belum ada riwayat turnamen.</p>
            @endforelse
        </div>
    </div>

</div>
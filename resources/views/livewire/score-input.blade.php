<div
    x-data="{
        isPaletteOpen: false,
        search: '',

        // Transfer data dari PHP ke JavaScript browser
        allTeams: @js($teams),

        // Logika pencarian instan di memori browser
        get searchResults() {
            if (this.search.length < 2) return [];
            const keyword = this.search.toLowerCase();
            return this.allTeams.filter(team =>
                team.name.toLowerCase().includes(keyword) ||
                team.members.toLowerCase().includes(keyword)
            ).slice(0, 5); // Maksimal tampilkan 5
        },

        openPalette() {
            this.isPaletteOpen = true;
            this.search = ''; // Bersihkan pencarian lama
            setTimeout(() => $refs.searchInput.focus(), 10);
        },
        closePalette() {
            this.isPaletteOpen = false;
        },
        focusToTeam(teamId) {
            this.closePalette();
            document.getElementById('kill_input_' + teamId).focus();
        }
    }"
    @keydown.window.ctrl.k.prevent="openPalette()"
    @keydown.escape.window="closePalette()"
>

    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Input Skor</h1>
            <p class="text-sm text-gray-500 mt-1">
                Tekan <kbd class="px-2 py-1 bg-gray-100 border border-gray-300 rounded-md text-xs font-mono text-gray-700 font-bold shadow-sm">Ctrl</kbd> + <kbd class="px-2 py-1 bg-gray-100 border border-gray-300 rounded-md text-xs font-mono text-gray-700 font-bold shadow-sm">K</kbd> untuk mencari tim atau pemain.
            </p>
        </div>
        <button class="bg-gray-900 text-white px-6 py-2 rounded text-sm font-medium hover:bg-red-600 transition">
            Simpan Skor
        </button>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-16">#</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Tim</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Kill Pts</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Plc Pts</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-24">DQ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($teams as $index => $team)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">{{ $team['name'] }}</div>
                            <div class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $team['members'] }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <input type="number" id="kill_input_{{ $team['id'] }}" class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 text-lg font-bold py-2" placeholder="0">
                        </td>
                        <td class="px-6 py-4">
                            <input type="number" class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 text-lg font-bold py-2" placeholder="0">
                        </td>
                        <td class="px-6 py-4 text-center">
                            <input type="checkbox" class="h-5 w-5 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div x-show="isPaletteOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        <div x-show="isPaletteOpen" @click="closePalette()" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm"></div>

        <div class="flex items-start justify-center min-h-screen pt-24 px-4 pb-20 text-center sm:p-0">
            <div x-show="isPaletteOpen" 
                 @click.outside="closePalette()"
                 class="relative bg-white rounded-xl text-left overflow-hidden shadow-2xl sm:my-8 sm:max-w-2xl w-full border border-gray-200">
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">🔍</span>
                    </div>
                    <input type="text" x-model="search" x-ref="searchInput" class="w-full pl-12 pr-4 py-4 border-0 focus:ring-0 text-lg text-gray-900 placeholder-gray-400 bg-transparent" placeholder="Ketik nama tim atau pemain" autocomplete="off">
                </div>

                <template x-if="search.length >= 2">
                    <div class="border-t border-gray-100 max-h-96 overflow-y-auto">
                        
                        <template x-if="searchResults.length > 0">
                            <ul class="divide-y divide-gray-100">
                                <template x-for="result in searchResults" :key="result.id">
                                    <li>
                                        <button @click="focusToTeam(result.id)" @keyup.enter="focusToTeam(result.id)" class="w-full text-left px-6 py-4 hover:bg-red-50 focus:bg-red-50 focus:outline-none group">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h4 class="text-md font-bold text-gray-900 group-hover:text-red-700" x-text="result.name"></h4>
                                                    <p class="text-sm text-gray-500 mt-1 truncate max-w-md" x-text="result.members"></p>
                                                </div>
                                                <span class="text-xs font-semibold text-red-600 bg-red-100 px-2 py-1 rounded opacity-0 group-hover:opacity-100">Pilih &crarr;</span>
                                            </div>
                                        </button>
                                    </li>
                                </template>
                            </ul>
                        </template>
                        
                        <template x-if="searchResults.length === 0">
                            <div class="px-6 py-8 text-center text-gray-500">
                                Tidak menemukan tim/pemain "<span class="font-bold" x-text="search"></span>"
                            </div>
                        </template>
                        
                    </div>
                </template>
                
                <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 text-xs text-gray-500 flex justify-between">
                    <span>Gunakan panah &uarr;&darr; untuk memilih, <b>Enter</b> untuk konfirmasi.</span>
                    <span>Tekan <b>Esc</b> atau klik di luar untuk menutup.</span>
                </div>
            </div>
        </div>
    </div>
</div>
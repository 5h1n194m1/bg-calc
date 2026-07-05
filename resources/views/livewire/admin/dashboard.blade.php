<div x-data="{ isModalOpen: false }" @close-modal.window="isModalOpen = false" class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    
    <div class="md:flex md:items-center md:justify-between mb-8 border-b border-gray-200 pb-5">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Manajemen Turnamen
            </h2>
            <p class="mt-1 text-sm text-gray-500">Pusat kendali untuk mengelola event, babak, tim, dan skor.</p>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button @click="isModalOpen = true" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                + Buat Turnamen Baru
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($tournaments as $tourney)
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:border-gray-300 hover:shadow-md transition duration-200 flex flex-col">
                <div class="p-5 flex-1">
                    <div class="flex items-center justify-between mb-3">
                        @if($tourney->status === 'LIVE')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <span class="w-2 h-2 mr-1.5 bg-red-600 rounded-full animate-pulse"></span> LIVE
                            </span>
                        @elseif($tourney->status === 'REGISTRATION')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Persiapan
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                Selesai
                            </span>
                        @endif
                        
                        <button wire:click="deleteTournament({{ $tourney->id }})" wire:confirm="Yakin ingin menghapus turnamen ini beserta seluruh data skornya?" class="text-gray-400 hover:text-red-500 transition">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 line-clamp-2" title="{{ $tourney->name }}">{{ $tourney->name }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $tourney->game }}</p>
                </div>
                
                <div class="bg-gray-50 px-5 py-3 border-t border-gray-100 flex justify-between items-center">
                    <a href="/admin/tournament/{{ $tourney->id }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        Kelola Tim & Babak
                    </a>
                    
                    <a href="/admin/score-input/{{ $tourney->id }}" class="text-sm font-bold text-red-600 hover:text-red-800 transition flex items-center">
                        Input Skor &rarr;
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white border border-gray-200 rounded-xl p-8 text-center">
                <p class="text-gray-500">Belum ada turnamen yang dibuat.</p>
            </div>
        @endforelse
    </div>

    <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
        <div x-show="isModalOpen" @click="isModalOpen = false" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm"></div>

        <div class="flex items-center justify-center min-h-screen p-4 text-center sm:p-0">
            <div x-show="isModalOpen" class="relative bg-white rounded-xl text-left overflow-hidden shadow-xl sm:my-8 sm:max-w-lg w-full">
                
                <form wire:submit.prevent="createTournament">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-bold text-gray-900 mb-4">Buat Turnamen Baru</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Turnamen</label>
                                <input type="text" wire:model="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Contoh: PMGC 2026">
                                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Game</label>
                                <select wire:model="game" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option value="PUBG Mobile">PUBG Mobile</option>
                                    <option value="Free Fire">Free Fire</option>
                                    <option value="Mobile Legends">Mobile Legends</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Distribusi Placement Point (Rank 1 - 16)</label>
                                <p class="text-xs text-gray-500 mb-1">Pisahkan dengan koma. Bebas diubah sesuai aturan (Klasik/PMGC).</p>
                                <input type="text" wire:model="pointDistribution" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm font-mono" placeholder="10,6,5,4,3,2,1,1,0,0,0,0,0,0,0,0">
                            </div>
                            </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-900 text-base font-medium text-white hover:bg-red-600 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                            <svg wire:loading wire:target="createTournament" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Simpan Turnamen
                        </button>
                        <button type="button" @click="isModalOpen = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
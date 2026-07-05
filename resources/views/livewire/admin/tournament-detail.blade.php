<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <div class="mb-8 flex items-center justify-between border-b border-gray-200 pb-5">
        <div>
            <a href="/admin/dashboard" class="text-sm font-medium text-gray-500 hover:text-red-600 mb-2 inline-block">&larr; Kembali ke Dashboard</a>
            <h1 class="text-3xl font-extrabold text-gray-900">{{ $tournament->name }}</h1>
            <p class="mt-1 text-sm text-gray-500">Game: <span class="font-semibold text-gray-700">{{ $tournament->game }}</span> | Status: <span class="font-semibold text-red-600">{{ $tournament->status }}</span></p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex flex-col h-[75vh]">
            <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Pool Tim (Belum Masuk Grup)</h3>
            
            <form wire:submit.prevent="createTeam" class="mb-4 flex gap-2">
                <input type="text" wire:model="newTeamName" placeholder="Nama tim..." class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                <button type="submit" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-bold hover:bg-red-600 transition">+</button>
            </form>

            <div class="flex-1 overflow-y-auto bg-gray-50 rounded-lg border border-dashed border-gray-300 p-2" 
                 x-data 
                 x-init="new Sortable($el, { group: 'shared', animation: 150, onEnd: (e) => { @this.updateTeamPot(e.item.dataset.id, 'unassigned') } })">
                
                @forelse($unassignedTeams as $team)
                    <div data-id="{{ $team->id }}" class="bg-white border border-gray-200 shadow-sm rounded-md p-3 mb-2 cursor-grab active:cursor-grabbing flex justify-between items-center group hover:border-red-300">
                        <span class="font-semibold text-sm text-gray-700">{{ $team->name }}</span>
                        <button wire:click="deleteTeam({{ $team->id }})" class="text-gray-300 hover:text-red-500 opacity-0 group-hover:opacity-100 transition">✕</button>
                    </div>
                @empty
                    <p class="text-xs text-center text-gray-400 mt-10">Semua tim sudah masuk grup.</p>
                @endforelse
            </div>
        </div>

        <div class="lg:col-span-3 space-y-6">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex gap-4 items-end">
                <div class="flex-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Tambah Babak Baru</label>
                    <input type="text" wire:model="newStageName" placeholder="Contoh: Kualifikasi, Semifinal..." class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                </div>
                <button wire:click="createStage" class="bg-gray-900 text-white px-5 py-2 rounded-md text-sm font-bold hover:bg-red-600 transition">Buat Babak</button>
            </div>

            @foreach($stages as $stage)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-900 px-5 py-3 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-white uppercase">{{ $stage->name }}</h2>
                        <div class="flex gap-2">
                            <input type="text" wire:model="newPotName" placeholder="Nama Grup (Pot)" class="text-xs rounded border-none focus:ring-0 px-2 py-1 w-32 text-gray-900">
                            <button wire:click="$set('selectedStageId', {{ $stage->id }}); createPot()" class="bg-red-600 hover:bg-red-500 text-white text-xs font-bold px-3 py-1 rounded transition">+ Grup</button>
                        </div>
                    </div>
                    
                    <div class="p-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                        @foreach($pots->where('stage_id', $stage->id) as $pot)
                            <div class="bg-gray-50 rounded-lg border border-gray-200 flex flex-col h-72">
                                <div class="px-4 py-2 border-b border-gray-200 bg-gray-100 flex justify-between items-center rounded-t-lg">
                                    <h4 class="font-bold text-gray-800 text-sm">{{ $pot->name }}</h4>
                                    <a href="/admin/score-input" class="text-[10px] font-bold bg-white border border-gray-300 text-gray-600 px-2 py-1 rounded hover:text-red-600 hover:border-red-600 transition">Input Skor &rarr;</a>
                                </div>
                                
                                <div data-pot-id="{{ $pot->id }}" 
                                     class="flex-1 p-2 overflow-y-auto"
                                     x-data 
                                     x-init="new Sortable($el, { group: 'shared', animation: 150, onEnd: (e) => { @this.updateTeamPot(e.item.dataset.id, e.to.dataset.potId) } })">
                                    
                                    @foreach($teams->where('pot_id', $pot->id) as $team)
                                        <div data-id="{{ $team->id }}" class="bg-white border-l-4 border-red-500 shadow-sm rounded p-2 mb-2 cursor-grab active:cursor-grabbing hover:bg-red-50 transition">
                                            <span class="font-bold text-xs text-gray-800">{{ $team->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
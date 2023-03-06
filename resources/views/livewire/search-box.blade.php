<div>
    <div id="search-input-wrapper" class="input-group input-group-sm">
        <input placeholder="{{ __("Enter a name") }}"
               wire:model="search"
               type="search"
               class="form-control shadow-lg pe-4 ps-4 pt-3 pb-3 dropdown-toggle" aria-label="search">
    </div>
    <div>
        <ul @class(['dropdown-menu overflow-auto', 'show' => $cities->isNotEmpty()])>
            @foreach($cities as $id => $cityName)
                <li><button class="dropdown-item" type="button" wire:click="showCity({{ $id }})">{{ $cityName }}</button></li>
            @endforeach
        </ul>
    </div>
</div>

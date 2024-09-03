<div class="my-4">
    <input wire:model="query" type="text" class="rounded form-input w-full relative" placeholder="Search Contacts...">

    @if (!empty($products))
        <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
            @foreach ($products as $product)
                <div class="px-4 py-2 hover:bg-gray-200 cursor-pointer">
                    {{ $product->name }}
                </div>
            @endforeach
        </div>
    @endif
</div>

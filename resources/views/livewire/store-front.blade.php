<div>
    @livewire('search-bar')

    <div class="grid grid-cols-4 gap-6 p-6">

        @foreach($this->products as $product)
            <div class="relative bg-white rounded-lg shadow-md p-6 transition transform hover:-translate-y-1 hover:shadow-lg flex flex-col items-center justify-between h-80">
                <a href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>

                <div class="bg-white flex-shrink-0 w-full h-40 flex items-center justify-center rounded-lg mb-4">
                    <img src="{{ $product->image->path }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain">
                </div>

                <h2 class="text-xl font-extrabold text-gray-900 mb-2 text-center">{{ $product->name }}</h2>
                <span class="bg-blue-100 text-blue-800 font-medium text-xs px-2 py-1 rounded">{{ $product->price }}</span>
            </div>
        @endforeach
    </div>
</div>

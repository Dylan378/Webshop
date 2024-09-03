<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-xl">
        <div x-data="{ image: '/{{ $this->product->image->path }}' }" class="md:w-1/2 p-6 space-y-6">
            <div class="border-gray-200 border hover:scale-110 bg-white p-5 rounded-lg shadow-lg w-full max-w-lg">
                <img x-bind:src="image" class="w-full rounded-lg object-cover">
            </div>

            <div class="flex justify-center mb-8 space-x-4">
                @foreach($this->product->images as $image)
                    <div class="border-gray-200 border hover:scale-110 hover:shadow-lg rounded-lg bg-white shadow p-2 w-24 h-24">
                        <img src="/{{ $image->path }}" @click="image = '/{{ $image->path }}'" class="rounded-lg object-cover w-full h-full">
                    </div>
                @endforeach
            </div>
        </div> 

        <div class="md:w-1/2 p-6 flex flex-col justify-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $this->product->name }}</h1>
            <div class="text-2xl text-green-600 font-semibold mb-4">{{ $this->product->price }}</div>
            <div class="text-gray-700 mb-6">{{ $this->product->description }}</div>

            <div class="space-y-4">
                <select wire:model="productVariant" class="w-full p-3 border border-gray-300 rounded-lg">
                    @foreach($this->product->productVariants as $variant)
                        <option value="{{ $variant->id }}">{{ $variant->size }} / {{ $variant->color }}</option>
                    @endforeach
                </select>

                @error('productVariant')

                    {{-- <div x-data="{ showToast: true }" x-show="showToast" id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert"> --}}
                        <div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                            </svg>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ $message }}</div>

                        {{-- <button @click="showToast = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button> --}}

                    </div>
                @enderror

                <x-button wire:click="addToCart" class="w-full py-3">
                    <i class="fa-solid fa-cart-shopping pr-3"></i>
                    Add to cart
                </x-button>
            </div>
        </div>
    </div>
</div>

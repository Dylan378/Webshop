<div class="container mx-auto px-4 py-8 space-y-8">

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($this->cart_items as $item)
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">
                            {{ $item->product->name }}
                        </td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $item->productVariant->size }}</div>
                        </td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $item->productVariant->color }}</div>
                        </td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            {{ $item->subtotal }}
                        </td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <button wire:click="decrement({{ $item->id }})" class="text-gray-600 hover:text-gray-800">
                                    <i class="fa-solid fa-minus fa-sm"></i>
                                </button>
                                <div class="text-sm text-gray-900">{{ $item->quantity }}</div>
                                <button wire:click="increment({{ $item->id }})" class="text-gray-600 hover:text-gray-800">
                                    <i class="fa-solid fa-plus fa-sm"></i>
                                </button>
                            </div>
                        </td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <button wire:click="delete({{ $item->id }})" class="">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md space-y-4 text-center">
        <div class="text-lg font-semibold">Total: {{ $this->cart->total }}</div>
        @guest
            <p class="text-gray-700">Please <a href="{{ route('register') }}" class="text-blue-500 underline">register</a> or <a href="{{ route('login') }}" class="text-blue-500 underline">login</a> to continue</p>
        @endguest
        @auth
            <x-button wire:click="checkout" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">Checkout</x-button>
        @endauth
    </div>
    
</div>


<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')" class="relative">
    <i class="fa-solid fa-cart-shopping pr-3"></i>
    <span class="absolute top-3 right-1 border border-white text-center bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center text-[8px] p-1">
        {{ $this->count }}
    </span>
</x-nav-link>   

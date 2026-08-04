<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Book Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0b0d12;
            color: #f3f4f6;
        }
        .font-serif {
            font-family: 'Instrument Serif', serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-[#ff5c35] selection:text-white">

    <div>
        @include('components.navbar')

        <main class="max-w-7xl mx-auto px-6 py-12">
            <div class="mb-8">
                <h1 class="font-serif text-4xl md:text-5xl text-white tracking-wide">Your Shopping Cart</h1>
                <p class="text-zinc-400 mt-2">Review your selected volumes before proceeding to checkout.</p>
            </div>

            @if(session('success'))
                <div id="toast-success" class="fixed bottom-6 right-6 z-50 flex items-center gap-3 px-5 py-4 rounded-2xl bg-[#13161f] border border-emerald-500/30 text-emerald-400 shadow-2xl shadow-black/60 transition-all duration-300 transform translate-y-0 opacity-100">
                    <div class="w-7 h-7 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-sm">✓</div>
                    <span class="font-medium text-sm text-white">{{ session('success') }}</span>
                    <button onclick="document.getElementById('toast-success').style.display='none'" class="ml-4 text-zinc-400 hover:text-white text-xs">✕</button>
                </div>
                <script>
                    setTimeout(() => {
                        const t = document.getElementById('toast-success');
                        if(t) {
                            t.style.opacity = '0';
                            t.style.transform = 'translateY(10px)';
                            setTimeout(() => t.remove(), 300);
                        }
                    }, 4000);
                </script>
            @endif

            @if(isset($cartItems) && $cartItems->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Items List -->
                    <div class="lg:col-span-2 space-y-4">
                        @foreach($cartItems as $item)
                            <div class="flex items-center justify-between p-4 rounded-2xl bg-[#13161f] border border-white/10 hover:border-white/20 transition">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-20 bg-zinc-800 rounded-lg overflow-hidden flex-shrink-0">
                                        @if($item->book->cover_image)
                                            <img src="{{ asset('/' . $item->book->cover_image) }}" alt="{{ $item->book->title }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-xs text-zinc-500">No Image</div>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-white text-lg">{{ $item->book->title }}</h3>
                                        <p class="text-sm text-zinc-400">{{ $item->book->created_by ?? 'Unknown Author' }}</p>
                                        <p class="text-xs text-[#ff5c35] mt-1 font-medium">Quantity: {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <div class="text-right flex flex-col items-end space-y-2">
                                    <span class="font-serif text-2xl text-white">${{ number_format($item->book->price * $item->quantity, 2) }}</span>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-red-400 hover:text-red-300 transition">Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cart Summary / Checkout -->
                    <div class="p-6 rounded-2xl bg-[#13161f] border border-white/10 h-fit space-y-6">
                        <h2 class="text-xl font-semibold text-white border-b border-white/10 pb-4">Order Summary</h2>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between text-zinc-400">
                                <span>Subtotal</span>
                                <span class="text-white">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-zinc-400">
                                <span>Shipping</span>
                                <span class="text-emerald-400 font-medium">Free</span>
                            </div>
                            <div class="border-t border-white/10 pt-3 flex justify-between text-lg font-semibold text-white">
                                <span>Total</span>
                                <span class="text-[#ff5c35]">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <button onclick="alert('Checkout / Payment is simulated as requested!')" class="w-full py-3.5 px-4 rounded-xl bg-[#ff5c35] text-white font-medium text-center hover:bg-[#e04e2b] transition shadow-lg shadow-[#ff5c35]/20">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            @else
                <div class="text-center py-20 rounded-2xl bg-[#13161f] border border-white/10">
                    <p class="text-zinc-400 text-lg mb-6">Your shopping cart is currently empty.</p>
                    <a href="{{ route('books') }}" class="inline-block py-3 px-8 rounded-xl bg-[#ff5c35] text-white font-medium hover:bg-[#e04e2b] transition shadow-lg shadow-[#ff5c35]/20">
                        Explore Catalog
                    </a>
                </div>
            @endif
        </main>
    </div>

    <footer class="border-t border-white/10 bg-[#0b0d12] py-8 text-center text-sm text-zinc-500">
        <p>&copy; {{ date('Y') }} Book Store. All rights reserved.</p>
    </footer>

</body>
</html>

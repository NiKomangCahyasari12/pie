<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center">
            {{ __('Keranjang Belanja') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1 class="mb-4">Keranjang Belanja Anda</h1>

        <!-- Cek jika keranjang kosong -->
        @if($cartItems->isEmpty())
            <div class="alert alert-info text-center">
                Keranjang belanja Anda kosong. Mulailah berbelanja sekarang!
            </div>
        @else
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->product->price, 2) }}</td>
                    <td>Rp {{ number_format($item->total_price, 2) }}</td>
                    <td class="d-flex">
                        <!-- Update kuantitas -->
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                            class="form-control w-50 mr-2" style="max-width: 100px;">
                            <button type="submit" class="btn btn-success btn-sm">Perbarui</button>
                        </form>

                        <!-- Hapus item -->
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="d-inline ml-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Ringkasan Keranjang -->
        <div class="mt-4">
            <h4>Ringkasan Keranjang</h4>
            <p><strong>Total Item:</strong> {{ $cartCount }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($cartItems->sum('total_price'), 2) }}</p>
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg w-100">Lanjutkan ke Pembayaran</button>
            </form>
        </div>
        @endif
    </div>

</x-app-layout>

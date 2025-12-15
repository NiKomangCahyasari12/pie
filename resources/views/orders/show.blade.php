<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Detail Order') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Data Order</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <tr>
                                <td>ID</td>
                                <td><b>{{ $order->order_id }}</b></td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td><b>Rp {{ number_format($order->total_price, 2, ',', '.') }}</b></td>
                            </tr>
                            <tr>
                                <td>Status Order</td>
                                <td><b>{{ $order->status }}</b></td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td><b>{{ $order->payment_status }}</b></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td><b>{{ $order->created_at->format('d M Y H:i') }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        @if ($order->payment_status == 'unpaid')
                            <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                        @elseif ($order->payment_status == 'paid')
                            Pembayaran berhasil
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="page_script">
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        <script>
            const payButton = document.querySelector('#pay-button');
            payButton.addEventListener('click', function (e) {
                e.preventDefault();

                snap.pay('{{ $snapToken }}', {
                    onSuccess: function (result) {
                        console.log(result);
                    },
                    onPending: function (result) {
                        console.log(result);
                    },
                    onError: function (result) {
                        console.log(result);
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>

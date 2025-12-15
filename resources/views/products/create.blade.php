<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Create Product') }}
        </h2>
    </x-slot>
    <x-slot name="app_asset">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    </x-slot>
 
    <div class="container">
 
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
 
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="description"
                            placeholder="Description"></textarea>
                    </div>
                </div>
 
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga:</strong>
                        <input type="number" name="price" class="form-control" placeholder="Price">
                    </div>
                </div>
 
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" id="latitude" name="latitude" class="form-control" readonly required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" id="longitude" name="longitude" class="form-control" readonly required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 pt-2">
                    <div id="map" style="height: 250px;"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i
                            class="fa-solid fa-floppy-disk"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
    <x-slot name="page_script">
        <script>
            // Inisialisasi peta
            var map = L.map('map').setView([-6.200000, 106.816666], 13);
            var marker;
 
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const {
                        latitude,
                        longitude
                    } = position.coords;
                    // Set view ke lokasi pengguna
                    map.setView([latitude, longitude], 13);
 
                },
                (error) => {
                    alert('Error mendapatkan lokasi Anda: ' + error.message);
                }
            );


            // Tambahkan tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
 
            // Event klik pada peta
            map.on('click', function (e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
 
                // Perbarui form latitude dan longitude
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
 
                // Tambahkan atau pindahkan marker
                if (marker) {
                    marker.setLatLng(e.latlng);
                } else {
                    marker = L.marker(e.latlng).addTo(map);
                }
            });
        </script>
    </x-slot>
</x-app-layout>

<x-app-layout>
    <x-slot name="app_asset">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    </x-slot>
    <div class="container">
 
        <label>Radius</label>
 
        <input type="number" name="radius" id="radius" min=1 max=15 value="10" />
        <button class="btn btn-primary" id="locateMe">Locate Me</button>
 
        <div id="map" style="height: 500px;"></div>
        <script>
            // Inisialisasi peta
            var map = L.map('map').setView([-6.200000, 106.816666], 13); // Jakarta
            var userMarker; // Marker lokasi pengguna
            var markersLayer = L.layerGroup().addTo(map);
 
            // Tambahkan tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
 
            // Fetch produk dari API
            function fetchProducts(lat, lng, rad) {
                markersLayer.clearLayers();
                fetch(`/products?latitude=${lat}&longitude=${lng}&radius=${rad}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(product => {
                            // Buat marker untuk produk
                            const marker = L.marker([product.latitude, product.longitude])
                                .bindPopup(`<b>${product.name}</b><br>${product.description}<br>Price: Rp${product.price.toLocaleString()}`);
 
                            // Tambahkan marker ke Layer Group
                            markersLayer.addLayer(marker);
                        });
                    });
            }
 
            // Tombol "Locate Me"
            document.getElementById('locateMe').addEventListener('click', () => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const {
                                latitude,
                                longitude
                            } = position.coords;
                            let radius_user = document.getElementById("radius").value;
                            // Set view ke lokasi pengguna
                            map.setView([latitude, longitude], 13);
 
                            // Hapus marker lama jika ada
                            if (userMarker) map.removeLayer(userMarker);
 
                            // Tambahkan marker lokasi pengguna
                            userMarker = L.marker([latitude, longitude]).addTo(map)
                                .bindPopup('<b>Your Location</b>')
                                .openPopup();
 
                            // Fetch produk berdasarkan lokasi pengguna
                            fetchProducts(latitude, longitude, radius_user);
                        },
                        (error) => {
                            alert('Error mendapatkan lokasi Anda: ' + error.message);
                        }
                    );
                } else {
                    alert('Geolocation tidak didukung oleh browser Anda.');
                }
            });
 
            // Fetch produk pertama kali dengan lokasi default
            fetchProducts(-6.200000, 106.816666, 10);
        </script>
    </div>
</x-app-layout>

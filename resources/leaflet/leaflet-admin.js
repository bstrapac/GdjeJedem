jQuery(document).ready(function($) {
    var map = L.map('leafletmap').setView([45.83194, 17.38389], 13);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var marker = L.marker();
    var savedlat = document.getElementsByName('restoran_lat')[0].value;
    var savedlng = document.getElementsByName('restoran_lng')[0].value;
    marker.setLatLng([savedlat, savedlng]).addTo(map);
    function onMapClick(e) {
        marker.setLatLng(e.latlng).addTo(map);
        var curPos = marker.getLatLng();
        var currentLat = document.getElementsByName('restoran_lat')[0];
        var currentLng = document.getElementsByName('restoran_lng')[0];
        currentLat.value = curPos.lat;
        currentLng.value = curPos.lng;
    };
    map.on('click', onMapClick);	
});

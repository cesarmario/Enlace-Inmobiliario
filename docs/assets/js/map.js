const tilesProvider = "	https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
//const input = document.querySelector('input');
//const log = document.getElementById('coordenadas');

let myMap = L.map('myMap').setView([-31.5373, -68.5251], 14)

L.tileLayer(tilesProvider, {
 maxZoom: 18,   
}).addTo(myMap)

let marker = L.marker([-31.5373, -68.5251]).addTo(myMap)

myMap.doubleClickZoom.disable()

myMap.on('dblclick', e => {
    let latLng = myMap.mouseEventToLatLng(e.originalEvent)
    console.log(latLng)
    L.marker([latLng.lat, latLng.lng]).addTo(myMap)
    document.getElementById("coordenadas").value = latLng;
})

/*
    navigator.geolocation.getCurrentPosition(
    (pos) => {
        const {coords} = pos
        console.log(coords)
        L.marker([coords.latitude, coords.longitude]).addTo(myMap)
    },
    (err) => {
        console.log(err)
    },
    {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    }    
) */
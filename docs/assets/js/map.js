const tilesProvider = "	https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"

let myMap = L.map('myMap').setView([-31.5358, -68.5458], 14)

L.tileLayer(tilesProvider, {
 maxZoom: 18,   
}).addTo(myMap);
if(document.querySelector('#mapa')) {

    const lat =-13.077682021361737;
    const lng =-76.38733015422785;
    const zoom=10;


    const  map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">Cañete</h2>
            <p class="mapa__texto">Cuna y capital del arte negro</p>
        `)
        .openPopup();
}
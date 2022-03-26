function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
const souvenirNode = document.querySelector('.detail-souvenir');

const souvenirId = getParameterByName('s_id');
var dodata;
var url = "{{ url('/assets/json/souvenir.json') }}";

const populateData = () => {
    souvenirNode.querySelector('.detail-souvenir__title').textContent = this.dodata.nama
    souvenirNode.querySelector('.detail-souvenir__desc').textContent = this.dodata.desc
    souvenirNode.querySelector('.detail-souvenir__img').textContent = this.dodata.img
    souvenirNode.querySelector('.detail-souvenir__berat').textContent = this.dodata.berat
    souvenirNode.querySelector('.detail-souvenir__harga').textContent = this.dodata.harga
    souvenirNode.querySelector('.detail-souvenir__submit').setAttribute('href', souvenirNode.querySelector('.detail-souvenir__submit').getAttribute('href') + '&s_id=' + this.dodata.uid)
}

const getData = () => {
    fetch(url)
        .then(response => response.json())
        .then(data => {
            this.dodata = data.filter((e) => {
                return e.uid == souvenirId
            })[0]
            console.log(this.dodata);
            populateData();
        })
}
getData()
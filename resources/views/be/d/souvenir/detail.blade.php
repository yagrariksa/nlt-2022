@extends('be.dump.temp')

@section('content')

    <div class="" id="souvenir" style="display: flex; flex-direction: column; gap: 1rem">
        <span id="souv-nama"></span>
        <span id="souv-desc"></span>
        <span id="souv-img"></span>
        <span id="souv-berat"></span>
        <span id="souv-harga"></span>
        <a href="{{route('souvenir', ['mode' => 'add', 'object' => 'katalog'])}}" id="linkForAdd">Tambahkan ke Kantong</a>
    </div>

    <script>
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
        const souvenirNode = document.querySelector('#souvenir');

        const souvenirId = getParameterByName('s_id');
        var dodata;
        var url = "{{ url('/assets/json/souvenir.json') }}";

        const populateData = () => {
            souvenirNode.querySelector('#souv-nama').textContent = this.dodata.nama
            souvenirNode.querySelector('#souv-desc').textContent = this.dodata.desc
            souvenirNode.querySelector('#souv-img').textContent = this.dodata.img
            souvenirNode.querySelector('#souv-berat').textContent = this.dodata.berat
            souvenirNode.querySelector('#souv-harga').textContent = this.dodata.harga
            souvenirNode.querySelector('#linkForAdd').setAttribute('href', souvenirNode.querySelector('#linkForAdd').getAttribute('href') + '&s_id=' + this.dodata.uid)
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
    </script>
@endsection
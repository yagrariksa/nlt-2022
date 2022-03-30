@extends('be.dump.temp')

@section('content')
    @if (Session::has('msg'))
        <span style="color:red">{{ Session::get('msg') }}</span>
    @endif

    <div class="card" id="souvenir">
        <div class="card-title"></div>
        <div class="card-desc"></div>
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
            souvenirNode.querySelector('.card-title').textContent = this.dodata.nama
            souvenirNode.querySelector('.card-desc').textContent = this.dodata.desc
            document.querySelector('#item_id').value = this.dodata.uid
            document.querySelector('#item_name').value = this.dodata.nama
            document.querySelector('#harga').value = this.dodata.harga
            document.querySelector('#berat_gram').value = this.dodata.berat
        }

        const getData = () => {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    console.log(souvenirId)
                    this.dodata = data.filter((e) => {
                        return e.uid == souvenirId
                    })[0]
                    // console.log(this.dodata)
                    populateData();
                })
        }
        getData()
    </script>
@endsection

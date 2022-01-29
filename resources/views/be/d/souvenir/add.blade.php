@extends('be.dump.temp')

@section('content')

    <div class="card" id="souvenir">
        <div class="card-title"></div>
        <div class="card-desc"></div>
    </div>
    <form action="{{ route('souvenir', [
        'mode' => 'add',
    ]) }}" method="post">
        @csrf
        <input type="hidden" name="item_name" id="item_name">
        <input type="hidden" name="item_id" id="item_id">
        <input type="hidden" name="item_price" id="item_price">
        <h3>Form pemesanan</h3>
        <span>pemesan</span>
        <select name="peserta" id="">
            <option value="" selected disabled>--pilih peserta--</option>
            @foreach (Auth::user()->peserta as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
        <span>jumlah item</span>
        <input type="number" name="jumlah" id="">
        <span>keteramgam tambahan</span>
        <textarea name="keterangan tambahan" id="" cols="30" rows="10"></textarea>
        <button type="submit">Pesan</button>
    </form>

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
        const inputName = document.querySelector('#item_name');
        const inputId = document.querySelector('#item_id');

        const souvenirId = getParameterByName('s_id');
        var dodata;
        var url = "{{ url('/assets/json/souvenir.json') }}";

        const populateData = () => {
            souvenirNode.querySelector('.card-title').textContent = this.dodata.nama
            souvenirNode.querySelector('.card-desc').textContent = this.dodata.desc
            document.querySelector('#item_id').value = this.dodata.uid
            document.querySelector('#item_price').value = this.dodata.price
            document.querySelector('#item_name').value = this.dodata.nama
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

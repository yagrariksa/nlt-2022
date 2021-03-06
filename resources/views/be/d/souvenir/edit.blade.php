@extends('be.dump.temp')

@section('content')
    {{-- @dump($errors) --}}
    <div class="" style="display: flex; width: 100%; justify-content: space-around">
        <div class="" style="display: flex; flex-direction: column">
            <span>Nama barang : {{ $s->nama }}</span>
            <span>Harga barang : {{ $s->harga }}</span>
            <span>Berat barang : {{ $s->berat_gram }}</span>
        </div>
        <div class="card" id="souvenir">
            <div class="card-title"></div>
            <div class="card-desc"></div>
        </div>
    </div>

    <form action="{{ route('souvenir', [
        'mode' => 'edit-my-item',
    ]) }}" method="post" style="padding: 0">
        @csrf


        <input type="hidden" name="item_name" id="item_name">
        <input type="hidden" name="item_id" id="item_id">
        <input type="hidden" name="harga" id="harga">
        <input type="hidden" name="berat_gram" id="berat_gram">
        <input type="hidden" name="souv_id" id="" value="{{ $s->souv_id }}">
        <h3>EDIT Form pemesanan</h3>
        <span>pilih kantong</span>
        @if (sizeof(Auth::user()->kantong) == 0)
            <div class="" style="margin-left: 1rem; padding: 1rem; border: 1px solid red;">
                <span>anda belum memiliki kantong</span>
                <a
                    href="{{ route('souvenir', [
                        'mode' => 'add',
                        'object' => 'kantong',
                        'redirect' => 'true',
                    ]) }}">buat
                    sekarang</a>
            </div>
        @else
            <select name="kantong" id="">
                <option value="" selected disabled>--pilih kantong--</option>
                @foreach (Auth::user()->kantong as $p)
                    <option @if ($p->id == $s->kantong_id) selected @endif value="{{ $p->id }}">
                        {{ $p->nama }}</option>
                @endforeach
            </select>
            <a
                href="{{ route('souvenir', [
                    'mode' => 'add',
                    'object' => 'kantong',
                    'redirect' => 'true',
                ]) }}">tambah
                kantong</a>
        @endif
        <span>jumlah item</span>
        <input type="number" name="jumlah" id="" value="{{ $s->jumlah }}">
        <span>keteramgam tambahan</span>
        <textarea name="catatan" id="" cols="30" rows="10">{{ $s->catatan }}</textarea>
        <button type="submit">EDIT</button>
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

        const souvenirId = "{{ $s->json_id }}";
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

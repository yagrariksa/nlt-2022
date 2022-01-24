@include('be.dump.head')
<form action="{{ route('peserta', [
    'mode' => 'add',
    'object' => 'travel',
]) }}" method="post">
    @csrf
    <select name="peserta" id="">
        <option value="" @if (!old('peserta'))
            selected
            @endif
            disabled>--pilih peserta--</option>
        @foreach (Auth::user()->peserta as $item)
            <option @if (old('peserta') == $item->uid)
                selected
        @endif
        value="{{ $item->uid }}">{{ $item->nama }}</option>
        @endforeach
    </select>
    @if ($errors->has('peserta'))
        <span class="error">{{ $errors->first('peserta') }}</span>
    @endif
    <select name="lokasi" id="">
        <option value="" selected disabled>--pilih lokasi kedatangan--</option>
        <option value="lokasi acara">lokasi acara</option>
        <option value="stasiun gubeng">stasiun gubeng</option>
        <option value="stasiun pasar turi">stasiun pasar turi</option>
        <option value="bandara juanda">bandara juanda</option>
        <option value="terminal bungurasih">terminal bungurasih</option>
        <option value="lainnya">lainnya</option>
    </select>
    @if ($errors->has('lokasi'))
        <span class="error">{{ $errors->first('lokasi') }}</span>
    @endif
    <input type="text" name="transportasi" value="{{ old('transportasi') }}" placeholder="tipe transportasi">
    @if ($errors->has('transportasi'))
        <span class="error">{{ $errors->first('transportasi') }}</span>
    @endif
    <input type="datetime-local" name="datetime" id="" value="{{ old('datetime') }}">
    @if ($errors->has('datetime'))
        <span class="error">{{ $errors->first('datetime') }}</span>
    @endif
    <h4>bantuan transporatsi dari panitia</h4>
    <div class="row">
        <input @if (old('bantuan') == 'perlu')
        checked
        @endif
        type="radio" name="bantuan" value="perlu" id="bantuan-perlu">
        <label for="bantuan-perlu">perlu</label>
    </div>
    <div class="row">
        <input @if (old('bantuan') == 'tidak-perlu')
        checked
        @endif
        type="radio" name="bantuan" value="tidak-perlu" id="bantuan-tidak-perlu">
        <label for="bantuan-tidak-perlu">tidak-perlu</label>
    </div>
    @if ($errors->has('bantuan'))
        <span class="error">{{ $errors->first('bantuan') }} <br> harap pilih salah satu</span>
    @endif
    <h4>jenis travel plan</h4>
    <div class="row">
        <input @if (old('type') == 'keberangkatan')
        checked
        @endif
        type="radio" name="type" value="keberangkatan" id="keberangkatan">
        <label for="keberangkatan">keberangkatan</label>
    </div>
    <div class="row">
        <input @if (old('type') == 'kepulangan')
        checked
        @endif
        type="radio" name="type" value="kepulangan" id="kepulangan">
        <label for="kepulangan">kepulangan</label>
    </div>
    @if ($errors->has('type'))
        <span class="error">{{ $errors->first('type') }} <br> harap pilih salah satu</span>
    @endif
    @if (Session::has('type'))
        <div class="error">{{ Session::get('type') }}</div>
    @endif
    <button type="submit">tambah data</button>
</form>
@include('be.dump.foot')

@include('be.dump.head')
<form
    action="{{ route('peserta', [
        'mode' => 'edit',
        'object' => 'peserta',
        'uid' => app('request')->input('uid'),
    ]) }}"
    method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder="email" name="email" id=""
        value="{{ old('email') ? old('email') : $data->email }}">
    @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
    @endif
    <input type="text" placeholder="nama" name="nama" id="" value="{{ old('nama') ? old('nama') : $data->nama }}">
    @if ($errors->has('nama'))
        <span class="error">{{ $errors->first('nama') }}</span>
    @endif
    <input type="text" placeholder="line" name="line" id="" value="{{ old('line') ? old('line') : $data->line }}">
    @if ($errors->has('line'))
        <span class="error">{{ $errors->first('line') }}</span>
    @endif
    @if ($data->jabatan == 'ketua')
        <input type="text" disabled name="jabatan" value="ketua">
    @else
        <select name="jabatan" id="">
            <option value="" disabled>--pilih jabatan--</option>
            @if (!old('jabatan'))
                {{-- just for helper --}}
                <option value="{{ $data->jabatan }}">{{ $data->jabatan }}</option>
            @endif
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
        </select>
    @endif
    <input type="text" placeholder="no HP" name="handphone" id=""
        value="{{ old('handphone') ? old('handphone') : $data->handphone }}">
    @if ($errors->has('handphone'))
        <span class="error">{{ $errors->first('handphone') }}</span>
    @endif
   
    <img src="{{ url('storage') . '/' . $data->ktp_url }} " alt="" style="width: 50%">
    <input type="file" placeholder="ktp" name="ktp">
    @if ($errors->has('ktp'))
        <span class="error">{{ $errors->first('ktp') }}</span>
    @endif
    <img src="{{ url('storage') . '/' . $data->foto_url }} " alt="" style="width: 50%">
    <input type="file" placeholder="pas" name="pas" value="{{ old('pas') }}">
    @if ($errors->has('pas'))
        <span class="error">{{ $errors->first('pas') }}</span>
    @endif
    <button type="submit">Tambah Peserta</button>
</form>
@include('be.dump.foot')

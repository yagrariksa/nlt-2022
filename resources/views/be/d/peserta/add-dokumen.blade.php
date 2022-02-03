@extends('be.dump.temp')

@section('content')
    tambah dokumen

    <form
        action="{{ route('peserta', [
            'mode' => 'add',
            'object' => 'dokumen',
            'uid' => app('request')->input('uid'),
        ]) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tbody>
                <tr>
                    <td>
                        <h3>Dokumen Surat Izin Orang tua</h3>
                        <span>dokumen saat ini :
                            @if ($data->doc_izin)
                                <a href="{{ url('storage') . '/' . $data->doc_izin }}">
                                    {{ $data->doc_izin }}
                                </a>
                            @else
                                belum submit
                            @endif
                        </span>
                    </td>
                    <td>
                        <input type="file" name="doc_izin" id="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Dokumen Vaksin Dosis 2</h3>
                        <span>dokumen saat ini : @if ($data->doc_vaksin)
                                <a href="{{ url('storage') . '/' . $data->doc_vaksin }}">
                                    {{ $data->doc_vaksin }}
                                </a>
                            @else
                                belum submit
                            @endif</span>
                    </td>
                    <td>
                        <input type="file" name="doc_vaksin" id="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Dokumen Pernyataan</h3>
                        <span>dokumen saat ini :
                            @if ($data->doc_pernyataan)
                                <a href="{{ url('storage') . '/' . $data->doc_pernyataan }}">
                                    {{ $data->doc_pernyataan }}
                                </a>
                            @else
                                belum submit
                            @endif
                        </span>
                    </td>
                    <td>
                        <input type="file" name="doc_pernyataan" id="">
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit">Upload All</button>
    </form>



@endsection

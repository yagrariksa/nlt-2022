<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body,
        form {
            padding: 5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem
        }

        .row {
            display: flex;
            gap: 1rem;
        }

        .error {
            color: red;
        }

        .row--no-space {
            gap: .4rem;
        }

        .w-100 {
            width: 100vw;
        }

        .row-center {
            justify-content: center;
        }

        .header {
            padding: 1rem;
            background-color: burlywood;
            position: fixed;
            top: 0;
            left: 0;
        }

        .header__item {
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: underline;
            color: inherit;
        }

        th,
        td {
            padding: .2rem;
            border: 1px solid black;
        }

        form.no-space {
            padding: 0;
            gap: 0;
            margin: 0
        }

        #souvenir__list {
            display: flex;
            flex-direction: row;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .card {
            cursor: pointer;
            max-width: 13rem;
            display: flex;
            flex-direction: column;
            padding: 1rem;
            border: 1px solid black;
        }

        .card:hover {
            border-width: 3px
        }

        .card.hide {
            display: none;
        }

        .card-title {
            font-weight: 600;
        }

        .button,
        button {
            width: fit-content;
            margin: 5px;
            text-decoration: none;
            color: black;
            padding: 3px 7px;
            background-color: beige;
            border-radius: 3px;
            border: .7px solid black;
        }

        .button:hover,
        button:hover {
            background-color: blanchedalmond;
        }

        .badges {
            padding: 3px 10px;
            border-radius: 99px;
            background-color: rgba(127, 255, 212, 0.404)
        }
    </style>
</head>

<body>

    @auth
        <div class="row w-100 row-center header">
            <a class="header__item" href="{{ route('home') }}">Home</a>
            <a class="header__item"
                href="{{ route('peserta', [
                    'mode' => 'list',
                    'object' => 'peserta',
                ]) }}">peserta</a>
            <a class="header__item" href="{{ route('absensi') }}">Absen</a>
            <a class="header__item" href="{{ route('souvenir') }}">Souvenir</a>
            <a class="header__item" href="{{ route('sertif') }}">sertif</a>
            <a class="header__item" href="{{ route('akun.setting') }}">ganti password</a>
            <a class="header__item" href="{{ route('logout') }}">LogOut</a>
        </div>
    @endauth

    @if (Session::has('admin'))
        @if (Session::get('admin'))
            <div class="row w-100 row-center header">
                <a href="{{ route('a.peserta', [
                    'object' => 'univ',
                ]) }}"
                    class="header__item">per univ</a>
                <a href="{{ route('a.peserta', [
                    'object' => 'peserta',
                ]) }}"
                    class="header__item">peserta</a>
                <a class="header__item" href="{{ route('a.souvenir') }}">Souvenir</a>
                <a class="header__item" href="{{ route('a.absensi') }}">absensi</a>
                <a href="{{ route('a.logout') }}" class="header__item">LogOut</a>
            </div>
        @endif
    @endif

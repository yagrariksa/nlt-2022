@extends('template.general')

@section('title', 'nyoba ajasi')
@section('seo-desc', 'nyoba ajasi')
@section('seo-img', 'nyoba ajasi')

@section('overflow')
@section('addclass')

@section('content')
    {{-- <img src="{{ url('assets/img/favicon.png') }}" alt=""> --}}
    <h1>heading 1</h1>
    <h2>heading 2</h2>
    <h3>heading 3</h3>
    <h4>heading 4</h4>
    <h5>heading 5</h5>
    <h6>heading 6</h6>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quasi ab voluptas quod esse nihil omnis, praesentium
        exercitationem impedit, id quidem tenetur minima est a maiores commodi fuga consectetur? Odio id excepturi optio
        facilis, nam omnis animi perferendis qui ad exercitationem perspiciatis officiis expedita molestias officia tempore
        recusandae incidunt enim mollitia dolorem pariatur esse debitis laborum fugit? Sit est corporis dolor vitae velit
        blanditiis? Nesciunt, quae aliquam. Laborum pariatur eum voluptatibus veritatis, deserunt repellendus maiores.
        Doloribus, iste odit! Sed, error reprehenderit animi at amet accusamus corporis placeat obcaecati atque, quod, ipsam
        ab natus explicabo veniam blanditiis debitis esse laborum magnam.</p>
    <a>Ini link!</a>
    <a href="">ini link beneran/?</a>
    <br><br>
    <hr>

    <div class="form-group form-group--select">
        <select>
            <option value="Value 1">--- Pilih opsi ---</option>
            <option value="Value 1">Value 1</option>
            <option value="Value 2">Value 2</option>
            <option value="Value 3">Value 3</option>
            <option value="Value 4">Value 4</option>
            <option value="Value 5">Value 5</option>
            <option value="Value 6">Value 6</option>
            <option value="Value 7">Value 7</option>
            <option value="Value 8">Value 8</option>
            <option value="Value 9">Value 9</option>
            <option value="Value 10">Value 10</option>
            <option value="Value 11">Value 11</option>
            <option value="Value 12">Value 12</option>
            <option value="Value 13">Value 13</option>
            <option value="Value 14">Value 14</option>
            <option value="Value 15">Value 15</option>
        </select>
        <label for="select" class="form-group__control-label">Selectbox</label>
        <i class="form-group__bar"></i>
    </div>
    <div class="form-group">
        <input type="text" required />
        <label for="input" class="form-group__control-label">text</label>
        <i class="form-group__bar"></i>
    </div>
    <x-form.input-text label="ini labelnya" />

    <div class="form-group has-error">
        <input type="password" required value="password" />
        <label for="input" class="form-group__control-label">password</label>
        <i class="form-group__bar"></i>
        <h6 class="form-help">Password harus melebihi 8 karakter</h6>
    </div>
    <div class="form-group">
        <div class="form-group__input-file">
            <span for="upload-1" class="form-group__filename"></span>
            <div class="button btn-primary">
                <span class="lg">PILIH GAMBAR</span>
                <span class="sm">@include('components.img')</span>
            </div>
        </div>
        <input type="file" required id="upload-1" />
        <label for="input" class="form-group__control-label">file</label>
        <i class="form-group__bar"></i>
    </div>
    <div class="form-group">
        <input type="date" />
        <label for="input" class="form-group__control-label">date</label>
        <i class="form-group__bar"></i>
    </div>
    <div class="form-group">
        <input type="time" />
        <label for="input" class="form-group__control-label">time</label>
        <i class="form-group__bar"></i>
    </div>
    <div class="form-group">
        <input type="datetime-local" />
        <label for="input" class="form-group__control-label">datetime-local</label>
        <i class="form-group__bar"></i>
    </div>
    <div class="form-group">
        <textarea rows="3" required></textarea>
        <label for="textarea" class="form-group__control-label">Textarea</label>
        <i class="form-group__bar"></i>
    </div>
    <div class="checkbox has-error">
        <label>
            <input type="checkbox" checked />
            <i class="checkbox__helper"></i>
            I'm the label from a checkbox
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" />
            <i class="checkbox__helper"></i>
            I'm the label from a checkbox
        </label>
    </div>
    <div class="form-radio">
        <div class="radio">
            <label>
                <input type="radio" name="radio" checked />
                <i class="radio__helper"></i>
                I'm the label from a radio button
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="radio" />
                <i class="radio__helper"></i>
                I'm the label from a radio button
            </label>
        </div>
    </div>

    <h6><br> NOTES: <br>1. error -> has-error <br> 2. smalltext -> form-help <br><br></h6>

    <button class="btn-primary">tombol primary</button>
    <button class="btn-secondary">tombol second</button>

    {{-- <img src="{{ url('assets/img/ic/instagram.svg') }}" class="btn-img"> --}}
    <a class="btn-img" href="#">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M15.9957 10.6644C13.0578 10.6644 10.6602 13.062 10.6602 16C10.6602 18.938 13.0578 21.3356 15.9957 21.3356C18.9336 21.3356 21.3312 18.938 21.3312 16C21.3312 13.062 18.9336 10.6644 15.9957 10.6644ZM31.9982 16C31.9982 13.7905 32.0182 11.601 31.8941 9.39554C31.7701 6.83381 31.1857 4.56027 29.3125 2.68701C27.4352 0.809737 25.1657 0.229345 22.604 0.105261C20.3946 -0.018823 18.2052 0.00119058 15.9997 0.00119058C13.7902 0.00119058 11.6008 -0.018823 9.39536 0.105261C6.83368 0.229345 4.56019 0.813739 2.68696 2.68701C0.809722 4.56427 0.22934 6.83381 0.105259 9.39554C-0.0188226 11.605 0.00119056 13.7945 0.00119056 16C0.00119056 18.2055 -0.0188226 20.399 0.105259 22.6045C0.22934 25.1662 0.813724 27.4397 2.68696 29.313C4.56419 31.1903 6.83368 31.7707 9.39536 31.8947C11.6048 32.0188 13.7943 31.9988 15.9997 31.9988C18.2092 31.9988 20.3986 32.0188 22.604 31.8947C25.1657 31.7707 27.4392 31.1863 29.3125 29.313C31.1897 27.4357 31.7701 25.1662 31.8941 22.6045C32.0222 20.399 31.9982 18.2095 31.9982 16ZM15.9957 24.2095C11.4527 24.2095 7.78631 20.5431 7.78631 16C7.78631 11.4569 11.4527 7.79045 15.9957 7.79045C20.5387 7.79045 24.2051 11.4569 24.2051 16C24.2051 20.5431 20.5387 24.2095 15.9957 24.2095ZM24.5413 9.37152C23.4806 9.37152 22.6241 8.51494 22.6241 7.45423C22.6241 6.39351 23.4806 5.53693 24.5413 5.53693C25.602 5.53693 26.4586 6.39351 26.4586 7.45423C26.4589 7.7061 26.4095 7.95556 26.3133 8.18832C26.217 8.42108 26.0758 8.63256 25.8977 8.81066C25.7196 8.98876 25.5082 9.12998 25.2754 9.22622C25.0426 9.32246 24.7932 9.37184 24.5413 9.37152Z"
                fill="#001219" />
        </svg>
    </a>
    <a class="btn-img" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="32" viewBox="0 0 28 32" fill="none">
            <path
                d="M14.7074 0.0270014C16.4649 0 18.2124 0.0160009 19.9578 0C20.0635 2.04111 20.8028 4.12022 22.3075 5.5633C23.8092 7.04238 25.9333 7.71941 28 7.94842V13.3177C26.0632 13.2547 24.1174 12.8547 22.3599 12.0266C21.5944 11.6826 20.8814 11.2396 20.1834 10.7866C20.1743 14.6828 20.1995 18.574 20.1582 22.4542C20.0535 24.3183 19.4341 26.1734 18.3423 27.7095C16.5858 30.2666 13.5371 31.9337 10.4058 31.9857C8.48517 32.0947 6.56652 31.5747 4.92987 30.6166C2.21758 29.0285 0.308999 26.1214 0.0310217 23.0012C-0.00399257 22.3404 -0.00936948 21.6784 0.014907 21.0171C0.256627 18.48 1.52062 16.0529 3.48258 14.4018C5.7064 12.4787 8.82156 11.5626 11.7383 12.1046C11.7655 14.0798 11.6859 16.0529 11.6859 18.028C10.3535 17.5999 8.79638 17.7199 7.6321 18.523C6.78028 19.0802 6.13656 19.9 5.80006 20.8561C5.52209 21.5322 5.60165 22.2832 5.61777 23.0012C5.93704 25.1893 8.05611 27.0284 10.3182 26.8294C11.8179 26.8134 13.2551 25.9494 14.0367 24.6843C14.2895 24.2413 14.5725 23.7883 14.5876 23.2672C14.7195 20.8821 14.6671 18.507 14.6833 16.1219C14.6943 10.7466 14.6671 5.38629 14.7084 0.0280015L14.7074 0.0270014Z"
                fill="#001219" />
        </svg>
    </a>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection

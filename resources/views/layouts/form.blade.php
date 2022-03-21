@csrf
{{-- Input Email --}}
<div class="mb-3 row">
    <label for="email" class="col-md-3 col-form-label text-md-end">Emai *</label>
    <div class="col-md-6">
        <input type="email" id="email" class="form-control" name="email" value="{{old('email') ?? $user->email ?? '' }}" autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Input Password --}}

@if ($tombol == 'Daftar')
<div class="mb-3 row">
    <label for="password" class="col-md-3 col-form-label text-md-end">Passwprd *</label>
    <div class="col-md-6">
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" autofocus>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Pengulangan password --}}
<div class="mb-3 row">
    <label for="password-confirm" class="col-md-3 col-form-label text-md-end">Password baru *</label>
    <div class="col-md-6">
        <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password" autofocus>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</div>
@endif

{{-- Input nama --}}
<div class="mb-3 row">
    <label for="name" class="col-md-3 col-form-label text-md-end">Nama *</label>
    <div class="col-md-6">
        <input type="tex" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $user->name ?? '' }}" autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Input date --}}
<div class="mb-3 row">
    <label for="tgl" class="col-md-3 col-form-label text-md-end">Tanggal lahir *</label>
    <div class="col-md-6">
        <div class="row g-2">
            {{-- Tanggal --}}
            <div class="col-3">
                <input type="number" id="tgl" class="form-control @error('ygl') is-invalid @enderror" name="tgl" value="{{old('tgl') ?? $user->tgl ?? '' }}" placeholder="dd" autofocus>
                @error('tgl')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Bulan --}}
            <div class="col-5">
                @php
                    $namaBulan = [
                        "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "July",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember",
                    ]
                @endphp
                <select name="bln" id="bln" class="form-select col-md-4 d-inline @error('tgl') is-invalid @enderror" style="vertical-align: baseline;">
                    @for ($i = 0; $i < 12; $i++)
                        @if ($i+1 == (old('bln') ?? $user->bulan ?? ''))
                        <option value="{{$i+1}}" selected="{{$namaBulan[$i]}}"></option>
                        @else
                        <option value="{{$i+1}}">{{$namaBulan[$i]}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="col-4">
                <input type="number" id="thn" class="form-control @error('tgl') is-invalid @enderror" name="thn" value="{{old('thn') ?? $user->thn ?? '' }}" placeholder="yyyy" autofocus>
                @error('tgl')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

{{-- Input Perkerjaan --}}
<div class="mb-3 row">
    <label for="pekerjaan" class="col-md-3 col-form-label text-md-end">Pekerjaan *</label>
    <div class="col-md-6">
        <input type="tex" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{old('pekerjaan') ?? $user->pekerjaan ?? '' }}" autocomplete="pekerjaan" autofocus>
        @error('pekerjaan')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Input Kota --}}
<div class="mb-3 row">
    <label for="kota" class="col-md-3 col-form-label text-md-end">Kota *</label>
    <div class="col-md-6">
        <input type="tex" id="kota" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{old('kota') ?? $user->kota ?? '' }}" autocomplete="kota" autofocus>
        @error('kota')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Input Bio Profile --}}
<div class="mb-3 row">
    <label for="bio_profile" class="col-md-3 col-form-label text-md-end">Bio_Profile *</label>
    <div class="col-md-6">
        <textarea name="bio_profile" class='form-control' id="bio_profile" placeholder="Bio Singkat Anda">{{old('bio_profile') ?? $user->bio_profile ?? ''}}</textarea>
        @error('bio_profile')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Input Gambar Profile --}}
<div class="mb-3 row">
    <label for="gambar_profil" class="col-md-3 col-form-label text-md-end">
    Gambar Profil</label>
    <div class="col-md-6">
        <img id="display_gambar_profil" class="img-thumbnail w-25 mb-2"
        @if ($tombol == 'Daftar')
        src="{{ asset('img/default_profile.jpg') }}"
        @elseif ($tombol == 'Update')
        src="{{ asset('storage/uploads/'.$user->gambar_profile) }}"
        @endif
        >
        <input type="file" id="gambar_profil" name="gambar_profile" accept="image/*"
        class="form-control @error('gambar_profil') is-invalid @enderror">

        @error('gambar_profil')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

{{-- Input Background-Profile --}}
<div class="mb-3 row">
    <label for="background_profil" class="col-md-3 col-form-label text-md-end">
    Background Profil</label>
    <div class="col-md-6">
        <select name="background_profile" class="form-select col-md-5
            @error('background_profil') is-invalid @enderror" id="background_profil" >
            @for ($i = 1; $i <= 12; $i++)
            @if($i == (old('background_profil') ?? $user->background_profil ?? ''))
            <option value="{{ $i }}" selected >{{ 'Gambar '.$i }}</option>
            @else
            <option value="{{ $i }}">{{ 'Gambar '.$i }}</option>
            @endif
            @endfor
        </select>

        @error('background_profil')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="my-2 row row-cols-3 g-1">
            @for ($i = 1; $i <= 12; $i++)
            <div class="pilihan-background-profil">
                <div class='overlay'>{{ $i }}</div>
                <img class="col img-thumbnail" src="{{asset('img/gambar'.$i.'.jpg')}}"
                >
            </div>
            @endfor
        </div>

    </div>
</div>

{{-- Submit --}}
<div class="mb-3 row mb-0">
    <div class="col-md-6 offset-md-3">
        <button type="submit"class="btn btn-primary px-4">{{$tombol}}</button>
    </div>
</div>



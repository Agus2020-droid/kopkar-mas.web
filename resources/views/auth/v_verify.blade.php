@extends('layouts.app_verify')
@section('title','Verifikasi Email')
@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-md-8">
            <div class="card" style="box-shadow: 5px 6px 5px #aaaaaa;">
                <div class="card-header" >{{ __('SELAMAT DATANG ') }} {{auth()->user()->name}}</div>

                <div class="card-body" style="border: 1px solid blue; margin: 2%">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <label for="">Verifikasi Email</label><br>
                    {{ __('Untuk melanjutkan, mohon cek email Anda untuk link verifikasi.') }}
                    {{ __('Jika belum terima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><u> {{ __('Klik disini') }}</u></button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                        {{ __('auth.verify_link') }}
                        </div>
                    @endif

                    {{ __('auth.check_link') }}
                    {{ __('auth.email_not_receive') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.resend') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

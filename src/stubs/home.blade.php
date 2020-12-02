@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-marginless">
        <div class="column is-8">
            <div class="card">
                <div class="card-header"><p class="card-header-title">{{ __('Dashboard') }}</p></div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

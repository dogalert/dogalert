@extends('layouts.app')

@section('content')

<div class="container">

    @isset($success)
    <div class="row justify-content-center">
        <div class="col-md-6 offset-md-1">
            <div class="alert alert-success alert-dismissible fade show p-4" role="alert">
                <h4 style="color:darkgreen;">These monitors were created</h4>
                @foreach($success as $name => $status)
                    <div class="col-sm">{{ $name }}<span class="float-right"><span class="fas fa-check"></span></div>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endisset

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center">Add your Datadog monitors here</h2>
        </div>
        <div class="col-md-12 mt-4">
            <form method="POST" action="/">
                @csrf

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <p>You can create Datadog API and Application keys under <a href="https://app.datadoghq.com/account/settings#api" target="_">Integrations -> APIs</a>.</p><p>We never save any information submitted on this site, but for your safety, <span style="font-weight:bold;color:yellow;">please revoke any Datadog API and Application keys used on this site</span>.
                    </div>
                </div>
                <div class="form-group row">
                    <label for="api_key" class="col-md-4 col-form-label text-md-right">{{ __('Datadog API Key') }}</label>

                    <div class="col-md-6">
                        <input id="api_key" type="api_key" class="form-control @error('api_key') is-invalid @enderror" name="api_key" value="{{ old('api_key') }}" required autocomplete="api_key" autofocus>

                        @error('api_key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="app_key" class="col-md-4 col-form-label text-md-right">{{ __('Datadog Application Key') }}</label>

                    <div class="col-md-6">
                        <input id="app_key" type="app_key" class="form-control @error('app_key') is-invalid @enderror" name="app_key" required autocomplete="current-app_key">

                        @error('app_key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="app_key" class="col-md-4 col-form-label text-md-right">{{ __('Choose your monitors') }}</label>
                    <div class="col-md-6">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Free" data-off="Premium" data-onstyle="warning" data-offstyle="success" disabled><a href="#" onclick="$('#customize').removeClass('d-none')" class="customize align-bottom">customize</a>
                    </div>
                </div>

                <div id="customize" class="form-group row d-none">
                    <label for="app_key" class="col-md-4 col-form-label text-md-right">{{ __('Customize your monitors') }}</label>
                    <div class="col-md-6 mt-2">
                        <dogalert></dogalert>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add monitors!') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

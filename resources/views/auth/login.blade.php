@extends('layouts.app')

@section('content')

<div class="row h-75 d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Entrar
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- ./card-body -->
        </div><!-- ./card -->
    </div><!-- ./col-12 -->
</div><!-- ./row -->
@endsection

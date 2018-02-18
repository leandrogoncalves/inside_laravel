@extends('layouts.app', [
    'menu' => 'performance'
])

@section('content')

<div id="page-title" class="d-flex mb-4">
    <h2 class="display-4">{{ ('Performance' . (isset(Auth::user()->perfil)? ' - ' . ucfirst(Auth::user()->perfil): '')) }}</h2>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card bg-light mb-3">
            <div class="card-header">Performance</div>
            <div class="card-body">
                <p>{{ $data }}</p>
            </div>
        </div>
    </div>
</div>


@endsection

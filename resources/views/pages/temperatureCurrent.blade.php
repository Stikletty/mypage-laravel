@extends('adminlte::page')

@section('title', 'Stikysoft')

@section('content_header')
    <h1 class="m-0 text-dark">Jelenlegi hőmérséklet adatok</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h2 class="card-title">Tatabánya jelenlegi időjárási adatai:</h2><br />
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            @foreach ($weather as $key => $item)
                                @if (is_array($item))
                                    <li class="list-group-item">{{ $key }} => {{ json_encode($item) }}</li>
                                @else
                                    <li class="list-group-item">{{ $key }} => {{ $item }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>
        </div>
    </div>
@stop

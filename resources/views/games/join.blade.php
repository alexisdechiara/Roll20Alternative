@extends('layouts.app')

@section('title', config('app.name'). " | ". __('join.join_game'))

@section('scripts')
    <script src="{{ asset('/js/join.js') }}" defer></script>
@endsection

@section('content')
    <h1 class="display-4 text-center">{{__('join.join_game')}}</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="subtitle-medium">{{__('join.enter_code')}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col d-md-flex justify-content-md-center align-items-md-center">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">game/<br></span></div>
                    <input class="form-control" type="text" required inputmode="numeric" placeholder="{{__('join.code')}}" id="gameID">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="window.open('{{ route('game', ['slug' => ' ']) }}'.replaceAll('%20', '') + document.getElementById('gameID').value);" type="button">{{__('join.join')}}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h4 class="subtitle-medium">{{__('join.choose_game')}}</h4>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            @forelse($parties as $p)
                    <div class="card m-3 card card-join pb-0" id="party_{{ $p['id'] }}">
                        <div class="row no-gutters">
                            <div class="col-md-4 card-image"
                                @if($p['cover_picture'] === NULL) style="background-image:url({{asset("/img/Roll20Logo-named.png")}});background-size: contain !important;"
                                @else style="background-image:url({{ $p['cover_picture'] }});"
                                @endif>
                            </div>
                            <div class="col">
                                <div class="card-body p-3">
                                    <h4 class="card-title font-weight-bold">{{ $p['name'] }} <small class="badge badge-light">#{{ $p['slug'] }}</small></h4>
                                    <p class=" card-description card-text overflow-auto text-secondary text-justify">{{ $p['description'] }}</p>
                                    <div class="row mt-3 mb-0">
                                        <div class="col align-items-center ">
                                            <div>
                                                @if($p['themes'] !== 'null')
                                                    @foreach(json_decode($p['themes']) as $t)
                                                        <span class="card-themes badge badge-secondary">{{ $t }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <p class="card-players "><small>{{ $p['players'] }} {{__('join.players')}}</small>
                                            <p class="card-created "><small>{{ ucfirst($p['created_at']->diffForHumans()) . '.' }}</small></p>
                                        </div>
                                        <div class="col-auto align-self-end">
                                            <a href="{{ route('game', ['slug' => $p['slug']]) }}" class="btn btn-primary btn-sm">{{__('join.join')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            @empty
                <div class="alert alert-primary col-12" role="alert">{{__('join.no_game_available')}}</div>
            @endforelse
        </div>
    </div>
@stop

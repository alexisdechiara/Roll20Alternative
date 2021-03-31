@extends('layouts.app')

@section('title', config('app.name'). " | ". __('create.create_game'))

@section('scripts')
    <script src="{{ asset('/js/create.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">

        <h1 class="display-4 text-center">{{__('create.create_game')}}</h1>


        <form method="POST" action="{{ route('createParty') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="name">{{__('create.game_name')}} <i>*</i></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-auto">
                    <label for="players">{{__('create.nb_players')}} <i>*</i></label>
                    <input type="number" class="form-control @error('players') is-invalid @enderror" id="players" name="players" value="4" max="9999" min="1">
                    @error('players')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="description">{{__('create.description')}} <i>*</i></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required minlength="15">{{ old('description') }}</textarea>
                @error('description')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <h4 class="subtitle-small">{{__('create.optional')}}</h4>

            <div class="form-row">
                <div class="form-group col">
                    <label for="password">{{__('create.password')}}</label>
                    <input type="password" class="form-control" id="password" name="password" onmo onmouseover="this.type='text'" onmouseout="this.type='password'">
                </div>
                <div class="form-group col">
                    <label for="cover_picture">{{__('create.cover_picture')}} <span class="badge badge-primary badge-pill">URL</span></label>
                    <input type="text" class="form-control" id="cover_picture" name="cover_picture">
                </div>
            </div>
            <div class="form-group">
                <label for="themes">{{__('create.theme')}}</label>
                <select class="custom-select" id="themes" name="themes[]" multiple>
                    <option value="generic">{{__('create.standard')}}</option>
                    <option value="contemporary">{{__('create.contemporary')}}</option>
                    <option value="steampunk">{{__('create.steampunk')}}</option>
                    <option value="cyberpunk">{{__('create.cyberpunk')}}</option>
                    <option value="history">{{__('create.historical')}}</option>
                    <option value="medieval">{{__('create.medieval')}}</option>
                    <option value="dreamlike">{{__('create.wonderful')}}</option>
                    <option value="manga">{{__('create.eastern')}}</option>
                    <option value="postApocalyptic">{{__('create.post_apo')}}</option>
                    <option value="fantasy">{{__('create.fantastic')}}</option>
                    <option value="siFi">{{__('create.sci_fi')}}</option>
                    <option value="spaceOpera">{{__('create.space_opera')}}</option>
                    <option value="superHero">{{__('create.super_heroes')}}</option>
                    <option value="multiverse">{{__('create.multiverse')}}</option>
                    <option value="timeSpace">{{__('create.time_travel')}}</option>
                </select>
            </div>

            <!--div class="form-group">
                <label for="gameImage">Image de la partie</label>
                <input type="file" class="form-control-file" id="gameImage">
            </div-->

            <button class="btn btn-primary btn-block button-end" type="submit">{{__('create.start')}}</button>
        </form>
    </div>

@stop

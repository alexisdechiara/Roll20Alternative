@extends('layouts.app')

@section('title', config('app.name'). " | ".__('characters.title.edit'))

@section('scripts')
    <script src="{{ asset('/js/character_edit.js') }}" defer></script>
@endsection

@section('content')
    <div class="container text-center mb-3">
        <h1 class="display-4 text-center">{{__('characters.title.id')}} <span class="badge badge-secondary">{{$character['name']}}</span></h1>
        <div class="btn-group m-3" role="group">
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('createCharacter')}}'">{{__('characters.create')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('listCharacter')}}'">{{__('characters.list')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('helpCharacter')}}'">{{__('characters.help')}}</button>
        </div>
    </div>
    <form method="post" action="{{route('editCharacter')}}">
        @csrf
        <input name="id" type="hidden" value="{{$character['id']}}">
        <div class="container">
            <h2 class="text-left subtitle-small">{{__('characters.identity')}}</h2>
            <div class="form-row justify-content-between">
                <div class="col" style="min-width: 25em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.name')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex require @error('name') is-invalid @enderror" type="text" name="name" value="{{$character['name']}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.race')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="race" value="{{$character['race']}}">
                    </div>
                    @error('race')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.class')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="class" value="{{$character['class']}}">
                    </div>
                    @error('class')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="max-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span
                                class="d-inline-flex input-group-text">{{__('characters.field.level')}}</span></div>
                        <input class="form-control d-inline-flex" type="number" name="level" value="{{$character['level']}}">
                    </div>
                    @error('level')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-between">
                <div class="col-auto" style="width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.birthday.date')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="birthday" value="{{$character['DOB']}}">
                    </div>
                    @error('DOB')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.birthday.localisation')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="birthplace" value="{{$character['birth_location']}}">
                    </div>
                    @error('birth_location')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend"><span
                                class="input-group-text">{{__('characters.field.localisation')}}</span></div>
                        <input class="form-control" type="text" name="location" value="{{$character['current_location']}}">
                    </div>
                    @error('current_location')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-between">
                <div class="col" style="min-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.belief')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="religion" value="{{$character['cult']}}">
                    </div>
                    @error('cult')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="max-width: 15em;min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span
                                class="d-inline-flex input-group-text">{{__('characters.field.gender')}}</span></div>
                        <input class="form-control d-inline-flex" type="text" name="gender" value="{{$character['gender']}}">
                    </div>
                    @error('gender')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 10em;max-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.weight')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="number" name="weight" value="{{$character['weight']}}">
                        <div class="input-group-append d-inline-flex"><span
                                class="d-inline-flex input-group-text">Kg<br></span></div>
                    </div>
                    @error('weight')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="max-width: 15em;min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span
                                class="d-inline-flex input-group-text">{{__('characters.field.height')}}</span></div>
                        <input class="form-control d-inline-flex" type="number" name="size" value="{{$character['height']}}">
                        <div class="input-group-append d-inline-flex">
                            <span class="d-inline-flex input-group-text">cm</span></div>
                    </div>
                    @error('height')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-between">
                <div class="col" style="min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.iriscolor')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="eye_color" value="{{$character['eye_color']}}">
                    </div>
                    @error('eye_color')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span
                                class="d-inline-flex input-group-text">{{__('characters.field.haircolor')}}</span></div>
                        <input class="form-control d-inline-flex" type="text" name="hair_color" value="{{$character['hair_color']}}">
                    </div>
                    @error('hair_color')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend"><span
                                class="input-group-text">{{__('characters.field.skincolor')}}</span></div>
                        <input class="form-control" type="text" name="skin_color" value="{{$character['skin_color']}}">
                    </div>
                    @error('skin_color')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 25em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend"><span
                                class="input-group-text">{{__('characters.field.image')}} <span class=" ml-1 badge badge-primary badge-pill">URL</span></span></div>
                        <input class="form-control" type="text" name="image" value="{{$character['image']}}">
                    </div>
                    @error('skin_color')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <textarea class="form-control" style="margin-top: 1em;" placeholder="{{__('characters.descplaceholder')}}" rows="5" name="description">{{$character['description']}}</textarea>
            @error('description')
            <div class="alert alert-danger mt-1">{{$message}}</div>
            @enderror
        </div>
        <div class="container mt-3 mb-3">
            <div class="form-row justify-content-between m-0">
                <div class="col-auto p-0">
                    <div class="card d-flex m-0 h-100">
                        <div class="card-body pl-5 pr-5 h-100" style="min-width: 20em;">
                            <h2 class="text-nowrap text-center card-title"
                                style="min-width: 250px;">{{__('characters.stats')}}</h2>
                            <div class="form-row no-gutters d-flex justify-content-between align-items-center justify-content-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.strength')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="strength_range" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['strength']}}></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="strength_text" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['strength']}}></div>
                            </div>
                            @error('strength')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-between align-items-center justify-content-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.dexterity')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="dexterity_range" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['dexterity']}}></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="dexterity_text" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['dexterity']}}></div>
                            </div>
                            @error('dexterity')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-between align-items-center justify-content-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.constitution')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="constitution_range" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['constitution']}}></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="constitution_text" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['constitution']}}></div>
                            </div>
                            @error('constitution')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-between align-items-center justify-content-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.intelligence')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="intelligence_range" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['intelligence']}}></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="intelligence_text" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['intelligence']}}></div>
                            </div>
                            @error('intelligence')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-between align-items-center justify-content-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.wisdom')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['wisdom']}}></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 name="wisdom_text" inputmode="numeric" style="max-width: 3em;min-width: 2em;" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['wisdom']}}></div>
                            </div>
                            @error('wisdom')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-between align-items-center justify-content-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.charisma')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="charisma_range" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['charisma']}}></div>
                                <div class="col-auto d-flex justify-content-center"><input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="charisma_text" value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['charisma']}}></div>
                            </div>
                            @error('charisma')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-auto p-0">
                    <div class="card d-flex w-100 h-100">
                        <div class="card-body m-auto">
                            <h2 class="text-nowrap text-center card-title">{{__('characters.other')}}</h2>
                            <div class="form-row justify-content-between">
                                <div class="col">
                                    <div class="form-row d-flex justify-content-between align-items-center">
                                        <div class="col-4 d-flex justify-content-center">
                                            <h4 class="text-nowrap mb-2">{{__('characters.hp.max')}}</h4>
                                        </div>
                                        <div class="col-auto d-flex justify-content-center" style="padding: 0;">
                                            <input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="maxLife_range"
                                                   value={{$character['max_health_point']}}></div>
                                        <div class="col-auto d-flex justify-content-center">
                                            <input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="maxLife_text"
                                                   value={{$character['max_health_point']}}></div>
                                    </div>
                                    @error('max_health_point')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                    <div class="form-row d-flex justify-content-between align-items-center justify-content-center">
                                        <div class="col-4 d-flex justify-content-center">
                                            <h4 class="text-nowrap mb-2">{{__('characters.hp.current')}}</h4>
                                        </div>
                                        <div class="col-auto d-flex justify-content-center" style="padding: 0;">
                                            <input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="currentLife_range"
                                                   value={{$character['health_point']}}></div>
                                        <div class="col-auto d-flex justify-content-center">
                                            <input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="currentLife_text"
                                                   value={{$character['health_point']}}></div>
                                    </div>
                                    @error('health_point')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                    <div class="form-row d-flex justify-content-between align-items-center justify-content-center">
                                        <div class="col-4 d-flex justify-content-center">
                                            <h4 class="text-nowrap mb-2">{{__('characters.speed')}}</h4>
                                        </div>
                                        <div class="col-auto d-flex justify-content-center" style="padding: 0;">
                                            <input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="speed_range"
                                                   value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['speed']}}></div>
                                        <div class="col-auto d-flex justify-content-center">
                                            <input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="speed_text"
                                                   value={{\App\Models\Characteristics::where('id', $character['characteristic_id'])->first()['speed']}}></div>
                                    </div>
                                    @error('speed')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col ml-3">
                                    <div class="form-row d-flex justify-content-between align-items-center">
                                        <div class="col-4 d-flex justify-content-center">
                                            <h4 class="text-nowrap mb-2">{{__('characters.resistance')}}</h4>
                                        </div>
                                        <div class="col d-flex justify-content-start">
                                            <input class="form-control" type="text" style="width: 100%;" name="resistance" value="{{$character['resistance']}}">
                                        </div>
                                    </div>
                                    @error('resistance')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                    <div class="form-row d-flex justify-content-between align-items-center justify-content-start">
                                        <div class="col">
                                            <div class="form-row d-flex justify-content-start">
                                                <div class="col-4 d-flex justify-content-center">
                                                    <h4 class="text-nowrap mb-2">{{__('characters.sight')}}</h4>
                                                </div>
                                                <div class="col-auto d-flex align-items-center">
                                                    <div class="form-check">
                                                        @if($character['day_vision'])
                                                            <input class="form-check-input" type="checkbox" checked id="formCheck-2" name="dayvision">
                                                        @else
                                                            <input class="form-check-input" type="checkbox" id="formCheck-2" name="dayvision">
                                                        @endif
                                                        <label class="form-check-label text-nowrap d-flex" for="formCheck-1">{{__('characters.sight.type.day')}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-auto d-flex align-items-center">
                                                    <div class="form-check">
                                                        @if($character['night_vision'])
                                                            <input class="form-check-input" type="checkbox" checked id="formCheck-2" name="nightvision">
                                                        @else
                                                            <input class="form-check-input" type="checkbox" id="formCheck-2" name="nightvision">
                                                        @endif
                                                        <label class="form-check-label text-nowrap" for="formCheck-1">{{__('characters.sight.type.night')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('day_vision')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                    @error('night_vision')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <textarea class="form-control" style="width: 100%;margin-top: 1em;" placeholder="{{__('characters.common.note')}}" name="otherDescription" rows="3">{{$character['desc_other']}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card d-flex mt-3">
                <div class="card-body m-0">
                    <h2 class="text-nowrap text-center card-title">{{__('characters.combat')}}</h2>
                    <div class="form-row">
                        <div class="col">
                            <h4 class="text-nowrap text-center text-secondary">{{__('characters.attack')}}</h4>
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.attack.type.melee')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center" style="padding: 0;"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="h2hAttack_range" value={{$character['melee_attack']}}></div>
                                <div class="col d-flex justify-content-center"><input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="h2hAttack_text" value={{$character['melee_attack']}}></div>
                            </div>
                            @error('melee_attack')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.attack.type.ranged')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center" style="padding: 0;"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="distanceAttack_range" value={{$character['dist_attack']}}></div>
                                <div class="col d-flex justify-content-center"><input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="distanceAttack_text" value={{$character['dist_attack']}}></div>
                            </div>
                            @error('dist_attack')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-between align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.attack.type.spells')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center" style="padding: 0;"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="magicAttack_range" value={{$character['magic_attack']}}></div>
                                <div class="col d-flex justify-content-center"><input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="magicAttack_text" value={{$character['magic_attack']}}></div>
                            </div>
                            @error('magic_attack')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <textarea class="form-control" style="width: 100%;margin-top: 1em;" placeholder="{{__('characters.common.note')}}" name="attackDescription">{{$character['desc_attack']}}</textarea>
                            @error('desc_attack')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <hr style="width: 3px;background: var(--secondary);height: 100%;border-radius: 25px;margin: 0;">
                        </div>
                        <div class="col">
                            <h4 class="text-nowrap text-center text-secondary">{{__('characters.defense')}}</h4>
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.defense.type.melee')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center" style="padding: 0;"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="h2hDefense_range" value={{$character['melee_defense']}}></div>
                                <div class="col d-flex justify-content-center"><input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="h2hDefense_text" value={{$character['melee_defense']}}></div>
                            </div>
                            @error('melee_defense')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.defense.type.ranged')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center" style="padding: 0;"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="distanceDefense_range" value={{$character['dist_defense']}}></div>
                                <div class="col d-flex justify-content-center"><input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="distanceDefense_text" value={{$character['dist_defense']}}></div>
                            </div>
                            @error('dist_defense')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.defense.type.spells')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center" style="padding: 0;"><input class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="magicDefense_range" value={{$character['magic_defense']}}></div>
                                <div class="col d-flex justify-content-center"><input class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="magicDefense_text" value={{$character['magic_defense']}}></div>
                            </div>
                            @error('magic_defense')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <textarea class="form-control w-100 mt-1" style="width: 100%;margin-top: 1em;" placeholder="{{__('characters.common.note')}}" name="defenseDescription">{{$character['desc_defense']}}</textarea>
                            @error('desc_defense')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <h2 class="text-left">{{__('characters.abilities')}}</h2>
                @forelse($skills as $s)
                <input name="skill[id][]" type="hidden" value="{{$s['id']}}">
                <div class="form-row row-cols-3 justify-content-between align-items-center">
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.ability.name')}}<br></span>
                            </div>
                            <input class="form-control d-inline-flex" type="text" name="skill[name][]" value="{{$s['name']}}">
                        </div>
                        @error('skill[name][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex">
                                <span class="d-inline-flex input-group-text">{{__('characters.ability.damage')}}</span>
                            </div>
                            <input class="form-control d-inline-flex" type="number" name="skill[damage][]" value="{{$s['value']}}">
                        </div>
                        @error('skill[damage][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{__('characters.common.desc')}}</span></div>
                            <textarea class="form-control" name="skill[desc][]" rows="1">{{$s['description']}}</textarea>
                        </div>
                        @error('skill[damage][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                @empty
                    <h3 class="alert alert-danger">{{__('characters.no_skills')}}</h3>
                @endforelse
        </div>
        <div class="container text-center">
            <h2 class="text-left">{{__('characters.weapons')}}</h2>
                @forelse($weapons as $w)
                <input name="weapon[id][]" type="hidden" value="{{$w['id']}}">
                    <div class="form-row row-cols-5 justify-content-between align-items-center">
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.weapon.name')}}<br></span>
                            </div>
                            <input class="form-control d-inline-flex" type="text" name="weapon[name][]" value="{{$w['name']}}">
                        </div>
                        @error('weapon[name][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col" style="max-width: 20em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex">
                                <span class="d-inline-flex input-group-text">{{__('characters.weapon.range')}}</span>
                            </div>
                            <input class="form-control d-inline-flex" type="number" name="weapon[range][]" value="{{$w['range']}}">
                            <div class="input-group-append"><span class="d-inline-flex input-group-text">m</span></div>
                        </div>
                        @error('weapon[range][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col" style="max-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{__('characters.weapon.damage')}}</span></div>
                            <input class="form-control" type="number" name="weapon[damage][]" value="{{$w['damage']}}">
                        </div>
                        @error('weapon[damage][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col" style="max-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{__('characters.weapon.weight')}}</span>
                            </div>
                            <input class="form-control" type="number" name="weapon[weight][]" value="{{$w['weight']}}">
                        </div>
                        @error('weapon[weight][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{__('characters.common.desc')}}</span>
                            </div>
                            <textarea class="form-control" name="weapon[desc][]" rows="1"> {{$w['description']}}</textarea>
                        </div>
                        @error('weapon[desc][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                @empty
                    <h3 class="alert alert-danger">{{__('characters.no_weapons')}}</h3>
                @endforelse
        </div>
        <div class="container text-center">
            <h2 class="text-left">{{__('characters.armors')}}</h2>
                @forelse($armors as $a)
                <input name="armor[id][]" type="hidden" value="{{$a['id']}}">
                    <div class="form-row row-cols-4 justify-content-between align-items-center">
                        <div class="col" style="min-width: 15em;">
                            <div class="input-group d-inline-flex">
                                <div class="input-group-prepend d-inline-flex">
                                    <span class="d-inline-flex input-group-text">{{__('characters.armor.name')}}<br></span>
                                </div>
                                <input class="form-control d-inline-flex" type="text" name="armor[name][]" value="{{$a['name']}}">
                            </div>
                            @error('armor[name][]')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col" style="max-width: 20em;">
                            <div class="input-group d-inline-flex">
                                <div class="input-group-prepend d-inline-flex">
                                    <span class="d-inline-flex input-group-text">{{__('characters.armor.protection')}}</span>
                                </div>
                                <input class="form-control d-inline-flex" type="number" name="armor[protection][]" value="{{$a['resistance']}}">
                            </div>
                            @error('armor[protection][]')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col" style="max-width: 20em;">
                            <div class="input-group d-inline-flex">
                                <div class="input-group-prepend d-inline-flex">
                                    <span class="d-inline-flex input-group-text">{{__('characters.armor.weight')}}</span>
                                </div>
                                <input class="form-control d-inline-flex" type="number" name="armor[weight][]" value="{{$a['weight']}}">
                            </div>
                            @error('armor[weight][]')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col" style="min-width: 15em;">
                            <div class="input-group d-inline-flex">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('characters.common.desc')}}</span>
                                </div>
                                <textarea class="form-control" name="armor[desc][]" rows="1">{{$a['description']}}</textarea>
                            </div>
                            @error('armor[desc][]')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                @empty
                    <h3 class="alert alert-danger">{{__('characters.no_armors')}}</h3>
                @endforelse
        </div>
        <div class="container text-center">
            <h2 class="text-left">{{__('characters.items')}}</h2>
                @forelse($items as $i)
                <input name="item[id][]" type="hidden" value="{{$i['id']}}">
                    <div class="form-row row-cols-3 justify-content-between align-items-center">
                        <div class="col" style="min-width: 15em;">
                            <div class="input-group d-inline-flex">
                                <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.item.name')}}<br></span>
                                </div>
                                <input class="form-control d-inline-flex" type="text" style="min-width: 10em;" name="item[name][]" value="{{$i['name']}}">
                            </div>
                            @error('item[name][]')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col" style="min-width: 15em;">
                            <div class="input-group d-inline-flex">
                                <div class="input-group-prepend d-inline-flex">
                                    <span class="d-inline-flex input-group-text">{{__('characters.item.weight')}}<br></span>
                                </div>
                                <input class="form-control d-inline-flex" type="number" style="min-width: 10em;" name="item[weight][]" value="{{$i['weight']}}">
                                @error('item[weight][]')
                                <div class="alert alert-danger mt-1">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col" style="min-width: 15em;">
                            <div class="input-group d-inline-flex">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('characters.common.desc')}}</span>
                                </div>
                                <textarea class="form-control" name="item[desc][]" rows="1">{{$i['description']}}</textarea>
                            </div>
                            @error('item[desc][]')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                @empty
                     <h3 class="alert alert-danger">{{__('characters.no_items')}}</h3>
                @endforelse
        </div>
        <div class="container d-flex justify-content-center align-items-center button-end">
            <button class="btn btn-primary btn-block" type="submit">{{__('characters.edit')}}</button>
        </div>
    </form>
@stop

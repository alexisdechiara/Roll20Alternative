@extends('layouts.app')

@section('title', config('app.name'). " | ".__('characters.title'))

@section('scripts')
    <script src="{{ asset('/js/characters.js') }}" defer></script>
@endsection

@section('content')
    <div class="container text-center mb-3">
        <h1 class="display-4 text-center">{{__('characters.title')}}</h1>
        <div class="btn-group m-3" role="group">
            <button class="btn btn-outline-primary active" type="button" onclick="window.location='{{route('createCharacter')}}'">{{__('characters.create')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('listCharacter')}}'">{{__('characters.list')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('helpCharacter')}}'">{{__('characters.help')}}</button>
        </div>
    </div>
    <form method="post" action="{{route('newCharacter')}}">
        @csrf
        <div class="container">
            <h2 class="text-left subtitle-small">{{__('characters.identity')}}</h2>
            <div class="form-row justify-content-between">
                <div class="col" style="min-width: 25em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.name')}} <i>*</i> <br></span>
                        </div>
                        <input @error('name') is-invalid @enderror class="form-control d-inline-flex require " type="text" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.race')}}<br></span>
                        </div>
                        <input @error('race') is-invalid @enderror class="form-control d-inline-flex" type="text" name="race" value="{{old('race')}}">
                    </div>
                    @error('race')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.class')}}<br></span>
                        </div>
                        <input @error('class') is-invalid @enderror class="form-control d-inline-flex" type="text" name="class" value="{{old('class')}}">
                    </div>
                    @error('class')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="max-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span
                                    class="d-inline-flex input-group-text">{{__('characters.field.level')}}</span></div>
                        <input @error('level') is-invalid @enderror class="form-control d-inline-flex" type="number" name="level" value="{{old('level')}}">
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
                        <input @error('DOB') is-invalid @enderror class="form-control d-inline-flex" type="text" name="birthday" value="{{old('birthday')}}">
                    </div>
                    @error('DOB')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.birthday.localisation')}}<br></span>
                        </div>
                        <input @error('birth_location') is-invalid @enderror class="form-control d-inline-flex" type="text" name="birthplace" value="{{old('birthplace')}}">
                    </div>
                    @error('birth_location')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{__('characters.field.localisation')}}</span></div>
                        <input @error('location') is-invalid @enderror class="form-control" type="text" name="location" value="{{old('location')}}">
                    </div>
                    @error('location')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-between">
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.belief')}}<br></span>
                        </div>
                        <input @error('cults') is-invalid @enderror class="form-control d-inline-flex" type="text" name="religion" value="{{old('religion')}}">
                    </div>
                    @error('cults')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="max-width: 20em;min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span
                                    class="d-inline-flex input-group-text">{{__('characters.field.gender')}}</span></div>
                        <input @error('gender') is-invalid @enderror class="form-control d-inline-flex" type="text" name="gender" value="{{old('gender')}}">
                    </div>
                    @error('gender')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 10em;max-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.weight')}}<br></span>
                        </div>
                        <input @error('weight') is-invalid @enderror class="form-control d-inline-flex" type="number" name="weight" value="{{old('weight')}}">
                        <div class="input-group-append d-inline-flex"><span class="d-inline-flex input-group-text">Kg<br></span></div>
                    </div>
                </div>
                @error('weight')
                <div class="alert alert-danger mt-1">{{$message}}</div>
                @enderror
                <div class="col" style="max-width: 15em;min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span
                                    class="d-inline-flex input-group-text">{{__('characters.field.height')}}</span></div>
                        <input @error('size') is-invalid @enderror class="form-control d-inline-flex" type="number" name="size" value="{{old('size')}}">
                        <div class="input-group-append d-inline-flex">
                        <span class="d-inline-flex input-group-text">cm</span></div>
                    </div>
                    @error('size')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-between">
                <div class="col" style="min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.iriscolor')}}<br></span>
                        </div>
                        <input @error('eye_color') is-invalid @enderror class="form-control d-inline-flex" type="text" name="eye_color" value="{{old('eye_color')}}">
                    </div>
                    @error('eye_color')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.field.haircolor')}}</span></div>
                        <input @error('hair_color') is-invalid @enderror class="form-control d-inline-flex" type="text" name="hair_color" value="{{old('hair_color')}}">
                    </div>
                    @error('hair_color')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 10em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend"><span class="input-group-text">{{__('characters.field.skincolor')}}</span></div>
                        <input @error('skin_color') is-invalid @enderror class="form-control" type="text" name="skin_color" value="{{old('skin_color')}}">
                    </div>
                    @error('skin_color')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col" style="min-width: 25em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend"><span
                                class="input-group-text">{{__('characters.field.image')}} <span class=" ml-1 badge badge-primary badge-pill">URL</span></span></div>
                        <input  class="form-control" type="text" name="image" value="{{old('image')}}">
                    </div>
                    @error('description')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <textarea class="form-control mt-2" placeholder="{{__('characters.descplaceholder')}}" rows="5" name="description">{{old('description')}}</textarea>
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
                                <div class="form-row no-gutters d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.strength')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('strength') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="strength_range" value="{{old('strength_range')}}"></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('strength') is-invalid @enderror class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="strength_text" value="{{old('strength_text')}}"></div>
                            </div>
                            @error('strength')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-start"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.dexterity')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('dexterity') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="dexterity_range" value="{{old('dexterity_range')}}"></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('dexterity') is-invalid @enderror class="form-control form-control-sm d-flex justify-content-center input-number" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="dexterity_text" value="{{old('dexterity_text')}}"></div>
                            </div>
                            @error('dexterity')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.constitution')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('constitution') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="constitution_range" value="{{old('constitution_range')}}"></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('constitution') is-invalid @enderror class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="constitution_text" value="{{old('constitution_text')}}"></div>
                            </div>
                            @error('constitution')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.intelligence')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('intelligence') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="intelligence_range" value="{{old('intelligence_range')}}"></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('intelligence') is-invalid @enderror class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="intelligence_text" value="{{old('intelligence_text')}}"></div>
                            </div>
                            @error('intelligence')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.wisdom')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('wisdom') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" name="wisdom_range" value="{{old('wisdom_range')}}" style="margin-right: 1em;margin-left: 1em;"></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('wisdom') is-invalid @enderror class="form-control form-control-sm d-flex justify-content-center" type="number" max=100 min=0 name="wisdom_text" value="{{old('wisdom_text')}}" inputmode="numeric" style="max-width: 3em;min-width: 2em;"></div>
                            </div>
                            @error('wisdom')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row no-gutters d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap text-uppercase d-flex justify-content-center mb-2">{{__('characters.contraction.charisma')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('charisma') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="charisma_range" value="{{old('charisma_range')}}"></div>
                                <div class="col-auto d-flex justify-content-center"><input @error('charisma') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;min-width: 2em;" name="charisma_text" value="{{old('charisma_text')}}"></div>
                            </div>
                            @error('charisma')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-auto p-0">
                    <div class="card d-flex m-0 w-100 h-100">
                        <div class="card-body m-auto">
                            <h2 class="text-nowrap text-center card-title">{{__('characters.other')}}</h2>
                            <div class="form-row justify-content-between">
                                <div class="col">
                                    <div class="form-row d-flex justify-content-between align-items-center">
                                        <div class="col-4 d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.hp.max')}}</h4></div>
                                        <div class="col-auto d-flex justify-content-center p-0"><input @error('max_health_point') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="maxLife_range" value="{{old('maxLife_range')}}"></div>
                                        <div class="col-auto d-flex justify-content-center"><input @error('max_health_point') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="maxLife_text" value="{{old('maxLife_text')}}"></div>
                                    </div>
                                    @error('max_health_point')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                    <div class="form-row d-flex justify-content-between align-items-center justify-content-center">
                                        <div class="col-4 d-flex justify-content-center">
                                            <h4 class="text-nowrap mb-2">{{__('characters.hp.current')}}</h4>
                                        </div>
                                        <div class="col-auto d-flex justify-content-center p-0">
                                            <input @error('health_point') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="currentLife_range" value="{{old('currentLife_range')}}"></div>
                                        <div class="col-auto d-flex justify-content-center">
                                            <input @error('health_point') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="currentLife_text" value="{{old('currentLife_text')}}"></div>
                                    </div>
                                    @error('health_point')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                    <div class="form-row d-flex justify-content-between align-items-center justify-content-center">
                                        <div class="col-4 d-flex justify-content-center">
                                            <h4 class="text-nowrap mb-2">{{__('characters.speed')}}</h4>
                                        </div>
                                        <div class="col-auto d-flex justify-content-center p-0">
                                            <input @error('speed') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="speed_range" value="{{old('speed_range')}}"></div>
                                        <div class="col-auto d-flex justify-content-center">
                                            <input @error('speed') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="speed_text" value="{{old('speed_text')}}"></div>
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
                                            <input @error('resistance') is-invalid @enderror class="form-control w-100" type="text" name="resistance" value="{{old('resistance')}}">
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
                                                        <input @error('day_vision') is-invalid @enderror class="form-check-input" type="checkbox" id="formCheck-1" name="dayvision" {{ old('dayvision') == 'on' ? 'checked' : '' }}>
                                                        <label class="form-check-label text-nowrap d-flex" for="formCheck-1">{{__('characters.sight.type.day')}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-auto d-flex align-items-center">
                                                    <div class="form-check">
                                                        <input @error('night_vision') is-invalid @enderror class="form-check-input" type="checkbox" id="formCheck-2" name="nightvision" {{ old('nightvision') == 'on' ? 'checked' : '' }}>
                                                        <label class="form-check-label text-nowrap" for="formCheck-2">{{__('characters.sight.type.night')}}</label>
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
                            <textarea class="form-control" style="width: 100%;margin-top: 1em;" placeholder="{{__('characters.common.note')}}" name="otherDescription" rows="3">{{old('otherDescription')}}</textarea>
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
                                <div class="col-auto d-flex justify-content-center p-0"><input @error('melee_attack') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="h2hAttack_range" value="{{old('h2hAttack_range')}}"></div>
                                <div class="col d-flex justify-content-center"><input @error('melee_attack') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="h2hAttack_text" value="{{old('h2hAttack_text')}}"></div>
                            </div>
                            @error('melee_attack')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.attack.type.ranged')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center p-0"><input @error('dist_attack') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="distanceAttack_range" value="{{old('distanceAttack_range')}}"></div>
                                <div class="col d-flex justify-content-center"><input @error('dist_attack') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="distanceAttack_text" value="{{old('distanceAttack_text')}}"></div>
                            </div>
                            @error('dist_attack')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-center align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.attack.type.spells')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center p-0"><input @error('magic_attack') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="magicAttack_range" value="{{old('magicAttack_range')}}"></div>
                                <div class="col d-flex justify-content-center"><input @error('magic_attack') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="magicAttack_text" value="{{old('magicAttack_text')}}"></div>
                            </div>
                            @error('magic_attack')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <textarea class="form-control m-0" style="margin-top: 1em;" placeholder="{{__('characters.common.note')}}" name="attackDescription">{{old('attackDescription')}}</textarea>
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
                                <div class="col-auto d-flex justify-content-center p-0"><input @error('melee_defense') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="h2hDefense_range" value="{{old('h2hDefense_range')}}"></div>
                                <div class="col d-flex justify-content-center"><input @error('melee_defense') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="h2hDefense_text" value="{{old('h2hDefense_text')}}"></div>
                            </div>
                            @error('melee_defense')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.defense.type.ranged')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center p-0"><input @error('dist_defense') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="distanceDefense_range" value="{{old('distanceDefense_range')}}"></div>
                                <div class="col d-flex justify-content-center"><input @error('dist_defense') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="distanceDefense_text" value="{{old('distanceDefense_text')}}"></div>
                            </div>
                            @error('dist_defense')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <div class="form-row d-flex justify-content-end align-items-center">
                                <div class="col d-flex justify-content-center"><h4 class="text-nowrap mb-2">{{__('characters.defense.type.spells')}}</h4></div>
                                <div class="col-auto d-flex justify-content-center p-0"><input @error('magic_defense') is-invalid @enderror class="form-control-range d-flex justify-content-center" type="range" style="margin-right: 1em;margin-left: 1em;" name="magicDefense_range" value="{{old('magicDefense_range')}}"></div>
                                <div class="col d-flex justify-content-center"><input @error('magic_defense') is-invalid @enderror class="form-control form-control-sm" type="number" max=100 min=0 inputmode="numeric" style="max-width: 3em;" name="magicDefense_text" value="{{old('magicDefense_text')}}"></div>
                            </div>
                            @error('magic_defense')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                            <textarea class="form-control w-100 mt-1" placeholder="{{__('characters.common.note')}}" name="defenseDescription">{{old('defenseDescription')}}</textarea>
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
            <div class="form-row justify-content-between align-items-center">
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.ability.name')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="skill[name][]" value="{{old('skill[name][]')}}">
                    </div>
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex">
                            <span class="d-inline-flex input-group-text">{{__('characters.ability.damage')}}</span>
                        </div>
                        <input class="form-control d-inline-flex" type="number" name="skill[damage][]" value="{{old('skill[damage][]')}}">
                    </div>
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{__('characters.common.desc')}}</span></div>
                        <textarea class="form-control" name="skill[desc][]" rows="1">{{old('skill[desc][]')}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn rounded-circle image-small p-0 btn-primary" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus m-auto" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
            <button class="btn rounded-circle image-small p-0 btn-danger" type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash m-auto" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                </svg>
            </button>
        </div>
        <div class="container text-center">
            <h2 class="text-left">{{__('characters.weapons')}}</h2>
            <div class="form-row justify-content-between align-items-center">
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.weapon.name')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="weapon[name][]" value="{{old('weapon[name][]')}}">
                    </div>
                </div>
                <div class="col" style="max-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex">
                            <span class="d-inline-flex input-group-text">{{__('characters.weapon.range')}}</span>
                        </div>
                        <input class="form-control d-inline-flex" type="number" name="weapon[range][]" value="{{old('weapon[range][]')}}">
                        <div class="input-group-append"><span class="d-inline-flex input-group-text">m</span></div>
                    </div>
                </div>
                <div class="col" style="max-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{__('characters.weapon.damage')}}</span></div>
                        <input class="form-control" type="number" name="weapon[damage][]" value="{{old('weapon[damage][]')}}">
                    </div>
                </div>
                <div class="col" style="max-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{__('characters.weapon.weight')}}</span>
                        </div>
                        <input class="form-control" type="number" name="weapon[weight][]" value="{{old('weapon[weight][]')}}">
                    </div>
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{__('characters.common.desc')}}</span>
                        </div>
                        <textarea class="form-control" name="weapon[desc][]" rows="1">{{old('weapon[desc][]')}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn rounded-circle image-small p-0 btn-primary" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus m-auto" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
            <button class="btn rounded-circle image-small p-0 btn-danger" type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash m-auto" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                </svg>
            </button>
        </div>
        <div class="container text-center">
            <h2 class="text-left">{{__('characters.armors')}}</h2>
            <div class="form-row justify-content-between align-items-center">
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex">
                            <span class="d-inline-flex input-group-text">{{__('characters.armor.name')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" name="armor[name][]" value="{{old('armor[name][]')}}">
                    </div>
                </div>
                <div class="col" style="max-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex">
                            <span class="d-inline-flex input-group-text">{{__('characters.armor.protection')}}</span>
                        </div>
                        <input class="form-control d-inline-flex" type="number" name="armor[protection][]" value="{{old('armor[protection][]')}}">
                    </div>
                </div>
                <div class="col" style="max-width: 20em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex">
                            <span class="d-inline-flex input-group-text">{{__('characters.armor.weight')}}</span>
                        </div>
                        <input class="form-control d-inline-flex" type="number" name="armor[weight][]" value="{{old('armor[weight][]')}}">
                    </div>
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{__('characters.common.desc')}}</span>
                        </div>
                        <textarea class="form-control" name="armor[desc][]" rows="1">{{old('armor[desc][]')}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn rounded-circle image-small p-0 btn-primary" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus m-auto" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
            <button class="btn rounded-circle image-small p-0 btn-danger" type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash m-auto" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                </svg>
            </button>
        </div>
        <div class="container text-center">
            <h2 class="text-left">{{__('characters.items')}}</h2>
            <div class="form-row justify-content-between align-items-center">
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.item.name')}}<br></span>
                        </div>
                        <input class="form-control d-inline-flex" type="text" style="min-width: 10em;" name="item[name][]" value="{{old('item[name][]')}}">
                    </div>
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend d-inline-flex">
                            <span class="d-inline-flex input-group-text">{{__('characters.item.weight')}}<br></span>
                        </div>
                        <input  class="form-control d-inline-flex" type="number" style="min-width: 10em;" name="item[weight][]" value="{{old('item[weight][]')}}">
                    </div>
                </div>
                <div class="col" style="min-width: 15em;">
                    <div class="input-group d-inline-flex">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{__('characters.common.desc')}}</span>
                        </div>
                        <textarea class="form-control" name="item[desc][]" rows="1">{{old('item[desc][]')}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn rounded-circle image-small p-0 btn-primary" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus m-auto" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
            <button class="btn rounded-circle image-small p-0 btn-danger" type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash m-auto" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                </svg>
            </button>
        </div>
        <div class="container d-flex justify-content-center align-items-center button-end">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                </svg>
            </button>
            <button class="btn btn-primary btn-block ml-1 mr-1" type="submit">{{__('characters.button.confirm')}}</button>
            <button id="reset" class=" btn btn-danger" type="reset">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
    </form>

    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('characters.import')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline d-flex justify-content-center" method="post" action="{{route('importCharacter')}}">
                        @csrf
                        <div class="form-group">
                            <input  type="text" class="form-control mr-2 ml-2" id="encryptedJson" aria-describedby="importInput" name="encryptedJson" placeholder="{{__('characters.import.code')}}">
                            <button type="submit" class="btn btn-primary" onclick="">{{__('characters.import.button')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

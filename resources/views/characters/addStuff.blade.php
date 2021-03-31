@extends('layouts.app')

@section('title', config('app.name'). " | ".__('characters.title.addStuff'))

@section('content')

    <div class="container text-center mb-3">
        <h1 class="display-4 text-center">{{__('characters.title.id')}} <span class="badge badge-secondary">{{$character['name']}}</span></h1>
        <div class="btn-group m-3" role="group">
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('createCharacter')}}'">{{__('characters.create')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('listCharacter')}}'">{{__('characters.list')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('helpCharacter')}}'">{{__('characters.help')}}</button>
        </div>
    </div>
    <div class="container mb-5">
        <div class="form-group">
            <label for="stuff"><h2 class="text-left">{{__('characters.dropdown.choose')}}</h2></label>
            <select class="form-control" id="stuff">
                <option selected></option>
                <option value="abilities">{{__('characters.abilities')}}</option>
                <option value="weapons">{{__('characters.weapons')}}</option>
                <option value="armors">{{__('characters.armors')}}</option>
                <option value="items">{{__('characters.items')}}</option>
            </select>
        </div>
    </div>

        <div class="container text-center data" id="abilities">
            <form method="post" action="{{route('addStuffRequest')}}">
                @csrf
                <input class="hidden" name="type" value="skill">
                <input class="hidden" name="id" value="{{$character['id']}}">
                <h2 class="text-left">{{__('characters.abilities')}}</h2>
                <div class="form-row justify-content-between align-items-center">
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.ability.name')}}<br></span>
                            </div>
                            <input class="form-control d-inline-flex" type="text" name="skill[name][]" value="{{old('skill[name][]')}}">
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
                            <input class="form-control d-inline-flex" type="number" name="skill[damage][]" value="{{old('skill[damage][]')}}">
                        </div>
                        @error('skill[damage][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{__('characters.common.desc')}}</span></div>
                            <textarea class="form-control" name="skill[desc][]" rows="1">{{old('skill[desc][]')}}</textarea>
                        </div>
                        @error('skill[damage][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-block button-end" type="submit">{{__('characters.add')}}</button>
            </form>
        </div>

        <div class="container text-center data" id="weapons">
            <form method="post" action="{{route('addStuffRequest')}}">
                @csrf
                <input class="hidden" name="type" value="weapon">
                <input class="hidden" name="id" value="{{$character['id']}}">
                <h2 class="text-left">{{__('characters.weapons')}}</h2>
                <div class="form-row justify-content-between align-items-center">
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.weapon.name')}}<br></span>
                            </div>
                            <input class="form-control d-inline-flex" type="text" name="weapon[name][]" value="{{old('weapon[name][]')}}">
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
                            <input class="form-control d-inline-flex" type="number" name="weapon[range][]" value="{{old('weapon[range][]')}}">
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
                            <input class="form-control" type="number" name="weapon[damage][]" value="{{old('weapon[damage][]')}}">
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
                            <input class="form-control" type="number" name="weapon[weight][]" value="{{old('weapon[weight][]')}}">
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
                            <textarea class="form-control" name="weapon[desc][]" rows="1">{{old('weapon[desc][]')}}</textarea>
                        </div>
                        @error('weapon[desc][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-block button-end" type="submit">{{__('characters.add')}}</button>
            </form>
        </div>

        <div class="container text-center data" id="armors">
            <form method="post" action="{{route('addStuffRequest')}}">
                @csrf
                <input class="hidden" name="type" value="armor">
                <input class="hidden" name="id" value="{{$character['id']}}">
                <h2 class="text-left">{{__('characters.armors')}}</h2>
                <div class="form-row justify-content-between align-items-center">
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex">
                                <span class="d-inline-flex input-group-text">{{__('characters.armor.name')}}<br></span>
                            </div>
                            <input class="form-control d-inline-flex" type="text" name="armor[name][]" value="{{old('armor[name][]')}}">
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
                            <input class="form-control d-inline-flex" type="number" name="armor[protection][]" value="{{old('armor[protection][]')}}">
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
                            <input class="form-control d-inline-flex" type="number" name="armor[weight][]" value="{{old('armor[weight][]')}}">
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
                            <textarea class="form-control" name="armor[desc][]" rows="1">{{old('armor[desc][]')}}</textarea>
                        </div>
                        @error('armor[desc][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-block button-end" type="submit">{{__('characters.add')}}</button>
            </form>
        </div>

        <div class="container text-center data" id="items">
            <form method="post" action="{{route('addStuffRequest')}}">
                @csrf
                <input class="hidden" name="type" value="item">
                <input class="hidden" name="id" value="{{$character['id']}}">
                <h2 class="text-left">{{__('characters.items')}}</h2>
                <div class="form-row justify-content-between align-items-center">
                    <div class="col" style="min-width: 15em;">
                        <div class="input-group d-inline-flex">
                            <div class="input-group-prepend d-inline-flex"><span class="d-inline-flex input-group-text">{{__('characters.item.name')}}<br></span>
                            </div>
                            <input class="form-control d-inline-flex" type="text" style="min-width: 10em;" name="item[name][]" value="{{old('item[name][]')}}">
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
                            <input class="form-control d-inline-flex" type="number" style="min-width: 10em;" name="item[weight][]" value="{{old('item[weight][]')}}">
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
                            <textarea class="form-control" name="item[desc][]" rows="1">{{old('item[desc][]')}}</textarea>
                        </div>
                        @error('item[desc][]')
                        <div class="alert alert-danger mt-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-block button-end" type="submit">{{__('characters.add')}}</button>
            </form>
        </div>

    <script>

        const addStuffRoute = "{{route('addStuffRequest')}}"

        function addStuff() {
            $.post(addStuffRoute, {
                _token: $('input[name="_token"]').val()
            }).done(function () {
                document.location.reload()
            });
        }

        console.log("dzdeqgfes")

        document.getElementById('stuff').addEventListener('change', function () {
                'use strict';
                var vis = document.querySelector('.vis'),
                    target = document.getElementById(this.value);
                if (vis !== null) {
                    vis.className = 'data';
                }
                if (target !== null ) {
                    target.className = 'container text-center vis';
                }
            });
    </script>
@stop

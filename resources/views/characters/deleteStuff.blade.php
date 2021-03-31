@extends('layouts.app')

@section('title', config('app.name'). " | ".__('characters.title.deleteStuff'))

@section('content')
    @csrf
    <div class="container text-center mb-3">
        <h1 class="display-4 text-center">{{__('characters.title.id')}} <span class="badge badge-secondary">{{$character['name']}}</span></h1>
        <div class="btn-group m-3" role="group">
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('createCharacter')}}'">{{__('characters.create')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('listCharacter')}}'">{{__('characters.list')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('helpCharacter')}}'">{{__('characters.help')}}</button>
        </div>
    </div>
    <div class="container">
            <h2>{{__('characters.abilities')}}</h2>
            @if(count($skills) > 0)
                <table class="table table-responsive-m">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{__('characters.ability.name')}}</th>
                            <th scope="col">{{__('characters.ability.damage')}}</th>
                            <th scope="col">{{__('characters.common.desc')}}</th>
                            <th scope="col" class="text-center" style="width:5em;">{{__('characters.actions')}}</th>
                        </tr>
                    </thead>
            @foreach($skills as $s)
                        <tbody>
                            <tr>
                                <td>{{$s['name']}}</td>
                                <td>{{$s['value']}}</td>
                                <td>{{$s['description']}}</td>
                                <td>
                                    <a onclick="showModal({{ $s['id'] }}, {{ $character['id'] }}, 'skill' ,'deleteModal','{{$s['name']}}')" class="col-auto btn btn-sm btn-danger m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
            @endforeach
                </table>
            @else
                <h3 class="alert alert-danger">{{__('characters.no_skills')}}</h3>
            @endif
            <h2>{{__('characters.weapons')}}</h2>
            @if(count($weapons) > 0)
                <table class="table table-responsive-m">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{__('characters.weapon.name')}}</th>
                        <th scope="col">{{__('characters.weapon.range')}}</th>
                        <th scope="col">{{__('characters.weapon.damage')}}</th>
                        <th scope="col">{{__('characters.weapon.weight')}}</th>
                        <th scope="col">{{__('characters.common.desc')}}</th>
                        <th scope="col" class="text-center" style="width:5em;">{{__('characters.actions')}}</th>
                    </tr>
                    </thead>
                    @foreach($weapons as $w)
                        <tbody>
                            <tr>
                                <td>{{$w['name']}}</td>
                                <td>{{$w['range']}}</td>
                                <td>{{$w['damage']}}</td>
                                <td>{{$w['weight']}}</td>
                                <td>{{$w['description']}}</td>
                                <td>
                                    <a onclick="showModal({{ $w['id'] }}, {{ $character['id'] }}, 'weapon' ,'deleteModal','{{$w['name']}}')" class="col-auto btn btn-sm btn-danger m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <h3 class="alert alert-danger">{{__('characters.no_weapons')}}</h3>
            @endif
            <h2>{{__('characters.armors')}}</h2>
            @if(count($armors) > 0)
                <table class="table table-responsive-m">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{__('characters.armor.name')}}</th>
                        <th scope="col">{{__('characters.armor.protection')}}</th>
                        <th scope="col">{{__('characters.armor.weight')}}</th>
                        <th scope="col">{{__('characters.common.desc')}}</th>
                        <th scope="col" class="text-center" style="width:5em;">{{__('characters.actions')}}</th>
                    </tr>
                    </thead>
                    @foreach($armors as $a)
                        <tbody>
                        <tr>
                            <td>{{$a['name']}}</td>
                            <td>{{$a['resistance']}}</td>
                            <td>{{$a['weight']}}</td>
                            <td>{{$a['description']}}</td>
                            <td>
                                <a onclick="showModal({{ $a['id'] }}, {{ $character['id'] }}, 'armor' ,'deleteModal','{{$a['name']}}')" class="col-auto btn btn-sm btn-danger m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <h3 class="alert alert-danger">{{__('characters.no_armors')}}</h3>
            @endif
            <h2>{{__('characters.items')}}</h2>
            @if(count($items) > 0)
                <table class="table table-responsive-m">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{__('characters.item.name')}}</th>
                        <th scope="col">{{__('characters.item.weight')}}</th>
                        <th scope="col">{{__('characters.common.desc')}}</th>
                        <th scope="col" class="text-center" style="width:5em;">{{__('characters.actions')}}</th>
                    </tr>
                    </thead>
                    @foreach($items as $i)
                        <tbody>
                        <tr>
                            <td>{{$i['name']}}</td>
                            <td>{{$i['weight']}}</td>
                            <td>{{$i['description']}}</td>
                            <td>
                                <a onclick="showModal({{ $i['id'] }}, {{ $character['id'] }}, 'item' ,'deleteModal','{{ $i['name'] }}')" class="col-auto btn btn-sm btn-danger m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <h3 class="alert alert-danger">{{__('characters.no_items')}}</h3>
            @endif
    </div>

    <script>
        const deleteStuffRoute = "{{route('deleteStuffRequest')}}"
        let id = null;
        let type = null;
        let char = null;
        let name = null;
        function deleteStuff() {
            $.post(deleteStuffRoute, {
                stuff_id: id,
                stuff_type: type,
                character_id: char,
                _token: $('input[name="_token"]').val()
            }).done(function () {
                document.location.reload()
            });
        }

        function showModal(value, char_id, type_value, modal,obj_name){
            id = value;
            char = char_id;
            type = type_value;
            name = obj_name;
            $("#" + modal).modal('toggle');
            $('#object_deletion').text(name);
        }
    </script>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Suppression de la feuille de personnage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('characters.delete.prompt.1')}}<span id="object_deletion"></span>{{__('characters.delete.prompt.2')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('characters.back')}}</button>
                    <button type="button" class="btn btn-danger" onclick="deleteStuff()">{{__('characters.delete')}}</button>
                </div>
            </div>
        </div>
    </div>

@stop

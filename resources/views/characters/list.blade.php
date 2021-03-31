@extends('layouts.app')

@section('title', config('app.name'). " | ".__('characters.title'))

@section('content')
    @csrf
    <div class="container text-center spacing">
        <h1 class="display-4 text-center">{{__('characters.title')}}</h1>
        <div class="btn-group margin-medium" role="group">
            <button class="btn btn-outline-primary " type="button" onclick="window.location='{{route('createCharacter')}}'">{{__('characters.create')}}</button>
            <button class="btn btn-outline-primary active" type="button" onclick="window.location='{{route('listCharacter')}}'">{{__('characters.list')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('helpCharacter')}}'">{{__('characters.help')}}</button>
        </div>
    </div>
    <div class="container">
        <h2 class="text-left subtitle-small">{{__('characters.choose_character')}}</h2>
        <div class="row justify-content-start">
            <table class="table table-bordered table-responsive-m">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('characters.field.name')}}</th>
                    <th scope="col">{{__('characters.field.image')}}</th>
                    <th scope="col">{{__('characters.descplaceholder')}}</th>
                    <th scope="col">{{__('characters.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($characters as $c)
                    <tr>
                        <th class="align-middle" scope="row">{{$c['id']}}</th>
                        <td class="align-middle" style="min-width:12em;">{{$c['name']}}</td>
                        <td class="align-middle text-center"><img class="zoom" height="64px" src="{{$c['image']}}" alt=""></td>
                        <td class="align-middle text-justify">{{$c['description']}}</td>
                        <td class="p-1 align-middle" style="min-width:15em;">
                                <div class="row justify-content-center align-items-center">
                                    <a onclick="exportJSON({{$c['id']}})" class="col-auto btn btn-sm btn-success m-1" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                                            <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                    </a>
                                    <a href="{{route('showCharacterID', ['id' => $c['id']])}}" class="col-auto btn btn-sm btn-primary m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </a>
                                    @if($c['user_id'] === $user['id'])
                                    <a onclick="showModal({{ $c['id'] }},'editModal',null)" class="col-auto btn btn-sm btn-warning m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                    <a onclick="showModal({{ $c['id'] }},'deleteModal','{{$c['name']}}')" class="col-auto btn btn-sm btn-danger m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="1000"><div class="alert alert-danger w-100" role="alert">
                                {{__('characters.no_char_found')}}
                            </div></th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <script>
            const deleteCharacterRoute = "{{route('deleteCharacter')}}"
            const editCharacterRoute = "{{route('editCharacter')}}"
            const exportJSONRoute = "{{route('exportCharacter')}}"
            let id = null;
            let name = null;
            function exportJSON(idChar){
                let encryptedText = $.post(exportJSONRoute,{
                    char_id:idChar,
                    _token: $('input[name="_token"]').val()
                }).done(function(){
                    $('#export-content').val(encryptedText.responseText);
                    $('#jsonModal').modal('toggle');
                });

            }

            function deleteCharacter() {
                $.post(deleteCharacterRoute, {
                    char_id: id,
                    _token: $('input[name="_token"]').val()
                }).done(function () {
                    document.location.reload()
                });
            }

            function showModal(value, modal,sheet_name){
                name = sheet_name;
                id = value;
                if(modal === "editModal") {
                    $("#editChar").attr("href", $("#editChar").attr("href").replaceAll(-1, id));
                    $("#addStuff").attr("href", $("#addStuff").attr("href").replaceAll(-1, id));
                    $("#deleteStuff").attr("href", $("#deleteStuff").attr("href").replaceAll(-1, id));
                }
                $("#" + modal).modal('toggle');
                if(sheet_name !== null) $("#sheet_deletion").text(name);
            }


        </script>
    </div>
    <!-- Modals -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('characters.delete.sheet')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('characters.delete.prompt.1')}} <span id="sheet_deletion"></span>{{__('characters.delete.prompt.2')}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('characters.back')}}</button>
                    <button type="button" class="btn btn-danger" onclick="deleteCharacter()">{{__('characters.delete')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('characters.title.edit')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('characters.you_can')}} <span class=" badge badge-primary">{{strtolower(__('characters.edit'))}}</span> {{__('characters.you_can_2')}} <span class=" badge badge-success">{{strtolower(__('characters.add'))}}</span> {{__('characters.you_can_3')}} <span class=" badge badge-danger">{{strtolower(__('characters.delete'))}}</span> {{__('characters.you_can_4')}}.</p>
                </div>
                <div class="modal-footer">
                    <a id="editChar" href="{{route('editCharacterID', ['id' => -1])}}" class="col-auto btn btn-sm btn-primary m-1 ml-0">{{__('characters.edit')}}</a>
                    <p class="ml-auto"> {{__('characters.stuff')}} : </p>
                    <a id="addStuff" href="{{route('addStuff', ['id' => -1])}}" class="col-auto btn btn-sm btn-success m-1 ">{{__('characters.add')}}</a>
                    <a id="deleteStuff" href="{{route('deleteStuff', ['id' => -1])}}" class="col-auto btn btn-sm btn-danger m-1 mr-0">{{__('characters.delete')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="jsonModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pog">{{__('characters.export')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="export-content">{{__('characters.export.code')}}</label>
                            <textarea class="form-control overflow-auto" id="export-content" rows="5" cols="50" readonly></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('characters.back')}}</button>
                </div>
            </div>
        </div>
    </div>

@stop

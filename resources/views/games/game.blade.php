<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/game.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body class="bg-white" style="overflow:hidden">
<main>
    <div class="row game-ui no-gutters" style="margin-bottom: 53px">
        <div class="col-3 shadow position-fixed" style="height: 100%">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="chat-tab" data-toggle="tab" href="#chat" role="tab"
                       aria-controls="chat" aria-selected="true">{{__('game.chat')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="players-tab" data-toggle="tab" href="#players" role="tab"
                       aria-controls="players" aria-selected="false">{{__('game.players')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact" aria-selected="false">...</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="height: 100%;">
                <div class="tab-pane fade show active position-relative" id="chat" role="tabpanel" aria-labelledby="chat-tab">

                    <div id="chat_messages">
                        <div class="media information py-3 px-2">
                            <img src="{{asset("/img/Dice.svg")}}" class="mr-3 rounded-circle icon" alt="...">
                            <div class="media-body">
                                <h6 class="mt-0 font-weight-bold">Roll20Alternative</h6>
                                <p style="line-height: 1rem">
                                {{__('game.presentation_text')}}
                                <ul class="pl-3">
                                    <li>
                                        {{__('game.presentation_global_message_1')}} <span class="badge badge-info">{{__('game.enter_key')}}</span> {{__('game.presentation_global_message_2')}}
                                    </li>
                                    <li>
                                        {{__('game.presentation_private_message_1')}} <span class="badge badge-info">{{__('game.presentation_private_message_2')}}</span> {{__('game.presentation_private_message_3')}} <span
                                                class="badge badge-info">{{__('game.presentation_private_message_4')}}</span>
                                        (<span class="badge badge-info">{{__('game.presentation_private_message_5')}}</span> {{__('game.presentation_private_message_6')}}).
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="players" role="tabpanel" aria-labelledby="players-tab">
                    <h6 class="text-center py-2">{{ count($players) }} joueurs sur {{ $party['players'] }}</h6>
                    <ul class="list-group-flush p-0">
                        <li class="list-group-item active mb-3">
                            [GM] {{ userSlug(getUser($party['user_id'], null)) }}
                        </li>
                        @forelse($players as $p)

                            <li class="list-group-item bg-secondary text-white mb-1">
                                {{ userSlug(getUser($p['user_id'], null)) }}
                            </li>
                        @empty
                            <div class="alert alert-primary" role="alert">
                                Aucun joueur ne se trouve dans la partie
                            </div>
                        @endforelse
                    </ul>
                </div>


                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
        <div class="col-9 offset-3" style="background: #212122">

            <div id="board" style="width: 100%;height: calc(100vh - 58px);">
            </div>


            <style>
                #board {
                    position: relative;
                }

                #board img {
                    max-height: calc(100vh - 58px);
                    position: absolute;
                    user-select: none;
                }
            </style>
        </div>
    </div>

    <nav class=" collapse navbar-collapse d-flex navbar bg-light position-fixed w-100 px-0 py-2 navbar-expand-md d-flex justify-content-center align-items-center game-nav">
        <div class="row no-gutters w-100">
            <div class="col-3 m-auto">
                <form action="" class="ajaxChatForm">
                    <div class="form-group mb-0">
                        @csrf
                        <input type="text" class="form-control nav-item" id="message" placeholder="Écrire votre message ici..." name="message">
                    </div>
                </form>
            </div>
            <div class="collapse navbar-collapse d-xl-flex justify-content-xl-start" id="navcol-1">
                <ul class="navbar-nav m-0">
                    <li class="nav-item align-self-center">
                        <a class="btn" data-toggle="modal" data-target="#modal-rollDice">Lancer dés</a>
                    </li>
                    <li class="nav-item dropup align-self-center">
                        <a class="dropdown-toggle nav-link btn" aria-expanded="false" data-toggle="dropdown">Personnage</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:openPopup('{{ route('createCharacter') }}')">Créer une feuille</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:openPopup('{{ route('listCharacter') }}')">Mes feuilles</a>
                            @if(count($players) > 0)
                                @foreach($players as $p)
                                    <a class="dropdown-item" href="javascript:openPopup('{{ route('listPlayerCharacter', ['slug' => strtolower(getUser($p['user_id'], "username") . '.' . $p['user_id'])]) }}')">Feuilles de {{ getUser($p['user_id'],
                                    "username") }}</a>
                                @endforeach
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="nav-item m-2 ml-4 align-self-center">
                            <input type="checkbox" class="form-check-input" id="showGrid">
                            <label class="form-check-label" for="showGrid">Afficher la grille</label>
                        </div>
                    </li>
                    @if($party['user_id'] === Auth::user()->id)
                        <li class="nav-item dropup align-self-center">
                            <a class="dropdown-toggle nav-link btn" aria-expanded="false" data-toggle="dropdown">
                                Image
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn" data-toggle="modal" data-target="#modal-background">Plateau</a>
                                <a class="dropdown-item btn" data-toggle="modal" data-target="#modal-decor">Décor</a>
                                <a class="dropdown-item btn" data-toggle="modal" data-target="#modal-character">Personnage</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-outline-secondary align-self-center" onclick="openModalBoxEditor()">
                                Configurer la grille
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-outline-success align-self-center" onclick="saveBoard(boardToJson())">
                                Sauvegarder
                            </a>
                        </li>
                    @endif

                </ul>
                <a href="{{ route('home') }}" class="nav-item btn btn-danger d-flex ml-auto justify-content-end align-self-center">Accueil</a>
            </div>
        </div>
    </nav>
</main>

<div id="contextMenu" class="dropdown clearfix">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
        <li>
            <a class="dropdown-item" tabindex="-1" href="#" id="edit-element">Modifier l'élement</a>
        </li>
        <li class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item text-danger" tabindex="-1" href="#" id="delete-element">Supprimer</a>
        </li>
    </ul>
</div>

<div class="modal fade" id="modal-rollDice" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="rollDice" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Lancer de dés</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" value="{{ $party['id'] }}" name="pid">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="rollValue">Valeur du dé</label>
                            <input type="number" class="form-control" id="rollValue" name="rollValue" min="2" max="1000" value="6" required>
                        </div>
                        <div class="form-group col-3">
                            <label for="rollNumber">Nombre de dé</label>
                            <input type="number" class="form-control" id="rollNumber" name="rollNumber" value="1" min="1" max="10" required>
                        </div>
                    </div>
                    @if($party['user_id'] === Auth::user()->id)
                        <div class="form-row justify-content-center">
                            <div class="form-check col-auto">
                                <input class="form-check-input" type="checkbox" id="rollHide" name="rollHide">
                                <label class="form-check-label" for="rollHide"> Cacher le lancer de dé </label>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lancer les dés</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(isGM($party['id']))
    <div class="modal fade" id="modal-background" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un plateau de jeu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col">
                        <label for="url-boards">Veuillez saisir l'emplacement de l'image a ajouter <span class="badge badge-primary badge-pill">URL</span></label>
                        <input type="text" class="form-control" id="url-boards">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="addImage('boards', $('#url-boards').val())">Valider</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-decor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un décor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col">
                        <label for="url-props">Veuillez saisir l'emplacement de l'image a ajouter <span class="badge badge-primary badge-pill">URL</span></label>
                        <input type="text" class="form-control" id="url-props">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="addImage('props', $('#url-props').val())">Valider</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-character" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un personnage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col">
                        <label for="url-tokens">Veuillez saisir l'emplacement de votre image <span class="badge badge-primary badge-pill">URL</span></label>
                        <input type="text" class="form-control" id="url-tokens">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="addImage('tokens', $('#url-tokens').val())">Valider</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-editor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editer l'image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nameElement">Nom</label>
                            <input type="text" class="form-control" id="nameElement">
                        </div>

                        <div class="col-12 mb-2">
                            <label for="sourceElement">Lien de l'image <span class="badge badge-primary badge-pill">URL</span></label>
                            <input type="text" class="form-control" id="sourceElement">
                        </div>

                        <div class="col-6 mb-2">
                            <label for="widthElement">Largeur</label>
                            <input type="number" class="form-control" id="widthElement" min="0">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="heightElement">Hauteur</label>
                            <input type="number" class="form-control" id="heightElement" min="0">
                        </div>

                        <div class="col-6 mb-2">
                            <label for="xElement">X</label>
                            <input type="number" class="form-control" id="xElement" min="0">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="yElement">Y</label>
                            <input type="number" class="form-control" id="yElement" min="0">
                        </div>

                        <div class="col-12 mb-2">
                            <label for="indexElement">Index</label>
                            <input type="number" class="form-control" id="indexElement" min="0">
                        </div>

                        <div class="col-12 mb-2 mt-2 text-center">
                            <input type="checkbox" class="form-check-input" id="visibleElement">
                            <label for="visibleElement">Visible</label>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="updateElement">Valider</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-box-editor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editer la grille</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="mbe_nph">Nombre de case (hauteur)</label>
                            <input type="number" class="form-control" id="mbe_nph" min="0">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="heightElement">Largeur de la ligne</label>
                            <input type="number" class="form-control" id="mbe_glw" min="0" step="0.1">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="mbe_index">Index</label>
                            <input type="number" class="form-control" id="mbe_index" min="0">
                        </div>
                        <div class="col-6 mb-2" style="margin-top: 38px;">
                            <input type="checkbox" class="form-check-input ml-1" id="mbe_visible">
                            <label for="mbe_visible" class="ml-4">Visible</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="mbe_update">Valider</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(!inParty($party, Auth::user()) && $party['user_id'] !== Auth::user()->id)
    <div class="modal fade" id="joinModal" tabindex="-1" role="dialog" aria-labelledby="joinModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voulez-vous rejoindre la partie?</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('joinParty') }}">
                        @csrf
                        <input type="hidden" name="party_id" value="{{ $party['id'] }}">
                        @if($party['password'] !== null)
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="password" class="col-form-label">Il vous faut un mot de passe pour rejoindre:</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        @endif
                        <input type="submit" class="btn btn-primary" value="Rejoindre">
                        <button class="btn btn-danger" data-dismiss="modal">Ne pas rejoindre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif


<style>
    #contextMenu {
        position: absolute;
        display: none;
        z-index: 1500;
    }
</style>
<script src="{{ asset('/js/app.js') }}"></script>
<script>
    document.getElementById("chat").scrollTo(0, document.getElementById("chat").scrollHeight);

    const playerList = []
    playerList.push("{{ getUser($party['user_id'], "username") }}".toLowerCase())
    playerList.push("gm")

    @if(count($players)>0)
    @foreach($players as $p)
    playerList.push("{{ getUser($p['user_id'], "username") }}".toLowerCase())
    @endforeach
    @endif

    const userID = "{{ Auth::user()->id }}"
    const id = "{{ $party['id'] }}"
    const route = "{{ route('chatParty') }}"
    const route2 = "{{ route('getChat', ["party_id" => $party['id'], "n" => "TOCHANGE"]) }}"
    const home = "{{ route('home') }}"
    const gm = "{{asset("/img/game-master.svg")}}";
    const board = $("#board")
    const route_rollDice = "{{ route('rollDice') }}"
    const isGM = {{ ($party['user_id'] === Auth::user()->id) ? "true" : "false" }}
    const route_getBoard = "{{ route('getBoard', ['party_id' => $party['id']]) }}"
    const route_saveBoard = "{{ route('saveBoard') }}"
    const editElement = $("#edit-element");

</script>
<script src="{{ asset('/js/game.js') }}"></script>
<script>

    $(function () {
        let $contextMenu = $("#contextMenu");
        @if(isGM($party['id']))
        $("body").on("contextmenu", "#board img", function (e) {
            $("#contextMenu #edit-element").attr('data-id', e.target.id);
            $("#contextMenu #delete-element").attr('data-id', e.target.id);
            @else
            $("body").on("contextmenu", "#board img#tokens-*", function (e) {
                @endif
                $contextMenu.css({
                    display: "block",
                    left: e.pageX,
                    top: e.pageY
                });
                return false;
            });

            $('html').click(function () {
                $contextMenu.hide();
            });

            $("#contextMenu li a").click(function (e) {
                $(this);
            });

        })


        @if(isGM($party['id']))

        editElement.click(function () {
            $('#modal-editor').modal('show')
            let data = JSON.parse(localStorage.getItem("data"))
            let id = document.getElementById(editElement.attr("data-id"));
            $('#nameElement').val(id.alt)
            $('#sourceElement').val(id.src)
            $('#widthElement').val(Math.round(id.width / (board.height() / data.box.number_per_height)))
            $('#heightElement').val(Math.round(id.height / (board.height() / data.box.number_per_height)))
            let x = parseFloat(id.style.left.slice(0, -2)) / (board.height() / data.box.number_per_height)
            let y = parseFloat(id.style.top.slice(0, -2)) / (board.height() / data.box.number_per_height)
            $('#xElement').val(Math.round(x));
            $('#yElement').val(Math.round(y));
            $('#indexElement').val(id.style.zIndex);
            $('#visibleElement').prop("checked", id.style.opacity !== '0.2');
        });

        function openModalBoxEditor() {
            $("#modal-box-editor").modal('show');
            let data = JSON.parse(localStorage.getItem("data"))

            $("#mbe_nph").val(data.box.number_per_height)
            $("#mbe_glw").val(data.box.grid_line_width)
            $('#mbe_visible').prop("checked", data.box.visible)
            $("#mbe_index").val(data.box.index)
        }

        function editGrid(nph, glw, visible, index) {
            let data = JSON.parse(localStorage.getItem("data"));
            data.box.number_per_height = parseInt(nph)
            data.box.grid_line_width = parseFloat(glw)
            data.box.visible = visible
            data.box.index = parseInt(index)
            saveBoard(data)
        }

        $("#mbe_update").click(function () {
            editGrid($("#mbe_nph").val(), $("#mbe_glw").val(), (!!$('#mbe_visible').is(':checked')), $("#mbe_index").val());
        });

        $("#updateElement").click(function () {
            let id = document.getElementById(editElement.attr("data-id"));
            let data = JSON.parse(localStorage.getItem("data"))

            id.src = $('#sourceElement').val();
            id.alt = $('#nameElement').val();
            id.width = $('#widthElement').val() * (board.height() / data.box.number_per_height)
            id.height = $('#heightElement').val() * (board.height() / data.box.number_per_height)
            id.style.left = $('#xElement').val() * (board.height() / data.box.number_per_height) + "px"
            id.style.top = $('#yElement').val() * (board.height() / data.box.number_per_height) + "px"
            id.style.zIndex = $('#indexElement').val();
            id.style.opacity = $('#visibleElement').is(':checked') ? '1' : '0.2';
            $('#modal-editor').modal('hide')
        });

        function addImage(type, src) {
            let data = JSON.parse(localStorage.getItem("data"))
            if (type === "boards") {
                let item = '<img src="' + src + '" alt="new board" data-type="boards" width="150" height="150" id="boards-' + Object.size(data.boards) + '" style="z-index: 2; top: 0; left: 0; opacity: 0.2">';
                $(item).appendTo(board)
            }
            if (type === "props") {
                let item = '<img src="' + src + '" alt="new props" data-type="props" width="150" height="150" id="props-' + Object.size(data.props) + '" style="z-index: 3; top: 0; left: 0; opacity: 0.2">';
                $(item).appendTo(board)
            }
            if (type === "tokens") {
                let item = '<img src="' + src + '" alt="new tokens" data-type="tokens" width="150" height="150" id="tokens-' + Object.size(data.tokens) + '" style="z-index: 10; top: 0; left: 0;" data-user="{{ $party['user_id'] }}">';
                $(item).appendTo(board)
            }
            saveBoard(boardToJson())
        }

        function boardToJson() {
            let toReturn = {}
            let data = JSON.parse(localStorage.getItem("data"))

            toReturn['box'] = {}
            toReturn['box']['number_per_height'] = data.box.number_per_height
            toReturn['box']['grid_line_width'] = data.box.grid_line_width
            toReturn['box']['visible'] = data.box.visible
            toReturn['box']['index'] = data.box.index

            toReturn['boards'] = {}
            let boardsElement = $('*[data-type="boards"]');
            boardsElement.each(function (i) {
                toReturn['boards'][i] = {}
                toReturn['boards'][i]['source'] = boardsElement[i].src
                toReturn['boards'][i]['index'] = boardsElement[i].style.zIndex
                toReturn['boards'][i]['width'] = Math.round(boardsElement[i].width / (board.height() / data.box.number_per_height))
                toReturn['boards'][i]['height'] = Math.round(boardsElement[i].height / (board.height() / data.box.number_per_height))
                toReturn['boards'][i]['visible'] = boardsElement[i].style.opacity !== '0.2';
                toReturn['boards'][i]['name'] = boardsElement[i].alt
                toReturn['boards'][i]['x'] = Math.round(parseFloat(boardsElement[i].style.left.slice(0, -2)) / (board.height() / data.box.number_per_height))
                toReturn['boards'][i]['y'] = Math.round(parseFloat(boardsElement[i].style.top.slice(0, -2)) / (board.height() / data.box.number_per_height))
            });

            toReturn['props'] = {}
            let propsElement = $('*[data-type="props"]');
            propsElement.each(function (i) {
                toReturn['props'][i] = {}
                toReturn['props'][i]['source'] = propsElement[i].src
                toReturn['props'][i]['index'] = propsElement[i].style.zIndex
                toReturn['props'][i]['width'] = Math.round(propsElement[i].width / (board.height() / data.box.number_per_height))
                toReturn['props'][i]['height'] = Math.round(propsElement[i].height / (board.height() / data.box.number_per_height))
                toReturn['props'][i]['visible'] = propsElement[i].style.opacity !== '0.2';
                toReturn['props'][i]['name'] = propsElement[i].alt
                toReturn['props'][i]['x'] = Math.round(parseFloat(propsElement[i].style.left.slice(0, -2)) / (board.height() / data.box.number_per_height))
                toReturn['props'][i]['y'] = Math.round(parseFloat(propsElement[i].style.top.slice(0, -2)) / (board.height() / data.box.number_per_height))
            });

            toReturn['tokens'] = {}
            let tokensElement = $('*[data-type="tokens"]');
            tokensElement.each(function (i) {
                toReturn['tokens'][i] = {}
                toReturn['tokens'][i]['source'] = tokensElement[i].src
                toReturn['tokens'][i]['index'] = tokensElement[i].style.zIndex
                toReturn['tokens'][i]['width'] = Math.round(tokensElement[i].width / (board.height() / data.box.number_per_height))
                toReturn['tokens'][i]['height'] = Math.round(tokensElement[i].height / (board.height() / data.box.number_per_height))
                toReturn['tokens'][i]['visible'] = tokensElement[i].style.opacity !== '0.2';
                toReturn['tokens'][i]['name'] = tokensElement[i].alt
                toReturn['tokens'][i]['x'] = Math.round(parseFloat(tokensElement[i].style.left.slice(0, -2)) / (board.height() / data.box.number_per_height))
                toReturn['tokens'][i]['y'] = Math.round(parseFloat(tokensElement[i].style.top.slice(0, -2)) / (board.height() / data.box.number_per_height))
            });
            return JSON.stringify(toReturn);
        }

        function saveBoard(data) {
            $.post(route_saveBoard, {
                party_id: id,
                data: data,
                _token: $('input[name="_token"]').val()
            }).done(function () {
                getBoardEX()
            });
        }

    @endif
</script>

</body>
</html>

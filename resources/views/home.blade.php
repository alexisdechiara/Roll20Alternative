@extends('layouts.app')

@section('title', config('app.name'). " | ". __('home.home_page'))

@section('content')
    <!-- Début du contenue -->
    <div class="container-fluid d-inline-block d-xl-flex justify-content-center justify-content-xl-center"><img class="d-block m-4" src="{{asset("/img/Roll20Logo-named.png")}}" width="50%" alt="Logo"></div>
    <div class="container">
        <a href="{{route('create')}}" class="link">
            <div class="row mb-3">
                <div class=" col-auto align-self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class=" home-icon bi bi-plus-circle-fill">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                    </svg>
                </div>
                <div class="col">
                    <div class="alert alert-secondary presentation m-0" role="alert">
                        <h4 class="alert-heading">
                            {{__('home.create.title')}}
                        </h4>
                        <span>
                            <strong>
                                {{__('home.create.desc')}}
                            </strong>
                            <br>
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('join')}}" class="link">
            <div class="row mb-3">
                <div class="col-auto align-self-center">

                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="home-icon bi bi-arrow-down-square-fill">
                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"></path>
                    </svg>
                </div>
                <div class="col">
                    <div class="alert alert-secondary presentation m-0" role="alert">
                        <h4 class="alert-heading">
                            {{__('home.join.title')}}
                        </h4>
                        <span>
                            <strong>
                                {{__('home.join.desc')}}
                            </strong>
                            <br>
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('createCharacter')}}" class="link">
            <div class="row mb-3">
                <div class="col-auto align-self-center">

                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class=" home-icon bi bi-file-earmark-spreadsheet-fill">
                        <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3v-2h3V9H3zm3 3v-2h3v2H6z"></path>
                    </svg>
                </div>
                <div class="col">
                    <div class="alert alert-secondary presentation m-0" role="alert">
                        <h4 class="alert-heading link">{{__('home.charsheet.title')}}</h4><span><strong>{{__('home.charsheet.desc')}}</strong><br></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Fin du contenue -->
@stop

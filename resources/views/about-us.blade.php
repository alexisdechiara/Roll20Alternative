@extends('layouts.app')

@section('title', config('app.name'). " | ". __('about-us.about'))

@section('content')
    <div class="container">
        <h1 class="display-4 text-center">{{__('about-us.about')}}</h1>
        <div class="row justify-content-between align-items-center p-0">
            <div class="col p-0 m-1">
                <div class="card d-flex justify-content-center w-100 h-100">
                    <div class="card-body">
                        <img class="d-flex justify-content-center profile-image rounded-circle" src="{{asset("/img/DeChiara.jpg")}}">
                        <h5 class="d-flex justify-content-center card-title">@da900147</h5>
                        <h6 class="d-flex text-truncate text-muted d-flex justify-content-center card-subtitle">Alexis De Chiara</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-code">
                                    <path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                                </svg></div>
                            <div class="col d-flex align-items-center">
                                <p class="m-auto">Front-end</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col p-0 m-1">
                <div class="card d-flex justify-content-center w-100 h-100">
                    <div class="card-body">
                        <img class="d-flex justify-content-center profile-image rounded-circle" src="{{asset("/img/Farineau.jpg")}}">
                        <h5 class="d-flex justify-content-center card-title">@ft905846</h5>
                        <h6 class="d-flex text-truncate text-muted d-flex justify-content-center card-subtitle">Thomas Farineau</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-code">
                                    <path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                                </svg></div>
                            <div class="col d-flex align-items-center">
                                <p class="m-auto">Système</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col p-0 m-1">
                <div class="card d-flex justify-content-center w-100 h-100">
                    <div class="card-body">
                        <img class="d-flex justify-content-center profile-image rounded-circle" src="{{asset("/img/Srifi.jpg")}}">
                        <h5 class="d-flex justify-content-center card-title">@sj801446</h5>
                        <h6 class="d-flex text-truncate text-muted d-flex justify-content-center card-subtitle">Pauline Srifi</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-code">
                                    <path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                                </svg></div>
                            <div class="col d-flex align-items-center">
                                <p class="m-auto">Conception</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col p-0 m-1">
                <div class="card d-flex justify-content-center w-100 h-100">
                    <div class="card-body">
                        <img class="d-flex justify-content-center profile-image rounded-circle" src="{{asset("/img/Longuemare.jpg")}}">
                        <h5 class="d-flex justify-content-center card-title">@lh805639</h5>
                        <h6 class="d-flex text-truncate text-muted d-flex justify-content-center card-subtitle">Hugo Longuemare</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-code">
                                    <path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                                </svg></div>
                            <div class="col d-flex align-items-center">
                                <p class="m-auto">Back-end</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col p-0 m-1">
                <div class="card d-flex justify-content-center w-100 h-100">
                    <div class="card-body">
                        <img class="d-flex justify-content-center profile-image rounded-circle" src="{{asset("/img/Rizzo.jpg")}}">
                        <h5 class="d-flex justify-content-center card-title">@rm911321</h5>
                        <h6 class="d-flex text-truncate text-muted d-flex justify-content-center card-subtitle">Michael Rizzo</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-code">
                                    <path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                                </svg></div>
                            <div class="col d-flex align-items-center">
                                <p class="m-auto">Test</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col p-0 m-1">
                <div class="card d-flex justify-content-center w-100 h-100">
                    <div class="card-body">
                        <img class="d-flex justify-content-center profile-image rounded-circle" src="{{asset("/img/Kitabjan.png")}}">
                        <h5 class="d-flex justify-content-center card-title">@kl901896</h5>
                        <h6 class="d-flex text-truncate text-muted d-flex justify-content-center card-subtitle">Léo Kitabjian</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-code">
                                    <path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                                </svg></div>
                            <div class="col d-flex align-items-center">
                                <p class="m-auto">Back-end</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-auto"><img class="justify-content-start image-medium subtitle-medium" src="{{asset("/img/Anvil.svg")}}"></div>
            <div class="col d-flex align-items-center">
                <h2 class="text-center m-0">Projet tutoré 2020-2021 : Roll20Alternative<br></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto"><img class="justify-content-start image-medium subtitle-medium" src="{{asset("/img/University.svg")}}"></div>
            <div class="col d-flex align-items-center">
                <h2 class="text-center m-0">IUT Nice Côte d'azur - UCA<br></h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-center subtitle-small">
            <div class="col-4 d-flex justify-content-end image-medium"><img src="{{asset("/img/IUT.jpg")}}"></div>
            <div class="col d-flex justify-content-start image-medium"><img src="{{asset("/img/UCA.jpg")}}"></div>
        </div>
    </div>
    <div class="container-fluid mt-5 pt-5">
        <hr class="w-100">
        <h1 class="display-4 text-center">{{__('about-us.legalnotice')}}</h1>
        <p class="d-flex justify-content-center">"France", "United-states", "Anvil", "Dice", "Banner", "University" and "user" icons made by&nbsp<a href="https://www.freepik.com" title="Freepik"> Freepik </a> &nbspfrom&nbsp <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com </a></p>
        <p class="d-flex justify-content-center">Logo policy made by Jovanny Lemonad (<a href="http://www.jovanny.ru">http://www.jovanny.ru</a>), Copyright © 2011, with Reserved Font Name "Days One"</p>
    </div>
@stop

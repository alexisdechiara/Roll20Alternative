@extends('layouts.app')

@section('title', config('app.name'). " | ". __('profile.account'))

@section('scripts')
    <script src="{{ asset('/js/profile.js') }}" defer></script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card d-flex justify-content-center full">
                    <div class="card-body"><img class="d-flex justify-content-center profile-image rounded-circle" src="{{ ($user['profile_picture'] !== NULL && $user['profile_picture'] !=='') ? $user['profile_picture'] : asset("/img/user.svg")}}">
                        <h4 class=" d-flex justify-content-center align-items-center card-title m-1">{{ '@' . strtolower($user['username']) . '#' . $user['id'] }}</h4>
                        <h6 class="text-truncate text-muted d-flex justify-content-center align-items-center card-subtitle mb-2">{{ $user['first_name'] }} {{ $user['last_name'] }}</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-auto ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-envelope-fill">
                                    <path fill-rule="evenodd"
                                          d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                                </svg>
                            </div>
                            <div class="col">
                                <p class="text-break m-0">{{ $user['email'] }}</p>
                            </div>
                        </div>
                        @if($user['localization'] !== NULL)
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"
                                         fill="currentColor" class="bi bi-geo-alt-fill">
                                        <path fill-rule="evenodd"
                                              d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <p class="text-truncate m-0">{{ $user['localization'] }}</p>
                                </div>
                            </div>
                        @endif
                        @if($user['administrator'])
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <p class="text-break m-0">{{__('profile.admin')}}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col align-self-center justify-content-end">
                <form method="post" action="{{ route('editProfile') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.email')}}</span></div>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" required value="{{ $user['email'] }}">
                            </div>
                            @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.firstname')}}</span></div>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $user['first_name'] }}" required>
                            </div>
                            @error('first_name')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.lastname')}}</span></div>
                                <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $user['last_name'] }}" required>
                            </div>
                            @error('last_name')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.username')}}</span>
                                </div>
                                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" required value="{{ $user['username'] }}">
                            </div>
                            @error('username')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.localisation')}}</span></div>
                                <input class="form-control @error('localization') is-invalid @enderror" type="text" name="localization" value="{{ $user['localization'] }}">
                            </div>
                            @error('localization')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.picture')}}</span></div>
                                <input class="form-control @error('profile_picture') is-invalid @enderror" type="text" name="profile_picture" value="{{ $user['profile_picture'] }}">
                            </div>
                            @error('profile_picture')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.password.new')}}</span></div>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="new-password">
                            </div>
                            @error('password')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.password.confirm')}}</span></div>
                                <input class="form-control" type="password" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">{{__('profile.password.old.repeat')}}</span></div>
                                <input class="form-control @error('current_password') is-invalid @enderror" type="password" required autocomplete="current-password" name="current_password">
                            </div>
                            @error('current_password')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <button class="btn btn-primary btn-block" type="submit">{{__('profile.button.confirm')}}</button>
                        </div>
                    </div>
                </form>
                @if($user['administrator'] === 1)
                    <div>
                        <a class="btn btn-warning btn-block" href="{{ route('dashboard') }}">{{__('profile.button.dashboard')}}</a>
                    </div>
                @endif
            </div>
        </div>


        @if(count($parties) > 0)
            <div class="row mt-4">
                <div class="col-12">
                    <table id="parties" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{__('profile.games.name')}}</th>
                            <th scope="col">{{__('profile.games.GM')}}</th>
                            <th scope="col">{{__('profile.games.role')}}</th>
                            <th scope="col">{{__('profile.games.action')}}</th>
                            <th scope="col">{{__('profile.games.creation')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parties as $p)
                            <tr>
                                <th scope="row">{{  $p['slug'] }}</th>
                                <td>{{ $p['name'] }}</td>
                                <td>
                                    @if($p['user_id'] !== $user['id'])
                                        {{ '@' . getUser($p['user_id'],"username") . '#' . getUser($p['user_id'],"id") }}
                                    @else
                                        {{__('profile.games.you')}}
                                    @endif
                                </td>
                                <td>
                                    @if($p['user_id'] !== $user['id'])
                                        <span class="badge badge-secondary">{{__('profile.games.player')}}</span>
                                    @else
                                        <span class="badge badge-success">{{__('profile.games.GM')}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('game', ['slug' => $p['slug']]) }}" class="btn btn-sm btn-outline-primary">{{__('profile.games.join')}}</a>
                                    @if($p['user_id'] !== $user['id'])
                                        <a href="#" onclick="leaveParty({{ $p['id'] }})" class="btn btn-sm btn-outline-danger">{{__('profile.games.leave')}}</a>
                                    @else
                                        <a href="#" onclick="disbandParty({{ $p['id'] }})" class="btn btn-sm btn-outline-danger">{{__('profile.games.delete')}}</a>
                                    @endif
                                </td>
                                <td>
                                    {{ ucfirst($p['created_at']->diffForHumans()) . '.' }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <script>
            const leavePartyRoute = "{{ route('leaveParty') }}"
            const disbandPartyRoute = "{{ route('disbandParty') }}"

            function leaveParty(id) {
                $.post(leavePartyRoute, {
                    party_id: id,
                    _token: $('input[name="_token"]').val()
                }).done(function () {
                    document.location.reload()
                });
            }

            function disbandParty(id) {
                $.post(disbandPartyRoute, {
                    party_id: id,
                    _token: $('input[name="_token"]').val()
                }).done(function () {
                    document.location.reload()
                });
            }

        </script>
        <style>
            #parties.table th, #parties.table td {
                padding: 0.5rem !important
            }
        </style>
    </div>
@stop

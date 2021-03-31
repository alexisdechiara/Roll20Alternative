@extends('layouts.admin')

@section('title', config('app.name'). " | ".__('admin.character_sheets'))

@section('characters', 'active')

@section('content')
    <h4 class="page-title">{{__('admin.character_sheets')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">{{__('admin.registered_users')}}</h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-head-bg-primary table-striped table-hover table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('admin.username')}}</th>
                            <th scope="col">{{__('admin.image')}}</th>
                            <th scope="col">{{__('characters.field.name')}}</th>
                            <th scope="col">{{__('characters.descplaceholder')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($characters as $c)
                            <tr>
                                <td>{{ $c['id']}}</td>
                                <td>{{userSlug(getUser($c['user_id'],null))}}</td>
                                <td class="p-0 text-center"><img class="zoom" height="32px" src="{{$c['image']}}" alt=""></td>
                                <td style="min-width:12em;">{{$c['name']}}</td>
                                <td>{{$c['description']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('admin.username')}}</th>
                            <th scope="col">{{__('admin.image')}}</th>
                            <th scope="col">{{__('characters.field.name')}}</th>
                            <th scope="col">{{__('characters.descplaceholder')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

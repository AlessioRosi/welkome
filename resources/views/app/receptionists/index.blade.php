@extends('layouts.app')

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('users.title'),
            'url' => route('receptionists.index'),
            'options' => [
                [
                    'option' => trans('common.new'),
                    'url' => route('receptionists.create')
                ],
            ]
        ])

        <div class="row">
            <div class="col-md-12">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <a href="#active" data-toggle="tab">
                            @lang('users.actives')
                        </a>
                    </li>
                    <li><a href="#inactive" data-toggle="tab">@lang('users.inactives')</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    @include('app.receptionists.list', [
                        'id' => 'active',
                        'active' => true,
                        'status' => true
                    ])
                    @include('app.receptionists.list', [
                        'id' => 'inactive',
                        'active' => false,
                        'status' => false
                    ])
                </div>
            </div>
        </div>
    </div>

@endsection
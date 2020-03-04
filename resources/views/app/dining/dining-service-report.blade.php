@extends('layouts.panel')

@section('breadcrumbs')
    {{ Breadcrumbs::render('dining-service', $service) }}
@endsection

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('dining.title'),
            'url' => route('dining.index'),
            'options' => [
                [
                    'option' => trans('common.back'),
                    'url' => route('dining.show', [
                        'id' => Hashids::encode($service->id)
                    ])
                ],
            ]
        ])

        @include('app.services.info')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="text-center">@lang('common.report.of') @lang('dining.title')</h2>
                <form action="{{ route('dining.service.report.export', ['id' => Hashids::encode($service->id)]) }}" method="POST">
                    @csrf()

                    <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                        <label for="start">@lang('common.startDate'):</label>
                        <input type="text" class="form-control datepicker" name="start" id="start" value="{{ old('start') }}" required>

                        @if ($errors->has('start'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                        <label for="end">@lang('common.endDate'):</label>
                        <input type="text" class="form-control datepicker" name="end" id="end" value="{{ old('end') }}" required>

                        @if ($errors->has('end'))
                            <span class="help-block">
                                <strong>{{ $errors->first('end') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('common.query')</button>
                    <a href="{{ route('dining.show', ['id' => Hashids::encode($service->id)]) }}" class="btn btn-default">
                        @lang('common.back')
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
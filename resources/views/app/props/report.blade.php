@extends('layouts.panel')

@section('breadcrumbs')
    {{ Breadcrumbs::render('props') }}
@endsection

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('props.title'),
            'url' => route('props.index'),
            'options' => [
                [
                    'option' => trans('common.back'),
                    'url' => route('props.index')
                ],
            ]
        ])

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="text-center">Reporte de @lang('props.title')</h2>

                <div class="alert alert-info alert-important alert-dismissible fade show" role="alert">
                    <b>Importante!</b> Puedes elegir un hotel en específico, o simplemente indicas las fechas para consultar todos los hoteles
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('props.report.export') }}" method="POST">
                    @csrf()

                    <div class="form-group{{ $errors->has('hotel') ? ' has-error' : '' }}">
                        <label for="pwd">@lang('hotels.title'):</label>
                        <select class="form-control selectpicker" title="{{ trans('common.optional') }}" name="hotel" id="hotel">
                            @foreach ($hotels as $hotel)
                                <option value="{{ Hashids::encode($hotel->id) }}">{{ $hotel->business_name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('hotel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hotel') }}</strong>
                            </span>
                        @endif
                    </div>

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

                    <button type="submit" class="btn btn-primary">Consultar</button>
                    <a href="{{ route('props.index') }}" class="btn btn-default">
                        @lang('common.back')
                    </a>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="spacer-md"></div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.panel')

@section('breadcrumbs')
    {{ Breadcrumbs::render('prop', $prop) }}
@endsection

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('props.title'),
            'url' => route('props.index'),
            'options' => [
                [
                    'option' => trans('common.back'),
                    'url' => url()->previous()
                ],
            ]
        ])

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="text-center">@lang('common.editionOf') @lang('props.title')</h2>
                <form action="{{ route('props.update', ['id' => id_encode($prop->id)]) }}" method="POST">
                    @csrf()
                    @method('PUT')
                    {{-- <input type="hidden" name="hotel" id="hotel" value="{{ id_encode($prop->hotel->id) }}"> --}}
                    <div class="form-group{{ $errors->has('hotel') ? ' has-error' : '' }}">
                        <label for="hotel">Hotel:</label>
                        <select class="form-control selectpicker" title="{{ trans('common.chooseOption') }}" name="hotel" id="hotel" required>
                            <option value="{{ id_encode($prop->hotel->id) }}" selected>{{ $prop->hotel->business_name }}</option>
                        </select>

                        @if ($errors->has('hotel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hotel') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">@lang('common.description'):</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $prop->description }}" required maxlength="191" placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">@lang('common.price'):</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ $prop->price }}" min="1" required placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('common.update')</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">
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

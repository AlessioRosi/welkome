<!-- header -->
<div class="header">
    <div class="row">
        <div class="col-xs-6 from">
            <span class="d-block font-weight-light">@lang('vouchers.from'):</span>
            <h3>{{ $voucher->hotel->business_name }}</h3>
            <span class="d-block font-weight-light">{{ $voucher->hotel->tin }}</span>
            <span class="d-block font-weight-light">{{ $voucher->hotel->address }}</span>
            <span class="d-block font-weight-light">{{ $voucher->hotel->phone }}</span>
            <span class="d-block font-weight-light">{{ $voucher->hotel->email }}</span>
        </div>
        <div class="col-xs-6 to">
            <span class="d-block font-weight-light">@lang('vouchers.to'):</span>
            <h3> {{ $customer['name'] }}</h3>
            <span class="d-block font-weight-light">{{ $customer['tin'] }}</span>
            <span class="d-block font-weight-light">{{ $customer['address'] ?? trans('common.noData') }}</span>
            <span class="d-block font-weight-light">{{ $customer['phone'] ?? trans('common.noData') }}</span>
            <span class="d-block font-weight-light">{{ $customer['email'] ?? trans('common.noData') }}</span>
        </div>
    </div>
</div>
<!-- end header -->

<!-- note -->
<div class="row mt-4">
    <div class="col-xs-12">
        <p class="text-justify">@lang('vouchers.note')</p>
    </div>
</div>
<!-- end note -->

<!-- items-header -->
<div class="items-header">
    <div class="row mt-4 items-header font-weight-bold">
        <div class="col-xs-12 mx-2">
            <div class="line"></div>
        </div>
        <div class="text-uppercase col-xs-6">@lang('common.description')</div>
        <div class="text-uppercase col-xs-2 text-center">@lang('common.price')</div>
        <div class="text-uppercase col-xs-2 text-center">@lang('common.quantity')</div>
        <div class="text-uppercase col-xs-2 text-right">TOTAL</div>
        <div class="text-uppercase col-xs-12 mx-2">
            <div class="line"></div>
        </div>
    </div>
</div>
<!-- end items-header -->
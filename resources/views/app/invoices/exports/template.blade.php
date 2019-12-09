<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('invoices.invoice')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ config('app.url') . '/css/pdf.css' }}">
    <style>
        h1, .h1, h2, .h2, h3, .h3 {
            margin-top: 10px !important;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .mt-2 {
            margin-top: 10px;
        }
        .mt-4 {
            margin-top: 20px;
        }

        .mb-2 {
            margin-bottom: 20px;
        }
        .mb-4 {
            margin-bottom: 20px;
        }

        .my-2 {
            margin: 0 10px;
        }

        .my-4 {
            margin: 0 20px;
        }

        .mx-2 {
            margin: 10px 0;
        }

        .mx-4 {
            margin: 20px 0;
        }

        .py-2 {
            padding: 0 10px;
        }

        .py-4 {
            padding: 0 20px;
        }

        .d-block {
            display: block;
        }

        .font-weight-light {
            font-weight: 100;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .line {
            border-bottom: 2px solid #000;
            width: 100%;
        }

        .line-light {
            width: 100%;
            border-bottom: 1px solid #949597;
        }

        .line-end {
            width: 100%;
            border-bottom: 2px solid #f0c29e;
        }

        .data {
            background-color: #dcdddf;
        }

        .data .data-box {
            margin-top: 60px;
        }

        .data .data-box .data-separator {
            border-top: 1px solid #949597;
            width: 10%;
        }

        .content {
            background-color: #f1f1f1;
        }

        .without-margin {
            margin: 0 !important;
        }

        .qr-code {
            margin: 0 auto;
            display: block;
        }

        /* To break in pages, please use this class */
        .page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }

        .row-equal {
            display: table;
        }

        .row-equal .col-equal {
            float: none;
            display: table-cell;
            vertical-align: top;
        }

        .spacer-lg {
            margin: 20px;
            display: block;
        }
    </style>
</head>
<body>
    <div id="app" class="container invoice page">
        <div class="row row-equal">
            <!-- data -->
            <div class="col-xs-4 data py-4 col-equal">
                <div class="spacer-lg">&nbsp;</div>
                <div class="line mb-4"></div>
                <h1 class="text-uppercase">@lang('invoices.invoice')</h1>

                <div class="data-box">
                    <div class="data-separator d-block"></div>
                    <h4 class="text-muted font-weight-light">No.</h4>
                    <h4 class="font-weight-bold">{{ $invoice->number }}</h4>
                </div>
                <div class="data-box">
                    <div class="data-separator d-block"></div>
                    <h4 class="text-muted font-weight-light">@lang('common.date')</h4>
                    <h4 class="font-weight-bold">{{ $invoice->created_at->format('Y-m-d') }}</h4>
                </div>
                <div class="data-box">
                    <h5 class="font-weight-bold">TERMS</h5>
                    <p>Mollit elit reprehenderit consectetur cupidatat anim qui deserunt duis. Veniam laboris id veniam in eu.</p>
                </div>
                <div class="data-box">
                    <h5 class="font-weight-bold">PAYMENT METHODS</h5>
                    <h6 class="font-weight-light">PAYPAL</h6>
                    <p>paypal@example.com</p>
                    <h6 class="font-weight-light">ACCOUNTING NUMBER</h6>
                    <p>1234567890988</p>
                    <h6 class="font-weight-light">QR CODE</h6>
                    <img src="{{ asset('/images/qr.png') }}" alt="" class="img-fluid qr-code">
                </div>
                <div class="data-box align-text-bottom">
                    <h1 class="font-weight-bold text-center">{{ $invoice->hotel->business_name }}</h1>
                </div>
            </div>
            <!-- end data -->

            <!-- content -->
            <div class="col-xs-8 content py-4 col-equal">
                <div class="spacer-lg">&nbsp;</div>
                <div class="line mb-4"></div>
                <!-- header -->
                <div class="header">
                    <div class="row">
                        <div class="col-xs-6 from">
                            <span class="d-block font-weight-light">@lang('invoices.from'):</span>
                            <h3>{{ $invoice->hotel->business_name }}</h3>
                            <span class="d-block font-weight-light">{{ $invoice->hotel->tin }}</span>
                            <span class="d-block font-weight-light">{{ $invoice->hotel->address }}</span>
                            <span class="d-block font-weight-light">{{ $invoice->hotel->phone }}</span>
                            <span class="d-block font-weight-light">{{ $invoice->hotel->email }}</span>
                        </div>
                        <div class="col-xs-6 to">
                            <span class="d-block font-weight-light">@lang('invoices.to'):</span>
                            <h3> {{ $customer['name'] }}</h3>
                            <span class="d-block font-weight-light">{{ $customer['tin'] }}</span>
                            <span class="d-block font-weight-light">{{ $customer['address'] ?? trans('common.noData') }}</span>
                            <span class="d-block font-weight-light">{{ $customer['phone'] ?? trans('common.noData') }}</span>
                            <span class="d-block font-weight-light">{{ $customer['address'] ?? trans('common.noData') }}</span>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <!-- note -->
                <div class="row mt-4">
                    <div class="col-xs-12">
                        <p class="text-justify">@lang('invoices.note')</p>
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

                <!-- items -->
                <div class="items">
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-6">
                            <p class="without-margin">Item of the invoice</p>
                            <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">$ 2.000</div>
                        <div class="col-xs-2 text-center">2</div>
                        <div class="col-xs-2 text-right">$ 4.000</div>
                    </div>
                </div>
                <!-- end items -->

                <!-- values -->
                <div class="values">
                    <div class="row">
                        <div class="col-xs-12 mx-2">
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-10 font-weight-bold">
                            SUBTOTAL
                        </div>
                        <div class="col-xs-2 text-right font-weight-bold">$ 24.000</div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-10">
                            Discount 10%
                        </div>
                        <div class="col-xs-2 text-right">-($ 2.400)</div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-10">
                            Taxes 19%
                        </div>
                        <div class="col-xs-2 text-right">$ 4.104</div>
                        <div class="col-xs-12 mx-2">
                            <div class="line-end"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-xs-9">
                            <h3 class="font-weight-bold">TOTAL</h3>
                        </div>
                        <div class="col-xs-3 text-right">
                            <h3 class="font-weight-bold">$ 25.704</h3>
                        </div>
                    </div>
                </div>
                <!-- end values -->

                <!-- signature -->
                <div class="signature my-4">
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-8 text-right">
                            <img src="{{ asset('/images/hj.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-xs-12 text-right">
                            <h4 class="font-weight-bold">Jhon Doe</h4>
                            <span class="d-block font-weight-light">CEO</span>
                        </div>
                    </div>
                </div>
                <!-- end signature -->

                <!-- gratitude -->
                <div class="gratitude text-center my-4">
                    <p class="text-muted">If you have any question about this invoice, please contact Jhon Doe to email jhon@mycompany.com, or to the mobile phone (057) 310 671 3456.</p>
                    <h3>Thank you</h3>
                </div>
                <!-- end gratitude -->

                <!-- pagination -->
                <div class="invoice-pagination text-right">
                    <p class="text-muted text-right">Page 1 of 1</p>
                </div>
                <!-- end pagination -->
            </div>
            <!-- end content -->
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ config('app.url') . '/js/app.js' }} "></script>
</body>
</html>

@include('Admin.layout.head')
<body data-topbar="dark">
<div id="layout-wrapper">
    @include('Admin.layout.navbar')
    @include('Admin.layout.sidebar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Invoice</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                                    <li class="breadcrumb-item active">Invoice</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                Invoice <strong>{{ $order->created_at->format('d M Y') }}</strong>
                                <span class="float-right">
                                    <strong>Status:</strong>
                                    @if($order->status == 0)
                                        Pending
                                    @elseif($order->status == 1)
                                        Complete
                                    @else
                                        Unknown
                                    @endif
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>From:</h6>
                                        <div><strong>Webz Poland</strong></div>
                                        <div>Madalinskiego 8</div>
                                        <div>71-101 Szczecin, Poland</div>
                                        <div>Email: info@webz.com.pl</div>
                                        <div>Phone: +48 444 666 3333</div>
                                    </div>
                                   <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
    <h6>To:</h6>
    <div><strong>{{ $order->user->name ?? 'N/A' }}</strong></div>
    <div>{{ $order->user->zip ?? 'N/A' }}</div>
    <div>{{ $order->user->address ?? 'N/A' }}</div>
    <div>{{ $order->user->town ?? 'N/A' }}</div>
    <div>{{ $order->user->state ?? 'N/A' }}</div>
    <div>Email: {{ $order->user->email ?? 'N/A' }}</div>
    <div>Phone: +{{ $order->user->number ?? 'N/A' }}</div>
</div>

                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                        <div class="row align-items-center">
                                            <div class="col-sm-9">
                                                <div class="brand-logo mb-3">
                                                    <img class="logo-abbr me-2" width="50" src="{{asset('public/admin/images/logo.png')}}" alt="">
                                                    <img class="logo-compact" width="110" src="{{asset('public/admin/images/logo-text.png')}}" alt="">
                                                </div>
                                                <span>Please send exact amount: <strong class="d-block">₹ {{ $order->price }}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th class="right">Unit Cost</th>
                                                <th class="center">Qty</th>
                                                <th class="right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->cartOrders as $key => $cart)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $cart->product->name ?? 'N/A' }}</td>
                                                <td>{{ $cart->product->description ?? 'N/A' }}</td>
                                                <td class="right">₹ {{ $cart->price }}</td>
                                                <td class="center">{{ $cart->quantity }}</td>
                                                <td class="right">₹ {{ $cart->price * $cart->quantity }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"></div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong>Subtotal</strong></td>
                                                    <td class="right">₹ {{ $order->price }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong>Total</strong></td>
                                                    <td class="right"><strong>₹ {{ $order->price }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->

        @include('Admin.layout.footer')
    </div>
</div>

@include('Admin.layout.rightsidebar')
@include('Admin.layout.footjs')
</body>
</html>

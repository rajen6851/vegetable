@include('User.layout.head')
<body>
    @include('User.layout.header')
    
    <main class="main__content_wrapper">
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">My Account</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->
        
        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <!-- Sidebar Navigation -->
                    <div class="account__left--sidebar">
                        <div class="user__profile--card text-center mb-4">
                            <div class="user__avatar mb-3">
                                <div class="avatar__circle">
                                    <span class="avatar__initials">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <h3 class="user__name h4 mb-2">{{ Auth::user()->name }}</h3>
                            <p class="user__email text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <ul class="account__menu">
                            <li class="account__menu--list active">
                                <a href="my-account-2.html" class="d-flex align-items-center">
                                    <i class="fas fa-user-circle me-3"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="account__menu--list">
                                <a href="my-account.html" class="d-flex align-items-center">
                                    <i class="fas fa-tachometer-alt me-3"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="account__menu--list">
                                <a href="wishlist.html" class="d-flex align-items-center">
                                    <i class="fas fa-heart me-3"></i>
                                    <span>Wishlist</span>
                                </a>
                            </li>
                            <li class="account__menu--list">
                                <form action="{{Route('logout')}}" method="POST">
                                    @csrf
                                    <button class="btn btn-link p-0 m-0 align-baseline d-flex align-items-center w-100 text-start" type="submit">
                                        <i class="fas fa-sign-out-alt me-3"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Main Content Area -->
                    <div class="account__wrapper">
                        <div class="account__content">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2 class="account__content--title h3 mb-0">Profile Details</h2>
                                <button class="btn btn-outline-primary btn-sm" type="button">
                                    <i class="fas fa-edit me-2"></i>Edit Profile
                                </button>
                            </div>
                            
                            <div class="profile__info--card border-radius-15 p-4 mb-4 shadow-sm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-muted small">Full Name</label>
                                        <p class="mb-0 fw-medium">{{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-muted small">Email Address</label>
                                        <p class="mb-0 fw-medium">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-muted small">Phone Number</label>
                                        <p class="mb-0 fw-medium">+1 234 567 890</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-muted small">Member Since</label>
                                        <p class="mb-0 fw-medium">{{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="address__section mb-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="h4 mb-0">Address Book</h3>
                                    <button class="new__address--btn btn btn-primary" type="button">
                                        <i class="fas fa-plus me-2"></i>Add New Address
                                    </button>
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="address__card border-radius-15 p-3 shadow-sm h-100">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h5 class="mb-0">Home Address</h5>
                                                <span class="badge bg-primary">Default</span>
                                            </div>
                                            <p class="mb-2">
                                                123 Main Street<br>
                                                Apt 4B<br>
                                                New York, NY 10001<br>
                                                United States
                                            </p>
                                            <div class="address__actions d-flex gap-2 mt-3">
                                                <button class="btn btn-outline-secondary btn-sm">Edit</button>
                                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="address__card border-radius-15 p-3 shadow-sm h-100">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h5 class="mb-0">Work Address</h5>
                                            </div>
                                            <p class="mb-2">
                                                456 Business Ave<br>
                                                Floor 10<br>
                                                New York, NY 10005<br>
                                                United States
                                            </p>
                                            <div class="address__actions d-flex gap-2 mt-3">
                                                <button class="btn btn-outline-secondary btn-sm">Edit</button>
                                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->

        <!-- Start My Orders Section -->
        <section class="my__orders--section section--padding bg-light">
            <div class="container">
                <div class="orders__wrapper border-radius-15 p-4 shadow-sm bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="orders__title h3 mb-0">Recent Orders</h2>
                        <a href="#" class="btn btn-link text-decoration-none">View All Orders</a>
                    </div>

                    

                    @if(isset($orders) && $orders->count() > 0)
                        <div class="row g-4">
                            @foreach($orders as $order)
                            
                                <div class="col-lg-6 col-md-12">
                                    <div class="order__card border-radius-15 p-3 shadow-sm h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h5 class="order__id mb-1">Order #{{ $order->id }}</h5>
                                                <p class="order__date mb-0 text-muted small">Placed: {{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</p>
                                            </div>
                                            <span class="order__status badge 
                                                @if($order->status=='Delivered') bg-success
                                                @elseif($order->status=='Pending') bg-warning
                                                @elseif($order->status=='Cancelled') bg-danger
                                                @else bg-primary @endif">
                                                {{ $order->status }}
                                            </span>
                                        </div>
                                        
                                        {{-- <div class="order__items mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="order__item--image me-2">
                                                    <div class="placeholder-img bg-light rounded" style="width: 40px; height: 40px;"></div>
                                                </div>
                                                <div class="order__item--details">
                                                    {
                                                    <p class="mb-0 small fw-medium">
    Product Name: {{ optional($order->product)->name ?? 'Product not available' }}
</p>

                                                    <p class="mb-0 small text-muted">Qty: 1</p>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="order__items mb-3">

   @foreach($order->carts as $item)
<div class="d-flex align-items-center mb-2">
    <div class="order__item--image me-2">
        <img src="{{ asset('assets/images/product/' . $item->product->image) }}" 
             alt="{{ $item->product->name }}" 
             class="rounded" 
             style="width: 40px; height: 40px; object-fit: cover;">
    </div>

    <div class="order__item--details">
        <p class="mb-0 small fw-medium">
            Product: {{ $item->product->name }}
            Weight: {{$item->product->unit}}
        </p>
        <p class="mb-0 small text-muted">Qty: {{ $item->quantity }}</p>
    </div>
</div>
@endforeach

</div>

                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-bold">₹{{ number_format($order->price, 2) }}</p>
                                            <div class="order__actions">
                                                <a href="" class="btn btn-outline-primary btn-sm me-2">View Details</a>
                                                <a href="" class="btn btn-primary btn-sm">Reorder</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="empty__state mb-4">
                                <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                                <h4 class="mb-2">No Orders Yet</h4>
                                <p class="text-muted mb-4">You haven't placed any orders yet. Start shopping to see your orders here.</p>
                                <a href="#" class="btn btn-primary">Start Shopping</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- End My Orders Section -->

        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping1.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping2.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">Visa, Paypal, Master</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping3.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">30 day guarantee</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping4.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Support</h2>
                            <p class="shipping__items2--content__desc">Support every time</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->
    </main>

    <!-- Footer Area Start -->
    @include('User.layout.footer')
    <!-- Footer Area End -->

    @include('User.layout.footjs')

    <style>
        /* Custom Styles for Improved Design */
        .account__left--sidebar {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            width: 280px;
            flex-shrink: 0;
            margin-right: 30px;
        }
        
        .account__wrapper {
            flex-grow: 1;
        }
        
        .user__profile--card {
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .avatar__circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        
        .avatar__initials {
            font-size: 28px;
            font-weight: bold;
            color: white;
        }
        
        .account__menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .account__menu--list {
            margin-bottom: 10px;
        }
        
        .account__menu--list a,
        .account__menu--list button {
            display: block;
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            color: #495057;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            background: transparent;
            text-align: left;
        }
        
        .account__menu--list a:hover,
        .account__menu--list button:hover {
            background-color: #e9ecef;
            color: #495057;
        }
        
        .account__menu--list.active a {
            background-color: #007bff;
            color: white;
        }
        
        .profile__info--card {
            background: white;
        }
        
        .address__card {
            background: white;
            transition: transform 0.3s ease;
        }
        
        .address__card:hover {
            transform: translateY(-5px);
        }
        
        .order__card {
            background: white;
            transition: transform 0.3s ease;
        }
        
        .order__card:hover {
            transform: translateY(-5px);
        }
        
        .empty__state {
            max-width: 400px;
            margin: 0 auto;
        }
        
        @media (max-width: 991px) {
            .my__account--section__inner {
                flex-direction: column;
            }
            
            .account__left--sidebar {
                width: 100%;
                margin-right: 0;
                margin-bottom: 30px;
            }
        }
    </style>
</body>
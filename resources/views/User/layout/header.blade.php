  <!-- Start preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    
                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                </div>
            </div>	

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- End preloader -->

<!-- Start header area -->
    <header class="header__section header__transparent">
        {{-- <div class="header__topbar bg__primary">
            <div class="container">
                <div class="header__topbar--inner d-flex align-items-center justify-content-center">
                    <div class="header__shipping">
                        <p class="header__shipping--text text-white"><img class="header__shipping--icon" src="assets/img/icon/car.png" alt="header-shipping-img"> Claim your online FREE Delivery or Shipping today! Expires in</p>
                    </div>
                    <div class="header__topbar--countdown d-flex" data-countdown="Sep 30, 2022 00:00:00"></div>
                </div>
            </div>
        </div> --}}
<div class="header__topbar bg-gradient-to-r from-green-500 to-emerald-600 py-2 shadow-sm">
  <div class="container">
    <div class="header__topbar--inner d-flex align-items-center justify-content-between flex-wrap text-white">
      <!-- Left: Shipping Offer -->
      <div class="d-flex align-items-center gap-2">
        <img class="header__shipping--icon" src="assets/img/icon/car.png" alt="Free Shipping" style="width: 24px;">
        <p class="mb-0 fw-semibold">
          🚚 <span class="text-yellow-200">Free Delivery</span> on all orders today! Offer ends in:
        </p>
      </div>

      <!-- Right: Countdown Timer -->
      <div class="header__topbar--countdown d-flex align-items-center gap-2 fw-bold" data-countdown="Dec 31, 2025 23:59:59">
        <div class="countdown__item"><span class="days">00</span><small>d</small></div>
        <div class="countdown__item"><span class="hours">00</span><small>h</small></div>
        <div class="countdown__item"><span class="minutes">00</span><small>m</small></div>
        <div class="countdown__item"><span class="seconds">00</span><small>s</small></div>
      </div>
    </div>
  </div>
</div>

<style>
.header__topbar {
  background: linear-gradient(90deg, #22c55e, #059669);
  color: #fff;
  font-size: 15px;
}

/* Countdown items visible fix */
.header__topbar--countdown .countdown__item {
  background: rgba(255, 255, 255, 0.25); /* Light overlay background */
  color: #000; /* Black text for clear visibility */
  padding: 4px 10px;
  border-radius: 6px;
  text-align: center;
  font-weight: 700;
  min-width: 38px;
}

/* Small unit text styling */
.header__topbar--countdown .countdown__item small {
  display: block;
  font-size: 10px;
  color: #111;
}
</style>

<script>
document.querySelectorAll("[data-countdown]").forEach(function(el) {
  const targetDate = new Date(el.getAttribute("data-countdown")).getTime();
  const days = el.querySelector(".days");
  const hours = el.querySelector(".hours");
  const minutes = el.querySelector(".minutes");
  const seconds = el.querySelector(".seconds");

  setInterval(() => {
    const now = new Date().getTime();
    const diff = targetDate - now;
    if (diff <= 0) return;

    days.textContent = Math.floor(diff / (1000 * 60 * 60 * 24));
    hours.textContent = Math.floor((diff / (1000 * 60 * 60)) % 24);
    minutes.textContent = Math.floor((diff / (1000 * 60)) % 60);
    seconds.textContent = Math.floor((diff / 1000) % 60);
  }, 1000);
});
</script>


        <div class="main__header header__sticky">
            <div class="container">
                <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                            <span class="visually-hidden">Offcanvas Menu Open</span>
                        </a>
                    </div>
                   
                    <div class="main__logo">
  <h1 class="main__logo--title">
    <a class="main__logo--link" href="{{ Route('user_home') }}">
      <img 
        class="main__logo--img" 
        src="{{ asset('assets/img/product/WhatsApp Image 2025-10-29 at 4.14.28 PM.jpeg') }}" 
        alt="logo-img" 
        style="height: 70px; width: auto;"
      >
    </a>
  </h1>
</div>

              
<div class="header__search--widget d-none d-lg-block header__sticky--none">
    <form class="d-flex header__search--form" action="javascript:void(0);">
        <div class="header__select--categories select">
            <select name="categories" id="category-select" class="header__select--inner">
                <option value="">All Categories</option>
                @php
                    $categories = DB::table('categories')->get();
                @endphp
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="header__search--box position-relative">
            <input id="live-search" class="header__search--input" placeholder="Search Product" type="text" autocomplete="off">
            <div id="search-results" class="search-results"></div>
        </div>
        {{-- <button type="button" class="header__search--button bg__secon
        dary text-white">Search</button> --}}
    </form>
</div>
<style>
    .header__search--box { position: relative; }

#search-results {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #fff;
    border: 1px solid #ccc;
    z-index: 999;
    display: none;
    max-height: 300px;
    overflow-y: auto;
}

.search-result-list { list-style: none; margin: 0; padding: 0; }

.search-result-list li {
    padding: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.search-result-list li img { margin-right: 10px; border-radius: 4px; }

.search-result-list li:hover { background-color: #f1f1f1; }

#search-results p { margin: 10px; color: #777; }

</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {

    // Step 5a: Debug keyup
    $('#live-search').on('keyup', function(){
        console.log("Typing:", $(this).val());
    });

    function fetchProducts() {
        let query = $('#live-search').val();
        let category = $('#category-select').val();

        if(query.length > 0){
            $.ajax({
                url: "{{ route('searchindex') }}",
                type: "GET",
                data: { search: query, category: category },
                success: function(response){
                    $('#search-results').html(response.html).show();
                },
                error: function(err){
                    console.log("AJAX Error:", err);
                }
            });
        } else {
            $('#search-results').hide();
        }
    }

    $('#live-search').on('keyup', fetchProducts);
    $('#category-select').on('change', fetchProducts);

    // Step 5b: Hide results on clicking outside
    $(document).click(function(e) {
        if(!$(e.target).closest('#live-search, #search-results, #category-select').length){
            $('#search-results').hide();
        }
    });
});
</script>
                    <div class="header__menu d-none d-lg-block header__sticky--block">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{Route('user_home')}}">Home 
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                        </svg>
                                    </a>

                                </li>
                                <li class="header__menu--items mega__menu--items">
                                    <a class="header__menu--link" href="shop.html">Shop 
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                        </svg>
                                    </a>
                                
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="blog.html">Blog 
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{route('contact')}}">Contact </a>  
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__account header__sticky--none">
                        <ul class="d-flex">
                            <li class="header__account--items d-none d-lg-block">
                               
                                @if(Auth::check())
    {{-- Agar user login hai toh My Account par bhejna hai --}}
    <a class="header__account--btn" href="{{ route('myaccount') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512">
            <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" 
                  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
            <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 
                  17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" 
                  fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
        </svg>
        <span class="visually-hidden">My account</span>
    </a>
@else
    {{-- Agar user login nahi hai toh Login par bhejna hai --}}
    <a class="header__account--btn" href="{{ route('login') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512">
            <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" 
                  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
            <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 
                  17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" 
                  fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
        </svg>
        <span class="visually-hidden">Login</span>
    </a>
@endif

                                
                              


                            </li>
                            <li class="header__account--items  header__account--search__items mobile__d--block d-sm-2-none">
                                <a class="header__account--btn search__open--btn" href="javascript:void(0)" data-offcanvas>
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                                    <span class="visually-hidden">Search</span>  
                                </a>
                            </li>
                            <li class="header__account--items">
                                <a class="header__account--btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.706" height="15.534" viewBox="0 0 14.706 13.534">
                                        <g  transform="translate(0 0)">
                                          <g >
                                            <path  data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="#fefefe"/>
                                            <path  data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="#fefefe"/>
                                            <path  data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="#fefefe"/>
                                          </g>
                                        </g>
                                    </svg>  
                                    <span class="items__count">3</span> 
                                </a>
                            </li>
                            <li class="header__account--items d-none d-lg-block">
                                <a class="header__account--btn" href="{{route('wishlist')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557" viewBox="0 0 18.541 15.557">
                                        <path  d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z" transform="translate(-62.498 -132.915)" fill="currentColor"/>
                                    </svg>
                                    <span class="items__count">3</span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__account header__sticky--block">
                        <ul class="d-flex">
                            <li class="header__account--items  header__account--search__items d-sm-2-none">
                                <a class="header__account--btn search__open--btn" href="javascript:void(0)" data-offcanvas>
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                                    <span class="visually-hidden">Search</span>  
                                </a>
                            </li>
                            <li class="header__account--items d-none d-lg-block">
                                <a class="header__account--btn" href="{{route('wishlist')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557" viewBox="0 0 18.541 15.557">
                                        <path  d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z" transform="translate(-62.498 -132.915)" fill="currentColor"/>
                                    </svg>
                                    <span class="items__count">3</span> 
                                </a>
                            </li>
                            <li class="header__account--items d-none d-lg-block">
                                
                                @if(Auth::check())
                                <a class="header__account--btn" href="{{ route('myaccount')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                    <span class="visually-hidden">My account</span> 
                                </a>
                                @else
                                 <a class="header__account--btn" href="{{ route('login')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                    <span class="visually-hidden">My account</span> 
                                </a>
                                @endif

                                


                            </li>
                            <li class="header__account--items">
                                <a class="header__account--btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.706" height="15.534" viewBox="0 0 14.706 13.534">
                                        <g  transform="translate(0 0)">
                                          <g >
                                            <path  data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="#fefefe"/>
                                            <path  data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="#fefefe"/>
                                            <path  data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="#fefefe"/>
                                          </g>
                                        </g>
                                      </svg> 
                                    <span class="items__count">3</span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ✅ Header Bottom -->
<div class="header__bottom bg-dark py-3">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between flex-wrap">

      <!-- ===== Categories Dropdown ===== -->
      <div class="position-relative">
        <button class="btn btn-success d-flex align-items-center gap-2 fw-semibold px-4 py-2 rounded-3" id="categoryToggle">
          <i class="bi bi-grid-3x3-gap"></i> All Categories
          <i class="bi bi-chevron-down ms-2"></i>
        </button>

        <ul class="list-unstyled bg-white shadow-lg rounded-3 position-absolute mt-2 w-100 category-menu" id="categoryMenu">
          @php $categories = DB::table('categories')->get(); @endphp
          @foreach ($categories as $category)
            <li>
              <a href="{{ route('shop', $category->id) }}" class="d-flex align-items-center px-3 py-2 text-dark text-decoration-none category-item">
                <i class="bi bi-tag me-2 text-success"></i> {{ $category->name }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- ===== Navigation ===== -->
      <nav>
        <ul class="d-flex align-items-center gap-4 mb-0 flex-wrap">
          <li><a href="{{ route('user_home') }}" class="nav-link text-white fw-semibold">Home</a></li>
          <li><a href="{{ route('shop') }}" class="nav-link text-white fw-semibold">Shop</a></li>
          <li><a href="{{ route('about') }}" class="nav-link text-white fw-semibold">About</a></li>
          <li><a href="contact.html" class="nav-link text-white fw-semibold">Contact</a></li>
        </ul>
      </nav>

      <!-- ===== Support Info ===== -->
      <div class="d-flex align-items-center gap-4 text-white flex-wrap">
        <div class="d-flex align-items-center gap-2">
          <img src="{{ asset('assets/img/icon/usd-icon.png') }}" width="20" alt="Currency">
          <span>USD</span>
        </div>
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-telephone fs-5"></i>
          <div>
            <small class="d-block text-muted">24/7 Support</small>
            <a href="tel:09786542214" class="text-white text-decoration-none fw-semibold">09 7865 42214</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ✅ CSS -->
<style>
.category-menu {
  display: none;
  z-index: 1000;
  animation: fadeInDown 0.3s ease;
}
.category-item:hover {
  background: #f4f4f4;
}
@keyframes fadeInDown {
  from {opacity: 0; transform: translateY(-10px);}
  to {opacity: 1; transform: translateY(0);}
}
.bg-dark {
  background-color: #1e293b !important;
}
.btn-success {
  background-color: #00a86b;
  border: none;
}
.btn-success:hover {
  background-color: #008a59;
}
.nav-link:hover {
  color: #00a86b !important;
}
</style>

<!-- ✅ JS -->
<script>
document.getElementById('categoryToggle').addEventListener('click', function() {
  let menu = document.getElementById('categoryMenu');
  menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});
</script>


        <!-- Start Offcanvas header menu -->
        <div class="offcanvas__header">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="{{ url('/')}}">
                        <img src="{{url('/')}}" alt="Grocee Logo" width="158" height="36">
                    </a>
                    <button class="offcanvas__close--btn" data-offcanvas>close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="{{Route('user_home')}}">Home</a>
                         
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="shop.html">Shop</a>
                        
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="blog.html">Blog</a>

                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="#">Pages</a>
                        </li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="about.html">About</a></li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="contact.html">Contact</a></li>
                    </ul>
                    <div class="offcanvas__account--items">
                        <a class="offcanvas__account--items__btn d-flex align-items-center" href="login.html">
                            <span class="offcanvas__account--items__icon"> 
                                <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                            </span>
                            <span class="offcanvas__account--items__label">Login / Register</span>
                        </a>
                    </div>
                    <div class="offcanvas__account--currency">
                        <a class="offcanvas__account--currency__menu text-black" href="javascript:void(0)">
                            <img src="assets/img/icon/usd-icon.png" alt="currency">
                            <span>USD</span> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05" viewBox="0 0 9.797 6.05">
                                <path  d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                            </svg>
                        </a>
                        <div class="offcanvas__account--currency__submenu">
                            <ul>
                                <li class="currency__items"><a class="currency__text" href="#">CAD</a></li>
                                <li class="currency__items"><a class="currency__text" href="#">CNY</a></li>
                                <li class="currency__items"><a class="currency__text" href="#">EUR</a></li>
                                <li class="currency__items"><a class="currency__text" href="#">GBP</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Offcanvas header menu -->

        <!-- Start Offcanvas stikcy toolbar -->
        <div class="offcanvas__stikcy--toolbar">
            <ul class="d-flex justify-content-between">
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{Route('user_home')}}">
                    <span class="offcanvas__stikcy--toolbar__icon"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443" viewBox="0 0 22 17"><path fill="currentColor" d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z"></path></svg>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Home</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{Route('shop')}}">
                    <span class="offcanvas__stikcy--toolbar__label">Shop</span>
                    </a>
                </li>
                {{-- <li class="offcanvas__stikcy--toolbar__list ">
                    <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)" data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>   
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Search</span>
                    </a>
                </li> --}}
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.51" height="15.443" viewBox="0 0 18.51 15.443">
                            <path  d="M79.963,138.379l-13.358,0-.56-1.927a.871.871,0,0,0-.6-.592l-1.961-.529a.91.91,0,0,0-.226-.03.864.864,0,0,0-.226,1.7l1.491.4,3.026,10.919a1.277,1.277,0,1,0,1.844,1.144.358.358,0,0,0,0-.049h6.163c0,.017,0,.034,0,.049a1.277,1.277,0,1,0,1.434-1.267c-1.531-.247-7.783-.55-7.783-.55l-.205-.8h7.8a.9.9,0,0,0,.863-.651l1.688-5.943h.62a.936.936,0,1,0,0-1.872Zm-9.934,6.474H68.568c-.04,0-.1.008-.125-.085-.034-.118-.082-.283-.082-.283l-1.146-4.037a.061.061,0,0,1,.011-.057.064.064,0,0,1,.053-.025h1.777a.064.064,0,0,1,.063.051l.969,4.34,0,.013a.058.058,0,0,1,0,.019A.063.063,0,0,1,70.03,144.853Zm3.731-4.41-.789,4.359a.066.066,0,0,1-.063.051h-1.1a.064.064,0,0,1-.063-.051l-.789-4.357a.064.064,0,0,1,.013-.055.07.07,0,0,1,.051-.025H73.7a.06.06,0,0,1,.051.025A.064.064,0,0,1,73.76,140.443Zm3.737,0L76.26,144.8a.068.068,0,0,1-.063.049H74.684a.063.063,0,0,1-.051-.025.064.064,0,0,1-.013-.055l.973-4.357a.066.066,0,0,1,.063-.051h1.777a.071.071,0,0,1,.053.025A.076.076,0,0,1,77.5,140.448Z" transform="translate(-62.393 -135.3)" fill="currentColor"/>
                            </svg> 
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                        <span class="items__count">3</span> 
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{route('wishlist')}}">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557" viewBox="0 0 18.541 15.557">
                            <path  d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z" transform="translate(-62.498 -132.915)" fill="currentColor"/>
                            </svg> 
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Wishlist</span>
                        <span class="items__count">3</span> 
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Offcanvas stikcy toolbar -->

        <!-- Start offCanvas minicart -->
        <div class="offCanvas__minicart">
            <div class="minicart__header ">
                <div class="minicart__header--top d-flex justify-content-between align-items-center">
                    <h3 class="minicart__title"> Shopping Cart</h3>
                    <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                    </button>
                </div>
                <p class="minicart__header--desc">The organic foods products are limited</p>
            </div>
            <div class="minicart__product">
                @foreach($carts as $cart)
                <div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        {{-- <a href="product-details.html"><img src="assets/img/product/product1.png" alt="prduct-img"></a> --}}
                         <a href="{{ url('/productdetail/' . $cart->product_id) }}"><img class="border-radius-5" src="{{asset('assets/images/Product/' . $cart->product_img)}}" alt="cart-product"></a>
                    </div>

                    

                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.html">{{$cart->product_name}}</a></h4>
                        <span class="color__variant"><b>Size:</b> {{$cart->product_weight}}</span>
                        <div class="minicart__price">
                            <span class="current__price">{{$cart->price}}</span>
                            <span class="old__price">$140.00</span>
                            
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                <label>
                                    <input type="number" class="quantity__number" value="1" data-counter />
                                </label>
                                <button type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button>
                            </div>
                            <button class="minicart__product--remove" type="button">Remove</button>
                        </div>
                    </div>                 
                </div>
                @endforeach
            </div>
            <div class="minicart__amount">
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Sub Total:</span>
                    <span><b>$240.00</b></span>
                </div>
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Total:</span>
                    <span><b>$240.00</b></span>
                </div>
            </div>
            <div class="minicart__conditions text-center">
                <input class="minicart__conditions--input" id="accept" type="checkbox">
                <label class="minicart__conditions--label" for="accept">I agree with the <a class="minicart__conditions--link" href="privacy-policy.html">Privacy Policy</a></label>
            </div>
            <div class="minicart__button d-flex justify-content-center">
                <a class="btn minicart__button--link" href="{{Route('cart')}}">View cart</a>
                <a class="btn minicart__button--link" href="checkout.html">Checkout</a>
            </div>
        </div>
        <!-- End offCanvas minicart -->

        <!-- Start serch box area -->
        <div class="predictive__search--box ">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Search Products</h2>
                <form class="predictive__search--form" action="#">
                    <label>
                        <input class="predictive__search--input" placeholder="Search Here" type="text">
                    </label>
                    <button class="predictive__search--button" aria-label="search button"><svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  </button>
                </form>
            </div>
            <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas>
                <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
        <!-- End serch box area -->
        
    </header>
    <!-- End header area -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{url('/')}}" class="logo">
                        <img style="width:140px;height:90px;"  src="/logo/logo.jpg">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{url('/')}}" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#men">Men's</a></li>
                        <li class="scroll-to-section"><a href="#women">Women's</a></li>
                        <li class="scroll-to-section"><a href="#kids">Kid's</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Pages</a>
                            <ul>
                                <li><a href="{{url('/about_us')}}">About Us</a></li>
                                <li><a href="{{url('all_products')}}">Products</a></li>

                                <li><a href="{{url('/contact_us')}}">Contact Us</a></li>
                            </ul>
                        </li>
                        @auth
                        <li class="scroll-to-section"><a href="{{url('/view_cart')}}" class="fa fa-shopping-cart">[{{$cartCount}}]</a></li>
                      @endauth
                      @guest
                      <li class="scroll-to-section"><a href="{{url('/view_cart')}}" class="fa fa-shopping-cart">[0]</a></li>
                      @endguest

                        <li class="scroll-to-section"><a href="#explore">Explore</a></li>
                        @guest
                        <li class="scroll-to-section"><a href="{{url('/login')}}">login</a></li>
                        <li class="scroll-to-section"><a href="{{url('/register')}}">sign up</a></li>
                      @endguest
                        @auth
                        <li class="scroll-to-section nav-link">
                          <x-app-layout>

                          </x-app-layout>
                        </li>
                        @endauth
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

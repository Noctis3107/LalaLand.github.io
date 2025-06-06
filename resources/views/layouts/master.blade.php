<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flora Store</title>
    <link rel="shortcut icon" type="image/skullpanda.jpg" href="{{ asset('frontend/img/SKULLPAND3.jpg')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/bsgrid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />  


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

</head>
<body>
    <div class="header">
            
        <div class="navbar">
            <div class="navbar__left">
                <a href="{{ URL::to('/')}}" class="navbar__logo">
                    <img src="{{ asset('\frontend\img\z6620491768350_1e18aff329e2c90bbba82145fbc87f4d.jpg') }}" alt="">
                </a>

                <div class="navbar__menu">
                    <i id="bars" class="fa fa-bars" aria-hidden="true"></i>
                    <ul>
                        <li><a href="{{ URL::to('/')}}">TRANG CHỦ </a></li>
                        <li><a href="{{ URL::to('/All')}}">SẢN PHẨM </a></li>
                        <li>
                            <a href="{{ URL::to('/danhmuc')}}">DANH MỤC </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/tintuc')}}">TIN TỨC </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="navbar__center">
                <form action="{{route('search')}}" method="GET" class="navbar__search">
                    <input type="text" value="" placeholder="Nhập để tìm kiếm..." name="tukhoa" class="search" required>
                    <i class="fa fa-search" id="searchBtn"></i>
                </form>
            </div>

             <div class="navbar__right">

                @if (Auth::check())
                <!-- Hiển thị nút logout -->

                {{-- <span class="mr-2">{{Auth::user()->hoten}}</span> --}}
                <a href="{{ URL::to('/donhang')}}" style="font-size:40px; margin-right:10px;">
                    <i class="fa-brands fa-github" style="color:rgb(115, 179, 164);"></i>
                </a>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="border: none;" type="submit"><i class="fas fa-sign-out-alt text-primary"></i></button>
                    </form>
                </div>
                @else
                    <!-- Hiển thị nút login -->
                    <div class="login">
                        <a href="{{ URL::to('login')}}"><i class="fa fa-user"></i> </a>
                    </div>
                @endif
            
                <a href="{{ route('cart') }}" class="navbar__shoppingCart">
                    <img src="{{ asset('frontend/img/shopping-cart.svg')}}" style="width: 24px;" alt="">
                    
                    @if (session('cart'))
                        <span>{{ count((array) session('cart')) }}</span>
                    @else
                        <span>0</span>
                    
                    @endif
                </a>
            </div> 
            
        </div>

    </div>

    <!-- Content -->  
    @yield('content')

    <div class="go-to-top"><i class="fas fa-chevron-up"></i></div>

   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        //Slider using Slick
        $(document).ready(function () {
            $('.post-wrapper').slick({
                slidesToScroll: 1,
                autoplay: true,
                arrow: true,
                dots: true,
                autoplaySpeed: 5000,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
                appendDots: $(".dot"),
            });
        });

        // Slick mutiple carousel
        $('.post-wrapper2').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.prev2'),
            nextArrow: $('.next2'),
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    
    <script src="{{ asset('frontend/script/script.js') }}"></script>
</body>
</html>

 

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LalaLand</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/img/SKULLPAND3.jpg')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/bsgrid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
<style>
    
    /* Kiểu dáng cơ bản cho menu */
.navbar__menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
}

.navbar__menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.navbar__menu li {
    position: relative;
    margin-right: 5px;
}

.navbar__menu a {
    text-decoration: none;
    color: #333;
    padding: 10px 15px;
    display: inline-block;
}

/* Dropdown menu con */
.dropdown-menu {
    display: none; /* Ẩn menu con mặc định */
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    border: 1px solid #ddd;
    list-style: none;
    padding: 10px 0;
    margin: 0;
    z-index: 1000;
    min-width: 200px;
}

.dropdown-menu li {
    padding: 5px 15px;
}

.dropdown-menu li a {
    text-decoration: none;
    color: #333;
    display: block;
}

/* Hiển thị menu khi hover */
.dropdown:hover .dropdown-menu {
    display: block;
}

/* Hiệu ứng hover */
.dropdown-menu li a:hover {
    color: #007bff;
    background-color: #f5f5f5;
}
</style>
</head>
<body>
    <div class="header">
            
        <div class="navbar">
            <div class="navbar__left">
                <a href="{{ URL::to('/')}}" class="navbar__logo">
                    <img src="{{ asset('frontend/img/z6620491768350_1e18aff329e2c90bbba82145fbc87f4d.jpg') }}" alt="">
                </a>

                <div class="navbar__menu">
                    <i id="bars" class="fa fa-bars" aria-hidden="true"></i>
                    <ul>
                        <li><a href="{{ URL::to('/')}}">TRANG CHỦ </a></li>
                        <li><a href="{{ URL::to('/All')}}">SẢN PHẨM </a></li>
                        
                        <li class="dropdown">
                    <a href="#">DANH MỤC</a>
                     <ul class="dropdown-menu">
                      @foreach ($danhmucs as $danhmuc)
                    <li>
                      <a href="{{ route('danhmuc.show', ['id' => $danhmuc->id_danhmuc]) }}">
                    {{ $danhmuc->ten_danhmuc }}
                       </a>
                    </li>
                      @endforeach
                    </ul>
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
                    <i class="fa-brands fa-github" style="color:rgb(211, 228, 239);"></i>
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
    @yield('content')  <!--include nội dung-->

    <div class="go-to-top"><i class="fas fa-chevron-up"></i></div>

    <footer>
        <div class="footer">
            <div class="footer__title">
                <div class="footer__social">
                    <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a> 
                    <a href="#"><i class="fa-brands fa-telegram"></i></a>
                </div>

                <div class="footer__social">
                        <a href="#"><i class="fa-solid fa-envelope"></i><span>Nhận bản tin mới nhất từ chúng tôi</span></a>
                        <input type="text" name="email" value="" placeholder="Nhập email của bạn" required>
                        <button type="submit">Đăng ký</button>
                </div>
                
            </div>
        </div>
        
        <div class="footer__info">

            <div class="footer__info-content">
                <img class="img_fo" src="{{ asset('frontend/img/logoPHP.jpg') }}" alt="">
                <p><i class="fa-solid fa-location-dot"></i> 12 Chùa Bộc, Đống Đa, Hà Nội</p>
                <p><i class="fa-solid fa-envelope"></i> LalaLand@gmail.com </p>
                <p><i class="fa-solid fa-phone"></i> 0123 456789 </p>
                <!-- <p><i class="fa-solid fa-map-location-dot"></i> Hệ thống cửa hàng </p> -->
                <p><i class="fa-solid fa-map-location-dot"></i><a href="{{ URL::to('/he-thong-cua-hang') }}"> Hệ thống cửa hàng</a></p> 
            </div>

            <div class="footer__info-content">
                <h3>HỖ TRỢ </h3>
                <p><a href="{{ URL::to('/huong-dan-mua-hang') }}">Hướng dẫn mua hàng</a></p>
                <p><a href="{{ URL::to('/huong-dan-giao-nhan') }}">Hướng dẫn giao nhận</a></p>
                <p><a href="{{ URL::to('/huong-dan-thanh-toan') }}">Hướng dẫn thanh toán</a></p>
                <p><a href="{{ URL::to('/dieu-khoan-dich-vu') }}">Điều khoản dịch vụ</a></p>
            </div>

            <div class="footer__info-content">
                <h3>CHÍNH SÁCH </h3>
                <p><a href="{{ URL::to('/chinh-sach-bao-mat') }}">Chính sách bảo mật</a></p>
                <p><a href="{{ URL::to('/chinh-sach-van-chuyen') }}">Chính sách vận chuyển</a></p>
                <p><a href="{{ URL::to('/chinh-sach-doi-tra') }}">Chính sách đổi trả</a></p>
                <p><a href="{{ URL::to('/quy-dinh-su-dung') }}">Quy định sử dụng</a></p>
                </div>

            <div class="footer__info-content">
                <h3>GIỜ MỞ CỬA </h3>
                <p>Từ 9:00 - 21:30 tất cả các ngày <br>(Bao gồm ngày lễ, ngày Tết)</p>
                <h3>GÓP Ý, KHIẾU NẠI </h3>
                <p><i class="fa-solid fa-phone"></i> 0999 000 000  </p>
            </div>
  
        </div>

        <div class="footer__copyright">
            <center> @ Bản quyền thuộc về LalaLand </center>
        </div>
    </footer>
    
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

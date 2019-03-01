<header class="default-header">
    <div class="container">
        <div class="header-wrap">
            <div class="header-top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="#home"><img src="{{asset('styling/user/img/logo.png')}}" alt=""></a>
                </div>
                {{Auth::check() ? "Welcome back, ".ucfirst(auth()->user()->name):null}}
                <div class="main-menubar d-flex align-items-center">
                    <nav class="hide">
                        <a href="#home">Home</a>
                        <a href="#service">Services</a>
                        <a href="#appoinment">Appoinment</a>
                        @if(!Auth::check())
                            <a href="/login">Login</a>
                        @else
                            <a href="{{route('diagnosis.show',auth()->user()->id)}}">History</a>
                            <a href="/logout">Logout</a>
                        @endif
                    </nav>
                    <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
                </div>
            </div>
        </div>
    </div>
</header>
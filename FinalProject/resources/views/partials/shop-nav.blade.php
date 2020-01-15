<nav id="navBackground" class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand logo" href="{{route('index')}}">GEEK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">

            <div class="mr-auto col-md-5">
                <form action="{{route('search')}}" method="POST" role="search">
                <input name="q" id="q" type="text" class="col-md-10" placeholder="search...">
                <button class="btn btn-md btn-dark" type="submit"><i class="fa fa-search"></i></button>
                    {{ csrf_field() }}
                </form>
            </div>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-link"><a href="{{route('products')}}">Shop</a></li>
            <li class="nav-link"><a href="{{route('about')}}">About</a></li>
            <li class="nav-link"><a href="{{route('blog')}}">Blog</a></li>

            @if($user = Auth::user())
                <li class="nav-link"><a href="{{route('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        Cart</a>
                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : "" }}</span>
                <li class="nav-link"><a href="{{route('profile')}}">Profile</a></li>
                </li>
                <form method="POST" action="{{route('sign-out')}}">
                    <li class="nav-link">
                        <button class="btn btn-dark" type="submit">Sign-out</button></li>
                    {{ csrf_field() }}
                </form>

            @else
                <li class="nav-link"><a href="{{route('login')}}">Sign-in</a></li>
                <li class="nav-link"><a href="{{route('sign-up')}}">Sign-up</a></li>
            @endif
        </ul>
    </div>
</nav>

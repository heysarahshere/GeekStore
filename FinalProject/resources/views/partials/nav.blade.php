

<nav id="navBackground" class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand logo" href="{{route('index')}}">GEEK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-link"><a href="{{route('products')}}">Shop</a></li>
            <li class="nav-link"><a href="{{route('about')}}">About</a></li>
            <li class="nav-link"><a href="{{route('blog')}}">Blog</a></li>

            @if($user = Auth::user())
                <li class="nav-link"><a href="{{route('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
                    <span class="badge"></span>{{ Session::has('count') ? "YES"  : ""}}
                </li>

                <li class="nav-link"><a href="{{route('profile')}}">Profile</a></li>
                <form method="POST" action="{{route('sign-out')}}"><li class="nav-link"><button class="btn btn-dark" type="submit">Sign-out</button>{{ csrf_field() }}</li></form>

            @else
                <li class="nav-link"><a href="{{route('login')}}">Sign-in</a></li>
                <li class="nav-link"><a href="{{route('sign-up')}}">Sign-up</a></li>
            @endif
        </ul>
    </div>

</nav>


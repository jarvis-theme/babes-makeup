<header>
    <div id="top-header">
        <div class="info">
            @if ( !is_login() )
            <strong>
                <span class="welcome">Selamat berbelanja, </span><span class="divide"></span>
                <span>{{ HTML::link('member', 'Login',array('class'=>'loginRegLout')) }} |</span><span class="divide"></span>
                <span>{{ HTML::link('member/create', 'Register',array('class'=>'loginRegLout')) }}</span>
            </strong>
            @else
            <strong>
                <span class="welcome">Hai, </span><span class="divide"></span>
                <span>{{ HTML::link('member', user()->nama,array('class'=>'loginRegLout')) }} |<span class="divide"></span>
                <span>{{HTML::link('logout', 'Logout',array('class'=>'loginRegLout'))}}</span>
            </strong>
            @endif
        </div>
        <div id="logo" class="fl">
            @if(logo_image_url())
            <a href="{{url('home')}}">{{HTML::image(logo_image_url(), 'Logo '.Theme::place('title'), array('id'=>'logos'))}}</a>
            @else
            <a href="{{url('home')}}" class="logo-text"><h1>{{ shortText(Theme::place('title'),26) }}</h1></a>
            @endif
        </div>
        <div class="cr"></div>
        <div id="shoppingcartplace">
            {{shopping_cart()}}
        </div>
        <div class="clr"></div>
    </div>
    <nav id="menu" class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand mobile-only" href="#">MENU</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach(main_menu()->link as $key=>$link)
                <li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
                @endforeach
            </ul> 
            <div class="pull-right search-form">
                <form class="navbar-form" role="search" action="{{url('search')}}" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Produk" name="search" required>
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </nav>
    <div class="clr"></div>
</header>
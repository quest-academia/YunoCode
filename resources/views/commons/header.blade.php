<header class="">

    <nav class="navbar navbar-expand-lg navbar-dark bgcolor-blue">
        
        <a class="navbar-brand white-text" href="/">YunoCode</a>

        <button type="button" class="navbar-toggler white-text" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon" ></span>
        </button>       

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item">{!! link_to_route('products.index', '商品一覧', [], ['class' => 'nav-link']) !!}</a></li>
                <li class="nav-item">{!! link_to_route('products.create', '商品登録', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item"><a href="" class="nav-link  white-text">〇〇さん</a></li>
                <li class="nav-item"><a href="" class="nav-link  white-text">ログアウト</a></li>
                <li class="nav-item"><a href="" class="nav-link white-text">ログイン</a></li>
            </ul>
        </div>

    </nav>

</header>
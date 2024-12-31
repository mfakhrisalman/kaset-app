<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-2">
                <div id="fh5co-logo"><a href="/">
                    <img src="{{ asset('logo.png') }}" alt="" width="150">
                </a></div>
            </div>
            <div class="col-md-6 col-xs-6 text-center menu-1">
                <ul>
                    <li class="{{ Request::is('product*') ? 'active' : '' }}"><a href="/product">Produk</a></li>
                    <li class="{{ Request::is('aksesoris*') ? 'active' : '' }}"><a href="/aksesoris">Aksesoris</a></li>
                    <li class="{{ Request::is('profile*') ? 'active' : '' }}"><a href="/profile">Profile</a></li>
                    <li class="{{ Request::is('contact*') ? 'active' : '' }}"><a href="/contact">Kontak</a></li>
                    <li class="{{ Request::is('faq*') ? 'active' : '' }}"><a href="/faq">FAQ</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                <ul>
                    @can('pelanggan')
                    <li><a href="/product/cart" class="cart">
                        <span>
                            <i class="icon-shopping-cart"></i>
                        </span>
                    </a></li>
                    @else
                    <li><a href="/login" class="cart"><span>
                        <i class="icon-shopping-cart"></i>
                    </span></a></li>
                    @endcan
                    @can('pelanggan')
                    <li class="shopping-cart user-dropdown">
                        <a href="#" class="cart"><span><i class="icon-user"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/">Hi, {{auth()->user()->name}}</a></li>
                            <li><a href="/riwayat">Riwayat</a></li>
                            <li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        </ul>
                    </li>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else 
                    <li class="shopping-cart"><a href="/login" class="cart"><span><i class="icon-user"></i></span></a></li>
                    @endcan
                </ul>
            </div>
        </div>
        
    </div>
</nav>

<style>
.user-dropdown {
    position: relative;
}

.user-dropdown .dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 100%; /* Ini bisa diatur agar dropdown lebih dekat dengan ikon */
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Mengurangi tinggi bayangan untuk efek lebih halus */
    border-radius: 4px;
    list-style: none;
    padding: 5px 0; /* Mengurangi padding atas dan bawah */
    margin: 0;
    min-width: 130px;
    z-index: 1000;
}

.user-dropdown .dropdown-menu li {
    padding: 8px 15px; /* Mengurangi padding dalam setiap item dropdown */
    border-bottom: 1px solid #e9ecef;
}

.user-dropdown .dropdown-menu li:last-child {
    border-bottom: none;
}

.user-dropdown .dropdown-menu li a {
    text-decoration: none;
    color: #333;
    display: block;
    padding: 5px;
}

.user-dropdown:hover .dropdown-menu {
    display: block;
}

</style>

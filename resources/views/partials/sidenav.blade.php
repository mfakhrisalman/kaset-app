                <!-- section-menu-left -->
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="index.html" id="site-logo-inner">
                            {{-- <img class="" id="logo_header" alt="" width="160" src="{{ asset('logo.png') }}" data-light="{{ asset('logo.png') }}" data-dark="{{ asset('logo.png') }}" > --}}
                    <img src="{{ asset('logo.png') }}" alt="" width="150">

                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                                    <a href="/dashboard" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('user*') ? 'active' : '' }}">
                                    <a href="/users" class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text">Data User</div>
                                    </a>
                                </li>
                            </ul>                            
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('game*') ? 'active' : '' }}">
                                    <a href="/games" class="">
                                        <div class="icon"><i class="icon-box"></i></div>
                                        <div class="text">Data Game</div>
                                    </a>
                                </li>
                            </ul>                            
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('accessories*') ? 'active' : '' }}">
                                    <a href="/accessories" class="">
                                        <div class="icon"><i class="icon-shopping-bag"></i></div>
                                        <div class="text">Data Aksesoris</div>
                                    </a>
                                </li>
                            </ul>                            
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('transaksi*') ? 'active' : '' }}">
                                    <a href="/transaksi" class="">
                                        <div class="icon"><i class="icon-credit-card"></i></div>
                                        <div class="text">Transaksi</div>
                                    </a>
                                </li>
                            </ul> 
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('daftar-pesanan*') ? 'active' : '' }}">
                                    <a href="/daftar-pesanan" class="">
                                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                                        <div class="text">Daftar Pesanan</div>
                                    </a>
                                </li>
                            </ul>                            
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('kritiksaran*') ? 'active' : '' }}">
                                    <a href="/kritiksaran" class="">
                                        <div class="icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.7727 4.27031C15.025 3.51514 14.1357 2.91486 13.1558 2.50383C12.1758 2.09281 11.1244 1.87912 10.0617 1.875H10C7.84512 1.875 5.77849 2.73102 4.25476 4.25476C2.73102 5.77849 1.875 7.84512 1.875 10V14.375C1.875 14.8723 2.07254 15.3492 2.42417 15.7008C2.77581 16.0525 3.25272 16.25 3.75 16.25H5C5.49728 16.25 5.9742 16.0525 6.32583 15.7008C6.67746 15.3492 6.875 14.8723 6.875 14.375V11.25C6.875 10.7527 6.67746 10.2758 6.32583 9.92417C5.9742 9.57254 5.49728 9.375 5 9.375H3.15313C3.27366 8.07182 3.76315 6.83 4.56424 5.79508C5.36532 4.76016 6.44481 3.97502 7.67617 3.53169C8.90753 3.08836 10.2398 3.0052 11.5167 3.29196C12.7936 3.57872 13.9624 4.22352 14.8859 5.15078C16.0148 6.28539 16.7091 7.78052 16.8477 9.375H15C14.5027 9.375 14.0258 9.57254 13.6742 9.92417C13.3225 10.2758 13.125 10.7527 13.125 11.25V14.375C13.125 14.8723 13.3225 15.3492 13.6742 15.7008C14.0258 16.0525 14.5027 16.25 15 16.25H16.875C16.875 16.7473 16.6775 17.2242 16.3258 17.5758C15.9742 17.9275 15.4973 18.125 15 18.125H10.625C10.4592 18.125 10.3003 18.1908 10.1831 18.3081C10.0658 18.4253 10 18.5842 10 18.75C10 18.9158 10.0658 19.0747 10.1831 19.1919C10.3003 19.3092 10.4592 19.375 10.625 19.375H15C15.8288 19.375 16.6237 19.0458 17.2097 18.4597C17.7958 17.8737 18.125 17.0788 18.125 16.25V10C18.1291 8.93717 17.9234 7.88398 17.5197 6.90077C17.1161 5.91757 16.5224 5.02368 15.7727 4.27031ZM5 10.625C5.16576 10.625 5.32473 10.6908 5.44194 10.8081C5.55915 10.9253 5.625 11.0842 5.625 11.25V14.375C5.625 14.5408 5.55915 14.6997 5.44194 14.8169C5.32473 14.9342 5.16576 15 5 15H3.75C3.58424 15 3.42527 14.9342 3.30806 14.8169C3.19085 14.6997 3.125 14.5408 3.125 14.375V10.625H5ZM15 15C14.8342 15 14.6753 14.9342 14.5581 14.8169C14.4408 14.6997 14.375 14.5408 14.375 14.375V11.25C14.375 11.0842 14.4408 10.9253 14.5581 10.8081C14.6753 10.6908 14.8342 10.625 15 10.625H16.875V15H15Z" fill="#111111"></path>
                                        </svg></div>
                                        <div class="text">Kritik Saran</div>
                                    </a>
                                </li>
                            </ul>
                            {{-- <ul class="menu-list">
                                <li class="menu-item {{ Request::is('laporan-transaksi*') ? 'active' : '' }}">
                                    <a href="/laporan-transaksi" class="">
                                        <div class="icon"><i class="icon-pie-chart"></i></div>
                                        <div class="text">Laporan Transaksi</div>
                                    </a>
                                </li>
                            </ul> --}}
                            <ul class="menu-list">
                                <li class="menu-item has-children {{ Request::is('laporan-pesanan*') || Request::is('laporan-transaksi*') ? 'active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-pie-chart"></i></div>
                                        <div class="text">Laporan Penjualan</div>
                                    </a>
                                    <ul class="sub-menu" style="{{ Request::is('laporan-pesanan*') || Request::is('laporan-transaksi*') ? 'display: block;' : 'display: none;' }}">
                                        <li class="sub-menu-item">
                                            <a href="/laporan-pesanan" class="{{ Request::is('laporan-pesanan*') ? 'active' : '' }}">
                                                <div class="text">Pesanan</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="/laporan-transaksi" class="{{ Request::is('laporan-transaksi*') ? 'active' : '' }}">
                                                <div class="text">Transaksi</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            
                            
                        </div>
                    </div>
                </div>
                <!-- /section-menu-left -->
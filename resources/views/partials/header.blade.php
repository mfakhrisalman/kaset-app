<div class="header-dashboard">
    <div class="wrap">
        <div class="header-left">
            <div class="button-show-hide">
                <i class="icon-menu-left"></i>
            </div>
        </div>
        <div class="header-grid">

            <div class="header-item button-dark-light">
                <i class="icon-moon"></i>
            </div>

            <div class="header-item button-zoom-maximize">
                <div class="">
                    <i class="icon-maximize"></i>
                </div>
            </div>
            <div class="popup-wrap user type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="header-user wg-user">
                            <span class="image">
                                <img src="{{ asset('admin.png') }}" alt="">
                            </span>
                            <span class="flex flex-column">
                                <span class="body-title mb-2">{{auth()->user()->name}}</span>
                                <span class="text-tiny">Admin</span>
                            </span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3" >
                        <li>
                            <a href="#" class="user-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="icon">
                                    <i class="icon-log-out"></i>
                                </div>
                                <button type="submit" class="body-title-2" style="background-color: white;">
                                    Log out
                                </button>
                            </a>
                        
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
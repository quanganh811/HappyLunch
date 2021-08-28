<div>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand shadow topbar static-top" style="background-color: rgb(17, 124, 17)">
                <div class="container-fluid">


                    <div class="avatar">
                        <a href="/">
                            <img src="{{ asset('frontend/img/logo.png') }}" alt="" width="150px" height="70px" />
                        </a>
                    </div>
                    <div>
                        {{-- <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." />
                                <div class="input-group-append">
                                    <button class="btn btn-success py-0" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                    </div>


                    <div>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class=" dropdown-menu dropdown-menu-right p-3 animated--grow-in " role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group">
                                            <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." />
                                            <div class="input-group-append">
                                                <button class="btn btn-success py-0" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1 dropdown-notifications" role="presentation">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="notif-count badge badge-danger badge-counter"></span><i class="fas fa-bell fa-fw f-25"></i></a>
                                    <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                                        <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                                    </a>
                                    <div class="
                                                dropdown-menu
                                                dropdown-menu-right
                                                dropdown-list
                                                dropdown-menu-right
                                                animated--grow-in
                                                " role="menu">
                                        <h6 class="dropdown-header bg-success border-0">Thông báo</h6>
                                        <div class="dropdown-content">
                                        </div>
                                        <!-- <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a> -->
                                    </div>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-white">
                                            @if (Auth::check())
                                            {{ Auth::user()->name }}
                                            @endif
                                        </span>

                                        @if(Auth::user()->image != '')
                                        <img class="border rounded-circle img-profile" src="{{ asset('uploads/user/'.Auth::user()->image) }}"width="60" height="60"  />
                                        @else
                                        <img class="border rounded-circle img-profile" src="{{ asset('frontend/img/user-icon.png') }}" />
                                        @endif
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in " role="menu">
                                        <a class="dropdown-item" role="presentation" href="/info"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Thông tin tài khoản</a>
                                        <a class="dropdown-item" role="presentation" href="/merchant"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Admin</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" role="presentation" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fasfa-sign-out-alt fa-sm fa-fwmr-2text-gray-400"></i>&nbsp;Đăng
                                            xuất</a>

                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<script type="text/javascript">
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('div.dropdown-content');

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("cdc0bda79ea9156d5a97", {
        cluster: "ap1",
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('Notify');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('send-message', function(data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = `
        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="{{asset('uploads/user/` + data.avatar + `')}}" alt="">
                                            </div>
                                            <div>
                                                <span class="small text -gray-500">` + data.time + `</span>
                                                <h6><b>` + data.title + `</b></h6>
                                                <p>` + data.content + `</p>
                                            </div>
                                        </a>

        `;
        notifications.html(newNotificationHtml + existingNotifications);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount + '+');
        notificationsWrapper.show();
    });
</script>
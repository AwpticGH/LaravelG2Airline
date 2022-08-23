<div class="wrapper" id="wrapper">
    <nav>
        <input type="hidden" name="status" id="status" value="">
        <div class="container-flex">
            <div class="brand">
                <a href="/">G2 Airline</a>
            </div>
            <div class="burger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <div class="bg-sidebar"></div>
            <ul class="sidebar">
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#blog">Blog</a></li>
                @auth
                    <!-- logged in -->
                    <li id="trigger-user">
                        <a href="#wrapper" id="nav-user" name="username">{{ auth()->user()->username }}</a>
                        <input type="hidden" name="accountId" value="">
                        <div id="user-panel">
                            <form action="/email/get-verification-link" method="POST">
                                @csrf
                                <button type="submit">Verify Email</button>
                            </form>
                            <form action="/profile" method="GET" onsubmit="">
                                @csrf
                                <button type="Submit">Account</button>
                            </form>
                            <form action="{{ route('reservation.show') }}" method="GET">
                                @csrf
                                <input type="hidden" name="accountId" value="">
                                <button type="Submit">Ticket</button>
                            </form>
                            <form action="/logout" method="POST">
                                @csrf
                                @method('POST')
                                <button type="Submit">Logout</button>
                            </form>
                        </div>
                    </li>
                @else
                    <!-- logged out -->
                    <li id="trigger-login">
                        <a href="login" id="nav-login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>

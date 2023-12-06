<header class="sticky-header" id='header'>
    <div class="flex justify-between items-center w-full">
        <a href="{{url('/')}}" class="flex text-xl font-bold items-center">
            <img src="{{asset('images/logo/app_logo_transparent.png')}}" alt="" class="w-8 md:w-12">
            <div class="px-2">
                <div class="app-title text-lg font-medium">GHSSCB</div>
                <div class="app-subtitle text-xs font-thin">Govt Higher Secondary School Chak Bedi</div>
            </div>
        </a>
        <nav id='navbar' class="navbar">
            <ul>
                <li class="float-right md:hidden" onclick="toggleNavbarMobile()">
                    <!-- close -->
                    <i class="bi-x-lg w-8 h-8 text-slate-300 hover:-rotate-90 transition duration-500 ease-in-out"></i>
                </li>
                <li><a href="{{url('about')}}" class="nav-item">About</a></li>
                <li><a href="{{url('services')}}" class="nav-item">Services</a></li>
                <li><a href="{{url('team')}}" class="nav-item">Team</a></li>
                <li><a href="{{url('blogs')}}" class="nav-item">Blogs</a></li>
                <li><a href="#" class="nav-item">Contact Us</a></li>
                <li><a href="{{url('login')}}" class="nav-item">Login</a></li>
            </ul>
        </nav>

        <button class="md:hidden" onclick="toggleNavbarMobile()">
            <!-- menu -->
            <i class="bi-list text-lg text-slate-100"></i>
        </button>
    </div>
</header>
<script>
    var header = document.getElementById("header");
    window.onscroll = function() {
        if (window.pageYOffset > 5) {
            header.classList.add("scrolled-down");
        } else {
            header.classList.remove("scrolled-down");
        }
    };

    function toggleNavbarMobile() {
        $('#navbar').toggleClass('mobile');
    }
</script>
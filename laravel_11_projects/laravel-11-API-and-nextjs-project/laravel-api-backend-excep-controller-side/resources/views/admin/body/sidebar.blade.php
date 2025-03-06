 <div class="app-sidebar-menu">
<div class="h-100" data-simplebar>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <div class="logo-box">
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
            </span>
        </a>
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="24">
            </span>
        </a>
    </div>

    <ul id="side-menu">

        <li class="menu-title">Menu</li>

       <li>
            <a href="{{ route('dashboard') }}" class="tp-link">
               <i data-feather="home"></i>
                <span> Dashboard </span>
            </a>
        </li>


    

        <!-- <li>
            <a href="landing.html" target="_blank">
                <i data-feather="globe"></i>
                <span> Landing </span>
            </a>
        </li> -->

        <li class="menu-title">Pages</li>

        <li>
            <a href="#sidebarAuth" data-bs-toggle="collapse">
                <i data-feather="users"></i>
                <span> Manage Slider </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarAuth">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('all.slider') }}" class="tp-link">All Slider</a>
                    </li>
                    <li>
                        <a href="{{ route('add.slider') }}" class="tp-link">Add Slider</a>
                    </li>
                     
                </ul>
            </div>
        </li>

        <li>
            <a href="#sidebarError" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Manage Sevices </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarError">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('all.service') }}" class="tp-link">All Service</a>
                    </li>
                    <li>
                        <a href="{{ route('add.service') }}" class="tp-link">Add Service</a>
                    </li>
                    
                </ul>
            </div>
        </li>


         <li>
            <a href="#GateWay" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Manage GateWay </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="GateWay">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('gateway.one') }}" class="tp-link">Gateway One</a>
                    </li>
                    <li>
                        <a href="{{ route('gateway.two') }}" class="tp-link">Gateway Two</a>
                    </li>
                    
                </ul>
            </div>
        </li>


        <li>
            <a href="#Testimonial" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Manage Testimonial </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="Testimonial">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('all.testimonial') }}" class="tp-link">All Testimonial</a>
                    </li>
                    <li>
                        <a href="{{ route('add.testimonial') }}" class="tp-link">Add Testimonial</a>
                    </li>
                    
                </ul>
            </div>
        </li>


         <li>
            <a href="#BlogCategory" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> BlogCategory </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="BlogCategory">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('blog.category') }}" class="tp-link">Blog Category</a>
                    </li> 
                </ul>
            </div>
        </li>

         <li>
            <a href="#BlogPost" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Blog Post </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="BlogPost">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('all.blog.post') }}" class="tp-link">All Blog Post </a>
                    </li> 
                    <li>
                        <a href="{{ route('add.blog.post') }}" class="tp-link">Add Blog Post </a>
                    </li> 
                </ul>
            </div>
        </li>


         <li>
            <a href="#Setting" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Site Setting </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="Setting">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('site.setting') }}" class="tp-link">Site Setting </a>
                    </li> 
                    
                </ul>
            </div>
        </li>

          <li>
            <a href="#About" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> About Page </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="About">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('about.page') }}" class="tp-link">About Page </a>
                    </li> 
                    
                </ul>
            </div>
        </li>

      
        <li class="menu-title mt-2">General</li>

        <li>
            <a href="#sidebarBaseui" data-bs-toggle="collapse">
                <i data-feather="package"></i>
                <span> Contact Page </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarBaseui">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('contact.message') }}" class="tp-link">Contact Message </a>
                    </li>
                     
                   
                </ul>
            </div>
        </li>

       
     
        <li>
            <a href="#sidebarMaps" data-bs-toggle="collapse">
                <i data-feather="map"></i>
                <span> Maps </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarMaps">
                <ul class="nav-second-level">
                    <li>
                        <a href="maps-google.html" class="tp-link">Google Maps</a>
                    </li>
                    <li>
                        <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
</div>
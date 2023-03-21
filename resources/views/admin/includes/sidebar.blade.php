@php
    $setting = \App\Models\SiteSetting::first();
@endphp

<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Logo Light -->
    <a href="{{route('dashboard')}}" class="logo logo-light">
        <span class="logo-lg">
            @if (!empty($setting->logo))
                <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->title}}" height="22">
            @endif
        </span>
        <span class="logo-sm">
            @if (!empty($setting->logo))
                <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->title}}" height="22">
            @endif
        </span>
    </a>

    <!-- Logo Dark -->


    <!-- Sidebar Hover Menu Toggle Button -->
    <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </button>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item">
                <a href="{{route('home')}}" class="side-nav-link" target="_blank">
                    <i class="uil-globe"></i>
                    <span> Visit Website </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item">Settings</li>
            <li class="side-nav-item">
                <a href="{{route('settings.index')}}" class="side-nav-link">
                    <i class="mdi mdi-cogs"></i>
                    <span> Site Settings </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('users.index')}}" class="side-nav-link">
                    <i class="mdi mdi-account-group"></i>
                    <span> Teachers </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#rolePermissions" aria-expanded="false"
                    aria-controls="rolePermissions" class="side-nav-link">
                    <i class="fa-regular fa-file"></i>
                    <span> Roles & Permissions </span>
                </a>
                <div class="collapse" id="rolePermissions">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('roles.index')}}">
                                <span> Roles </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('permissions.index')}}">
                                <span> Permissions </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
            <li class="side-nav-item">
                <a href="{{route('users.index')}}" class="side-nav-link">
                    <i class="mdi mdi-star"></i>
                    <span> Grades </span>
                </a>
            </li>

            {{-- <li class="side-nav-title side-nav-item">Frontend</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>

                    <span> Homepage </span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">

                        <li>
                            <a href="{{route('sliders.index')}}">Slider</a>
                        </li>
                        <li>
                            <a href="{{route('countries.index')}}">Country We Serve</a>
                        </li>
                        <li>
                            <a href="{{route('trust&security.index')}}">Trust & Security</a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#clientSidebar" aria-expanded="false"
                                aria-controls="clientSidebar" class="side-nav-link">
                                <span> Client Section </span>
                            </a>
                            <div class="collapse" id="clientSidebar">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('client.section')}}">Client Section</a>
                                    </li>
                                    <li>
                                        <a href="{{route('client.index')}}">All Clients</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{route('why-us.index')}}">Who We Are</a>
                        </li>
                        <li>
                            <a href="{{route('testimonials.index')}}" >
                                Testimonials
                            </a>
                        </li>
                        <li>
                            <a href="{{route('banners.index')}}">Process</a>
                        </li>
                        <li>
                            <a href="{{route('faq.index')}}">Faq</a>
                        </li>
                        <li>
                            <a href="{{route('enquiry.index')}}">Enquiry Section</a>
                        </li>
                        <li>
                            <a href="{{route('counter.index')}}">Counter Section</a>
                        </li>
                        <li>
                            <a href="{{route('in-case-of-grievance.index')}}">In Case Of Grievance</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAbout" aria-expanded="false"
                    aria-controls="sidebarAbout" class="side-nav-link">
                    <i class="mdi mdi-information-outline"></i>
                    <span> About Us </span>
                </a>
                <div class="collapse" id="sidebarAbout">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('awards.index')}}">
                                <span> Awards </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('about.index')}}">Company Overview</a>
                        </li>
                        <li>
                            <a href="{{route('message.chairman')}}">Message From Chairman</a>
                        </li>
                        <li>
                            <a href="{{route('organization.chart.edit')}}">Organization Chart</a>
                        </li>
                        <li>
                            <a href="{{route('mission.vision')}}">Mission & Vision</a>
                        </li>
                        <li>
                            <a href="{{route('strength.index')}}">Our Strength</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#servicesCategory" aria-expanded="false"
                    aria-controls="servicesCategory" class="side-nav-link">
                    <i class="mdi mdi-alpha-s-box"></i>
                    <span> Services </span>
                </a>
                <div class="collapse" id="servicesCategory">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('category.index')}}">Category</a>
                        </li>
                        <li>
                            <a href="{{route('subcategory.index')}}">Sub Category</a>
                        </li>
                        <li>
                            <a href="{{route('services.index')}}">All Services</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{route('policy.index')}}" class="side-nav-link">
                    <i class="fa-solid fa-building-shield"></i>
                    <span> Our Policy </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDocuments" aria-expanded="false"
                    aria-controls="sidebarDocuments" class="side-nav-link">
                    <i class="fa-regular fa-file"></i>
                    <span> Documents </span>
                </a>
                <div class="collapse" id="sidebarDocuments">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('company-document.index')}}"><span> Company Documents </span></a>
                        </li>
                        <li>
                            <a href="{{route('demand-document.index')}}"><span> Demand Documents </span></a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#otherPages" aria-expanded="false"
                    aria-controls="otherPages" class="side-nav-link">
                    <i class="fa-regular fa-file"></i>
                    <span> Others </span>
                </a>
                <div class="collapse" id="otherPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('blogs.index')}}">
                                <span> Blogs </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('photo.index')}}">
                                <span> Gallery </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('demand.index')}}">
                                <span> Demands </span>
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" href="#hiringProcess" aria-expanded="false"
                                aria-controls="hiringProcess" class="side-nav-link">
                                <span> Hiring Process </span>
                            </a>
                            <div class="collapse" id="hiringProcess">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('steps.process_image')}}"><span> Process Image </span></a>
                                    </li>
                                    <li>
                                        <a href="{{route('steps.index')}}"><span> Hiring Steps </span></a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{route('pages.index')}}" class="side-nav-link">
                    <i class="mdi mdi-book-open-outline "></i>
                    <span> Custom Page </span>
                </a>
            </li> --}}

            {{-- <li class="side-nav-item">
                <a href="{{route('training.index')}}" class="side-nav-link">
                    <i class="mdi mdi-alpha-t-box"></i>
                    <span> Trainings </span>
                </a>
            </li> --}}


            {{-- <li class="side-nav-item">
                <a href="{{route('career.index')}}" class="side-nav-link">
                    <i class="fa-solid fa-briefcase"></i>
                    <span> Careers </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('messages.index')}}" class="side-nav-link ">
                  <i class="nav-icon fas fa-book"></i>
                  <span>
                    Contact Message
                  </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('callbacks.index')}}" class="side-nav-link ">
                    <i class="fa-solid fa-phone"></i>
                    <span>
                    Enquiry
                    </span>
                </a>
            </li> --}}

            {{-- <li class="side-nav-title side-nav-item">Bookings</li>
            <li class="side-nav-item">
                <a href="{{route('bookings.index')}}" class="side-nav-link">
                    <i class="mdi mdi-alpha-s-box"></i>
                    <span> Booking Requests </span>
                </a>
            </li> --}}
            {{-- <li class="side-nav-title side-nav-item">Manpower Management</li>
            <li class="side-nav-item">
                <a href="{{route('manpowers.index')}}" class="side-nav-link">
                    <i class="mdi mdi-account-group "></i>
                    <span> Manpowers </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('manpower_payment.index')}}" class="side-nav-link">
                    <i class="mdi mdi-account-cash  "></i>
                    <span> Payment Info </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('categories.index')}}" class="side-nav-link">
                    <i class="mdi mdi-alpha-c-box"></i>
                    <span> Category </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('subcategories.index')}}" class="side-nav-link">
                    <i class="mdi mdi-alpha-s-box"></i>
                    <span> Sub Category </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Customer Management</li>
            <li class="side-nav-item">
                <a href="{{route('customers.index')}}" class="side-nav-link">
                    <i class="mdi mdi-account-group "></i>
                    <span> Customers </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#cosutmerOrders" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="mdi mdi-order-alphabetical-ascending "></i>
                    <span> Customer Orders </span>
                </a>
                <div class="collapse" id="cosutmerOrders">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('customers-order.index')}}">All Orders</a>
                        </li>
                        <li>
                            <a href="{{route('customers-order.pending')}}">Pending Orders</a>
                        </li>
                        <li>
                            <a href="{{route('customers-order.assigned')}}">Assigned Orders</a>
                        </li>
                        <li>
                            <a href="{{route('customers-order.progress')}}">Work In Progress</a>
                        </li>
                        <li>
                            <a href="{{route('customers-order.completed')}}">Completed</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item">Location</li>
            <li class="side-nav-item">
                <a href="{{route('districts.index')}}" class="side-nav-link">
                    <i class="mdi mdi-city "></i>
                    <span> Districts </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('city.index')}}" class="side-nav-link">
                    <i class="mdi mdi-city-variant "></i>
                    <span> City </span>
                </a>
            </li>--}}
        </ul>
        <!--- End Sidemenu -->


        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->

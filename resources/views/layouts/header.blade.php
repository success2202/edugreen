<header>
    <!-- Header Top -->
    {{-- <div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12 header-top-left">
						<ul class="list-unstyled">
							<li><i class="fa fa-map-marker"></i> Seventh Avenue New York</li>
							<li><i class="fa fa-phone"></i> +123 456 789</li>
							<li><i class="fa fa-envelope"></i> hello@edulight.com</li>
						</ul>
					</div>
					<div class="col-sm-6 col-xs-12 header-top-right">
						<ul class="list-unstyled">
							<li>Follow Us:</li>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- Ends: .header-top --> --}}



    <div class="header-top">
        <div class="container">
            <div class="row">

                {{-- Contact Information --}}
                <div class="col-sm-5 col-xs-12 header-top-left">
                    <ul class="list-unstyled">
                        <li>
                        <i class="fa fa-map-marker"></i>
                        {{ $school->school_address ?? 'Seventh Avenue New York' }}
                    </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            {{ $school->phone ?? '+123 456 789' }}
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            {{ $school->email ?? 'hello@edulight.com' }}
                        </li>
                    </ul>
                </div>

                {{-- Check Result - Center --}}
                {{-- <div class="col-sm-2 col-xs-12 text-center">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('result.check') }}" title="Check Student Result"
                                style="font-weight: bold; color: #8d9e2e; text-decoration: none;">
                                <i class="fa fa-graduation-cap"></i>
                                Check Result
                            </a>
                        </li>
                    </ul>
                </div> --}}

                {{-- Social Media --}}
                <div class="col-sm-5 col-xs-12 header-top-right"> 
                    <ul class="list-unstyled">
                        <li>Follow Us:</li>

                        <li>
                            <a href="{{ $school->facebook ?? '#' }}">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>

                        <li>
                            <a href="{{ $school->instagram ?? '#' }}">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $school->twitter ?? '#' }}">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>



    <div class="main-menu">
        <div class="container">
            <div class="row">
                <!-- Main Menu -->
                <div class="col-sm-12">
                    <nav class="navbar" id="main-nav">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#edulight-navbar-collapse" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Change Logo Here -->
                                {{-- <a class="navbar-brand" href="{{ route('user.home') }}"><img   src="{{ asset('storage/' .$school->logo) }}" style="height: 50px; width: auto; alt="EduGreen"></a> --}}

                                <a class="navbar-brand school-brand" href="{{ route('user.home') }}">

                                    <img src="{{ asset('frontend/assets/img/logo/' . $school->logo) }}"
                                        style="height: 50px; width: auto;" alt="EduGreen">
 
                                        
                                    <span class="school-name">
                                        EDUGREEN SCHOOLS
                                    </span>

                                </a>




                            </div><!-- End .navbar-header -->

                            <!-- Fullscreen search -->
                            {{-- <div class="search-wrap">
									<div class="search-inner">
										<div class="search-cell">
											<form method="get">
												<div class="search-field-holder">
													<input type="search" class="form-control main-search-input" placeholder="Search ...">
													<button type="submit"><i class="fa fa-search"></i></button>
												</div>            
											</form>
										</div>
									</div>        
								</div> <!-- end fullscreen search --> --}}

                            <div class="nav-container">

                                <div class="collapse navbar-collapse" id="edulight-navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="mega-menu"><a href="{{ route('user.home') }}">Home</a>

                                        </li><!-- End .mega-menu -->

                                        <li class="dropdown">
                                            <a href="{{ route('user.about') }}">About Us</a>

                                        </li><!-- End Pages -->

{{-- 
                                        <li class="dropdown">
                                            <a href="{{ route('user.teacher') }}">Teachers</a>

                                        </li><!-- End Teacher --> --}}

                                        <li class="dropdown">
                                            <a href="{{ route('user.events') }}">Events</a>

                                        </li><!-- End Pages -->

                                        {{-- <li class="dropdown">
                                            <a href="">Scholarship</a>

                                        </li><!-- End scholarship --> --}}



<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        Scholarship 
    </a>

    <ul class="dropdown-menu">
        <li>
            <a href="{{ route('user.scholarship.advancement') }}">Office of Advancement</a>
        </li>
        <li>
            <a href="{{ route('user.scholarship.giving') }}">Giving At Edugreen schools</a>
        </li>
        <li>
            <a href="{{ route('user.scholarship') }}">Scholarship</a>
        </li>
    </ul>
</li><!-- End Scholarship -->







                                        <li class="dropdown">
                                            <a href="{{ route('user.blog') }}">News</a>

                                        </li> <!-- end gallery -->
                                        <li class="dropdown">
                                            <a href="{{ route('user.contact') }}">Contact</a>

                                        </li><!-- End Contact -->

                                        <li><a href="{{ route('user.gallery') }}">Gallery</a></li>

                                        


@if(session()->has('student_id'))
    <li class="user-dropdown">
        <a href="#" class="user-dropdown-toggle">
            <i class="fa fa-user"></i>
            {{ session('first_name', 'Student') }}
            <i class="fa fa-angle-down"></i>
        </a>

        <ul class="user-dropdown-menu">
            <li>
                <a href="{{ route('student.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span style="color: rgb(2, 2, 2) !important;">Dashboard</span> 
                </a>
            </li>

            <li>
                <form action="{{ route('student.logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </li>
@else
    <li>
        <a href="{{ route('student.login') }}">
            <i class="fa fa-sign-in"></i> Sign In
        </a>
    </li>
@endif




                                    </ul>
                                </div><!-- .navbar-collapse -->
                            </div><!-- Ends: .nav-container -->
                        </div><!-- .container -->
                    </nav>
                </div>
            </div>
        </div>
    </div><!-- Ends: .main-menu -->
</header><!-- ends: Header -->

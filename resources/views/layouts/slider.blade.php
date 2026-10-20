
<section class="edugreen-hero">

    <div id="edugreenHeroSlider"
         class="carousel slide"
         data-ride="carousel"
         data-interval="6000">

        <!-- SLIDER INDICATORS -->
        <ol class="carousel-indicators">

            <li data-target="#edugreenHeroSlider"
                data-slide-to="0"
                class="active"></li>

            <li data-target="#edugreenHeroSlider"
                data-slide-to="1"></li>

            <li data-target="#edugreenHeroSlider"
                data-slide-to="2"></li>

        </ol>


        <!-- SLIDES -->
        <div class="carousel-inner">


            <!-- SLIDE 1 -->
            <div class="item active">

                <img src="{{ asset('frontend/assets/img/slider1.jpeg') }}"
                     alt="Students learning at Edu-Green Schools"
                     class="edugreen-hero-image">

                <div class="edugreen-hero-overlay"></div>

                <div class="container">

                    <div class="edugreen-hero-content">

                        <span class="edugreen-hero-label">
                            WELCOME TO EDU-GREEN SCHOOLS
                        </span>

                        <h1>
                            Where Every Child
                            <span>Discovers Their Potential</span>
                        </h1>

                        <p>
                            We provide a safe, inspiring and supportive
                            learning environment where children grow,
                            learn and prepare for a brighter future.
                        </p>

                        <div class="edugreen-hero-buttons">

                            <a href="{{ route('user.application') }}"
                               class="edugreen-btn edugreen-btn-primary">
                                Apply Now
                                <i class="fa fa-arrow-right"></i>
                            </a>

                            <a href="{{ route('user.contact') }}"
                               class="edugreen-btn edugreen-btn-outline">
                                Contact Us
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <!-- SLIDE 2 -->
            <div class="item">

                <img src="{{ asset('frontend/assets/img/slider2.jpeg') }}"
                     alt="Edu-Green Schools students"
                     class="edugreen-hero-image">

                <div class="edugreen-hero-overlay"></div>

                <div class="container">

                    <div class="edugreen-hero-content">

                        <span class="edugreen-hero-label">
                            QUALITY EDUCATION • STRONG VALUES
                        </span>

                        <h1>
                            Building Minds.
                            <span>Shaping Futures.</span>
                        </h1>

                        <p>
                            At Edu-Green Schools, we combine academic
                            excellence, character development and practical
                            learning to prepare every child for tomorrow.
                        </p>

                        <div class="edugreen-hero-buttons">

                            <a href="{{ route('user.application') }}"
                               class="edugreen-btn edugreen-btn-primary">
                                Enrol Your Child
                                <i class="fa fa-arrow-right"></i>
                            </a>

                            <a href="{{ route('user.contact') }}"
                               class="edugreen-btn edugreen-btn-outline">
                                Learn More
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <!-- SLIDE 3 -->
            <div class="item">

                <img src="{{ asset('frontend/assets/img/slider3.jpeg') }}"
                     alt="Edu-Green Schools classroom"
                     class="edugreen-hero-image">

                <div class="edugreen-hero-overlay"></div>

                <div class="container">

                    <div class="edugreen-hero-content">

                        <span class="edugreen-hero-label">
                            LEARN • GROW • EXCEL
                        </span>

                        <h1>
                            Education That
                            <span>Inspires Excellence</span>
                        </h1>

                        <p>
                            Give your child the confidence, knowledge and
                            skills needed to succeed in school and beyond.
                        </p>

                        <div class="edugreen-hero-buttons">

                            <a href="{{ route('user.application') }}"
                               class="edugreen-btn edugreen-btn-primary">
                                Start Application
                                <i class="fa fa-arrow-right"></i>
                            </a>

                            <a href="{{ route('user.contact') }}"
                               class="edugreen-btn edugreen-btn-outline">
                                Get In Touch
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- PREVIOUS -->
        <a class="left carousel-control"
           href="#edugreenHeroSlider"
           data-slide="prev">

            <span class="edugreen-slider-arrow">
                <i class="fa fa-angle-left"></i>
            </span>

        </a>


        <!-- NEXT -->
        <a class="right carousel-control"
           href="#edugreenHeroSlider"
           data-slide="next">

            <span class="edugreen-slider-arrow">
                <i class="fa fa-angle-right"></i>
            </span>

        </a>

    </div>

</section>
```

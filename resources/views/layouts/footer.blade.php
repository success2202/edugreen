<footer class="school-footer">

    {{-- Footer Main --}}
    <div class="school-footer-main">

        <div class="container">

            <div class="row g-5">

                {{-- SCHOOL INFORMATION --}}
                <div class="col-lg-4 col-md-6">

                    <div class="footer-school">

                        <a href="{{ url('/') }}" class="footer-logo"> 
                            <img
                                src="{{ asset('storage/' . $school->logo) }}"
                                alt="School Logo"
                            >
                        </a>

                        <p>
                            We provide quality Nursery & Primary 
                            education in a safe, supportive and inspiring
                            environment where every child can learn, grow
                            and succeed.
                        </p>

                        <div class="footer-socials">

                            <a href="{{ $school->facebook ?? '#' }}" aria-label="Facebook">
                                <i class="ti ti-brand-facebook"></i>
                            </a>

                            <a href="{{ $school->instagram ?? '#' }}" aria-label="Instagram">
                                <i class="ti ti-brand-instagram"></i>
                            </a>

                            <a href="{{ $school->twitter ?? '#' }}" aria-label="Twitter">
                                <i class="ti ti-brand-x"></i>
                            </a>

                            <a href="{{ $school->youtube ?? '#' }}" aria-label="YouTube">
                                <i class="ti ti-brand-youtube"></i>
                            </a>

                        </div>

                    </div>

                </div>


                {{-- QUICK LINKS --}}
                <div class="col-lg-2 col-md-6">

                    <div class="footer-column">

                        <h3>Quick Links</h3>

                        <ul>

                            <li>
                                <a href="{{ url('/') }}">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/about') }}">
                                    About Us
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/application') }}">
                                    Application
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/blogs') }}">
                                    News
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/contact') }}">
                                    Contact Us
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>


                {{-- ACADEMICS --}}
                <div class="col-lg-2 col-md-6">

                    <div class="footer-column">

                        <h3>Academics</h3>

                        <ul>

                            {{-- <li>
                                <a href="#">
                                    Nursery
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Primary
                                </a>
                            </li> --}}

                            {{-- <li>
                                <a href="#">
                                    Secondary
                                </a>
                            </li> --}}

                            <li>
                                <a href="/gallery">
                                    School Gallery
                                </a>
                            </li>

                            <li>
                                <a href="/teachers">
                                    Our Teachers
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>


                {{-- CONTACT --}}
                <div class="col-lg-4 col-md-6">

                    <div class="footer-column footer-contact">

                        <h3>Contact Us</h3>

                        <div class="footer-contact-item">

                            <div class="footer-contact-icon">
                                <i class="ti ti-map-pin"></i>
                            </div>

                            <div>
                                <span>Our Address</span>
                                <p>
                                    {{$school->school_address}}
                                </p>
                            </div>

                        </div>


                        {{-- <div class="footer-contact-item">

                            <div class="footer-contact-icon">
                                <i class="ti ti-phone"></i>
                            </div>

                            <div>
                                <span>Phone</span>

                                <p>
                                    <a href="tel:+2348000000000">
                                        +234 800 000 0000
                                    </a>
                                </p>

                            </div>

                        </div>


                        <div class="footer-contact-item">

                            <div class="footer-contact-icon">
                                <i class="ti ti-mail"></i>
                            </div>

                            <div>
                                <span>Email</span>

                                <p>
                                    <a href="mailto:info@yourschool.com">
                                        info@yourschool.com
                                    </a>
                                </p>

                            </div>

                        </div> --}}

                        
                        <div class="footer-contact-item">

                            <div class="footer-contact-icon">
                                <i class="ti ti-phone"></i>
                            </div>

                            <div>
                                <span>Phone</span>

                                <p>
                                    <a href="tel:{{ $school->phone ?? '+2348000000000' }}">
                                        {{ $school->phone ?? '+234 800 000 0000' }}
                                    </a>
                                </p>

                            </div>

                        </div>


                        <div class="footer-contact-item">

                            <div class="footer-contact-icon">
                                <i class="ti ti-mail"></i>
                            </div>

                            <div>
                                <span>Email</span>

                                <p>
                                    <a href="mailto:{{ $school->email ?? 'info@yourschool.com' }}">
                                        {{ $school->email ?? 'info@yourschool.com' }}
                                    </a>
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- FOOTER BOTTOM --}}
    <div class="school-footer-bottom">

        <div class="container">

            <div class="footer-bottom-content">

                <p>
                    © {{ date('Y') }}
                    Edu Green Schools.
                    All Rights Reserved.
                </p>

                <div class="footer-bottom-links">

                    <a href="{{ url('/privacy-policy') }}">
                        Privacy Policy
                    </a>

                    <a href="{{ url('/terms') }}">
                        Terms & Conditions
                    </a>

                </div>

            </div>

        </div>

    </div>

</footer>
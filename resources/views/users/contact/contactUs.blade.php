@extends('layouts.app')

@section('content') 

<style> 

.school-breadcrumb {
    background-image:
        linear-gradient(
            rgba(10, 55, 35, 0.72),
            rgba(10, 55, 35, 0.72)
        ),
        url('frontend/assets/img/nursery.jpeg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>

<section class="school-breadcrumb">
    <div class="school-breadcrumb-shape shape-one"></div>
    <div class="school-breadcrumb-shape shape-two"></div>

    <div class="container">
        <div class="school-breadcrumb-wrapper">

            <div class="school-breadcrumb-content">

                {{-- <span class="school-breadcrumb-label">
                    <i class="ti ti-mail"></i>
                    GET IN TOUCH
                </span> --}}

                <h1>
                    Contact <span>Us</span>
                </h1>

                <div class="school-breadcrumb-line"></div>

                <p>
                    Have a question about admissions, academics or school life?
                    Our friendly team is ready to assist you.
                </p>

                <nav aria-label="breadcrumb">
                    <ol class="school-breadcrumb-list">

                        <li>
                            <a href="{{ url('/') }}">
                                <i class="ti ti-home"></i>
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-arrow">
                            <i class="ti ti-chevron-right"></i>
                        </li>

                        <li class="active">
                            Contact Us
                        </li>

                    </ol>
                </nav>

            </div>

            <div class="school-breadcrumb-visual">

                <div class="breadcrumb-icon-box">
                    <i class="ti ti-mail"></i>
                </div>

                <div class="breadcrumb-small-icon">
                    <i class="ti ti-phone"></i>
                </div>

            </div>

        </div>
    </div>
</section>


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--============================
		Contact Content
	=============================-->
	<section class="contact-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<div class="contact-one-form">
						<h3>Write Your Message Here</h3>
						<form action="{{ route('contact.submit') }}" method="POST">
   							 @csrf
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" name="name" placeholder="Name *" required>
								</div>
								<div class="col-sm-6">
									<input type="email" name="email" placeholder="Email *" required>
								</div>
								<div class="col-sm-6">
									<input type="text" name="subject" placeholder="Subject *" required>
								</div>
								<div class="col-sm-6">
									<input type="text" name="phone" placeholder="Phone *" required>
								</div>
								<div class="col-sm-12">
									<textarea name="message" placeholder="Message" required></textarea>
								</div>
								<div class="col-sm-12">
									<button type="submit">Send Message</button>
								</div>
							</div>
							<div id="form-messages"></div>
						</form>
					</div><!-- Ends: .contact-one-form -->
				</div><!-- Ends: .col-sm-7 -->
				<div class="col-sm-5">
					<div class="contact-map">
						<h3>Find Our Location</h3>
						<iframe
							height="415"
							src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDyNKVTkXhvnoxw8V3-vf9heDtWiXqZtDY&amp;q=Space+Needle,Seattle+WA" allowfullscreen>
						</iframe>
					</div>
				</div>


<div class="col-sm-12">
    <div class="contact-boxes row">

        <div class="col-sm-4">
            <i class="fa fa-phone"></i>
            <h3>Call Us</h3>
            <p>Phone: {{ $school->phone ?? '' }} </p>
        </div>

        <div class="col-sm-4">
            <i class="fa fa-envelope"></i>
            <h3>Email</h3>
            <p>{{ $school->email ?? '' }}</p>
        </div>

        <div class="col-sm-4">
            <i class="fa fa-map-marker"></i>
            <h3>Address</h3>
            <p>{{ $school->school_address ?? '' }}</p>
        </div>

    </div>
</div><!-- Ends: .col-sm-12 -->
</div>


			</div>
		</div>
	</section><!-- Ends: .contact-wrapper -->
@endsection
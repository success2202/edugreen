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
                    <i class="ti ti-calendar-event"></i>
                    SCHOOL EVENTS
                </span> --}}

                <h1>
                    Upcoming <span>Events</span>
                </h1>

                <div class="school-breadcrumb-line"></div>

                <p>
                    Stay updated with school activities, celebrations,
                    academic events, competitions and important dates.
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
                            Events
                        </li>

                    </ol>
                </nav>

            </div>

            <div class="school-breadcrumb-visual">

                <div class="breadcrumb-icon-box">
                    <i class="ti ti-calendar-event"></i>
                </div>

                <div class="breadcrumb-small-icon">
                    <i class="ti ti-star"></i>
                </div>

            </div>

        </div>
    </div>
</section>


{{-- <section class="all-course-wrapper events-style02">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="events-block">
						<div class="row">
							<div class="col-sm-12">
								<div class="event2-single">
									<div class="row">
										<div class="col-sm-2 event-date">
											<span>10th</span>
											<span>January, 2017</span>
										</div>
										<div class="col-sm-3 event-thumb">
											<img src="{{ asset('frontend/assets/images/event/event01.jpg') }}" alt="" class="img-responsive">
										</div>
										<div class="col-sm-7 event-info">
											<h3>Happy New Year 2017</h3>
											<p class="event-td">
												<span><i class="fa fa-clock-o"></i> 8:00am - 5:00pm</span>
												<span><i class="fa fa-map-marker"></i> Newyork</span>
											</p>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enimbf adiminim veniam.</p>
											<a href="#" class="erm-btn">Read More <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							</div><!-- Ends: .event2-single -->
							<div class="col-sm-12">
								<div class="event2-single">
									<div class="row">
										<div class="col-sm-2 event-date">
											<span>20th</span>
											<span>January, 2017</span>
										</div>
										<div class="col-sm-3 event-thumb">
											<img src="{{ asset('frontend/assets/images/event/event02.jpg') }}" alt="" class="img-responsive">
										</div>
										<div class="col-sm-7 event-info">
											<h3>Happy New Year 2017</h3>
											<p class="event-td">
												<span><i class="fa fa-clock-o"></i> 8:00am - 5:00pm</span>
												<span><i class="fa fa-map-marker"></i> Newyork</span>
											</p>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enimbf adiminim veniam.</p>
											<a href="#" class="erm-btn">Read More <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							</div><!-- Ends: .event2-single -->
							<div class="col-sm-12">
								<div class="event2-single">
									<div class="row">
										<div class="col-sm-2 event-date">
											<span>25th</span>
											<span>January, 2017</span>
										</div>
										<div class="col-sm-3 event-thumb">
											<img src="{{ asset('frontend/assets/images/event/event03.jpg') }}" alt="" class="img-responsive">
										</div>
										<div class="col-sm-7 event-info">
											<h3>Happy New Year 2017</h3>
											<p class="event-td">
												<span><i class="fa fa-clock-o"></i> 8:00am - 5:00pm</span>
												<span><i class="fa fa-map-marker"></i> Newyork</span>
											</p>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enimbf adiminim veniam.</p>
											<a href="#" class="erm-btn">Read More <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							</div><!-- Ends: .event2-single -->
							<div class="col-sm-12">
								<div class="event2-single">
									<div class="row">
										<div class="col-sm-2 event-date">
											<span>25th</span>
											<span>January, 2017</span>
										</div>
										<div class="col-sm-3 event-thumb">
											<img src="{{ asset('frontend/assets/images/event/event01.jpg') }}" alt="" class="img-responsive">
										</div>
										<div class="col-sm-7 event-info">
											<h3>Happy New Year 2017</h3>
											<p class="event-td">
												<span><i class="fa fa-clock-o"></i> 8:00am - 5:00pm</span>
												<span><i class="fa fa-map-marker"></i> Newyork</span>
											</p>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enimbf adiminim veniam.</p>
											<a href="#" class="erm-btn">Read More <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							</div><!-- Ends: .event2-single -->
						</div>
					</div><!-- ends: .event-block -->
					
					
					<div class="blog-pagination">
						<ul class="list-unstyled">
							<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li class="active"><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul>
					</div><!-- Ends: .blog-pagination -->
				</div><!-- Ends: .col-md-12 -->

			</div>
		</div>
	</section> --}}
	
<section class="all-course-wrapper events-style02">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="events-block">
						<div class="row">

							@foreach($events as $event)
							<div class="col-sm-12">
								<div class="event2-single">
									<div class="row">
										<div class="col-sm-2 event-date">
											<span>{{ \Carbon\Carbon::parse($event->event_date)->format('jS') }}</span>
											<span>{{ \Carbon\Carbon::parse($event->event_date)->format('F, Y') }}</span>
										</div>
										<div class="col-sm-3 event-thumb">
											<img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-responsive">
										</div>
										<div class="col-sm-7 event-info">
											<h3>{{ $event->title }}</h3>
											<p class="event-td">
												<span><i class="fa fa-clock-o"></i> {{ $event->event_time }} </span>
												<span><i class="fa fa-map-marker"></i> {{ $event->venue }}</span>
											</p>
											<p>{{ \Illuminate\Support\Str::limit(strip_tags($event->description), 200) }}</p>
											<a href="{{ route('user.event.details', $event->id) }}" class="erm-btn">Read More <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							</div><!-- Ends: .event2-single -->
							@endforeach

						</div>
					</div><!-- ends: .event-block -->


					<div class="blog-pagination">
						<ul class="list-unstyled">
							@if($events instanceof \Illuminate\Pagination\LengthAwarePaginator && $events->hasPages())
								@if($events->onFirstPage())
									<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
								@else
									<li><a href="{{ $events->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
								@endif

								@foreach($events->getUrlRange(1, $events->lastPage()) as $page => $url)
									<li class="{{ $events->currentPage() == $page ? 'active' : '' }}"><a href="{{ $url }}">{{ $page }}</a></li>
								@endforeach

								@if($events->hasMorePages())
									<li><a href="{{ $events->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
								@else
									<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
								@endif
							@endif
						</ul>
					</div><!-- Ends: .blog-pagination -->
				</div><!-- Ends: .col-md-12 -->

			</div>
		</div>
	</section>


@endsection
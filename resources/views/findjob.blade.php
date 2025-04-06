@extends('layouts.masterlayout');
@section('content')
 <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4" style="display:none;">
                        <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Right content -->
                    
                        <!-- Featured_job_start -->
                        {{-- <section class="featured-job-area"> --}}
                                   <section class="featured-job-area feature-padding" style="padding:0px">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Recent Job</span>
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10" style="max-width:100% !important; flex:100%">
                        <!-- single-job-content -->
                       <div class="container mt-5">
        {{-- <h2>Job Listings</h2> --}}
  @php
                            $jobs = DB::table('new_job')->get();
                        @endphp
        @if ($jobs->isEmpty())
            <p>No jobs available yet.</p>
        @else
            @foreach ($jobs as $job)
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            @if ($job->company_logo)
                                <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company }} Logo">
                            @else
                                <img src="{{ asset('assets/img/icon/job-list1.png') }}" alt="Default Company Logo">
                            @endif
                        </div>
                        <div class="job-tittle">
                            <a href="#"><h4>{{ $job->job_title }}</h4></a>
                            <ul>
                                <li>{{ $job->company }}</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $job->location ?: 'Not specified' }}</li>
                                <li>{{ $job->salary ?: 'Not specified' }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right" style="margin-left:50px;">
                        <a href="#">{{ $job->type ?: 'Not specified' }}</a>
                        <span>
                            @if ($job->posted_at)
                                @php
                                 $postedAt = \Carbon\Carbon::parse($job->posted_at);

echo $postedAt->diffForHumans();
                                @endphp
                            @else
                                Not specified
                            @endif
                        </span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
                   
                    </div>
                </div>
            </div>
        </section>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
@endsection
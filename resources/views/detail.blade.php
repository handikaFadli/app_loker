@extends('layouts.main')

@section('content')
		<!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-content">
              <h1 class="page-title">About Us</h1>
              <p>
                Business plan draws on a wide range of knowledge from different business<br />
                disciplines. Business draws on a wide range of different business .
              </p>
            </div>
            <ul class="breadcrumb-nav">
              <li><a href="index.html">Home</a></li>
              <li>About Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="job-details section">
      <div class="container">
        <div class="row mb-n5">
          <!-- Job List Details Start -->
          <div class="col-lg-8 col-12">
            <div class="job-details-inner">
              <div class="job-details-head row mx-0">
                <div class="company-logo col-auto">
                  <a href="#" style="border-radius: 4px; overflow: hidden"><img src="{{ asset('media/'.$lowongan->perusahaan->logo) }}" alt="Company Logo" width="100" /></a>
                </div>
                <div class="salary-type col-auto order-sm-3">
                  <span class="salary-range">
                    {{ ucwords($lowongan->status) }}
                  </span>
                  <span class="badge badge-success">{{ ucwords($lowongan->tipe) }}</span>
                </div>
                <div class="content col">
                  <h5 class="title">{{ $lowongan->judul }}</h5>
                  <ul class="meta d-block">
                    <li>
                      <span class="text-primary mb-1"><a href="{{ $lowongan->perusahaan->website }}">{{ $lowongan->perusahaan->nama }}</a></span>
                    </li>
                    <li><i class="lni lni-map-marker"></i> {{ $lowongan->perusahaan->lokasi }}</li>
                  </ul>
                </div>
              </div>
              <div class="job-details-body">
                <h6 class="mb-3">Job Description</h6>
                <p>{{ $lowongan->deskripsi }}</p>
                <h6 class="mb-3 mt-4">Responsibilities</h6>
                <ul>
                  <li>Proven work experienceas a web designer</li>
                  <li>Demonstrable graphic design skills with a strong portfolio</li>
                  <li>Proficiency in HTML, CSS and JavaScript for rapid prototyping</li>
                  <li>Experience working in an Agile/Scrum development process</li>
                  <li>Proven work experienceas a web designer</li>
                  <li>Excellent visual design skills with sensitivity to user-system interaction</li>
                  <li>Ability to solve problems creatively and effectively</li>
                  <li>Proven work experienceas a web designer</li>
                  <li>Up-to-date with the latest Web trends, techniques and technologies</li>
                  <li>BS/MS in Human-Computer Interaction, Interaction Design or a Visual Arts subject</li>
                </ul>
                <h6 class="mb-3 mt-4">Education + Experience</h6>
                <ul>
                  <li>Advanced degree or equivalent experience in graphic and web design</li>
                  <li>3 or more years of professional design experience</li>
                  <li>Direct response email experience</li>
                  <li>Ecommerce website design experience</li>
                  <li>Familiarity with mobile and web apps preferred</li>
                  <li>Excellent communication skills, most notably a demonstrated ability to solicit and address creative and design feedback</li>
                  <li>Must be able to work under pressure and meet deadlines while maintaining a positive attitude and providing exemplary customer service</li>
                  <li>Ability to work independently and to carry out assignments to completion within parameters of instructions given, prescribed routines, and standard accepted practices</li>
                </ul>
                <h6 class="mb-3 mt-4">Benefits</h6>
                <ul>
                  <li>Medical insurance</li>
                  <li>Dental insurance</li>
                  <li>Vision insurance</li>
                  <li>Supplemental benefits (Short Term Disability, Cancer & Accident).</li>
                  <li>Employer-sponsored Basic Life & AD&D Insurance</li>
                  <li>Employer-sponsored Long Term Disability</li>
                  <li>Employer-sponsored Value Adds – Fresh Beanies</li>
                  <li>401(k)with matching</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Job List Details End -->
          <!-- Job Sidebar Wrap Start -->
          <div class="col-lg-4 col-12">
            <div class="job-details-sidebar">
              <!-- Sidebar (Apply Buttons) Start -->
              <div class="sidebar-widget">
                <div class="inner">
                  <div class="row m-n2 button">
                    <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                      <a href="bookmarked.html" class="d-block btn"><i class="fa fa-heart-o mr-1"></i> Save Job</a>
                    </div>
                    <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                      <a href="{{ route('apply', $lowongan->id) }}" class="d-block btn btn-alt">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Sidebar (Apply Buttons) End -->
              <!-- Sidebar (Job Overview) Start -->
              <div class="sidebar-widget">
                <div class="inner">
                  <h6 class="title">Job Overview</h6>
                  <ul class="job-overview list-unstyled">
                    @php
                        \Carbon\Carbon::setLocale('id');
                    @endphp
                    <li><strong>Published on:</strong> {{ \Carbon\Carbon::parse($lowongan->creatd_at)->translatedFormat('d F Y') }}
                    </li>
                    <li><strong>Vacancy:</strong> 02</li>
                    <li><strong>Employment Status:</strong> Full-time</li>
                    <li><strong>Experience:</strong> 2 to 3 year(s)</li>
                    <li><strong>Job Location:</strong> Willshire Glen</li>
                    <li><strong>Salary:</strong> $5k - $8k</li>
                    <li><strong>Gender:</strong> Any</li>
                    <li><strong>Application Deadline:</strong> Dec 15, 2023</li>
                  </ul>
                </div>
              </div>
              <!-- Sidebar (Job Overview) End -->

              <!-- Sidebar (Job Location) Start -->
              <div class="sidebar-widget">
                <div class="inner">
                  <h6 class="title">Job Location</h6>
                  <div class="mapouter">
                    <div class="gmap_canvas">
                      <iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=New%20York&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.com/">123movies old site</a>
                      <style>
                        .mapouter {
                          position: relative;
                          text-align: right;
                          height: 300px;
                          width: 100%;
                        }
                        .gmap_canvas {
                          overflow: hidden;
                          background: none !important;
                          height: 300px;
                          width: 100%;
                        }
                      </style>
                      <a href="https://maps-google.github.io/embed-google-map/">embed google map</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Sidebar (Job Location) End -->
            </div>
          </div>
          <!-- Job Sidebar Wrap End -->
        </div>
      </div>
    </div>
@endsection
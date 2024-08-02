@extends('layouts.main')

@section('content')
		<!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-content">
              <h1 class="page-title">Detail Lowongan</h1>
              <p>Temukan informasi lengkap mengenai lowongan pekerjaan yang tersedia.<br>Baca deskripsi pekerjaan, persyaratan untuk posisi yang Anda minati.</p>
            </div>
            <ul class="breadcrumb-nav">
              <li><a href="/">Home</a></li>
							<li><a href="/lowongan">Lowongan</a></li>
              <li>Detail Lowongan</li>
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
                  <a href="{{ $lowongan->perusahaan->website }}" style="border-radius: 4px; overflow: hidden"><img src="{{ $lowongan->perusahaan->logo }}" alt="Company Logo" width="100" /></a>
                </div>
                <div class="salary-type col-auto order-sm-3">
                  <span class="salary-range">
                    {{ \Carbon\Carbon::parse($lowongan->batas_akhir)->format('d/m/Y') }}
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
                <h6 class="mb-3">Deskripsi</h6>
                <p>{{ $lowongan->deskripsi }}</p>
                {!! $lowongan->persyaratan !!}
                {{-- <h6 class="mb-3 mt-4">Responsibilities</h6>
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
                </ul> --}}
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
                      <form action="{{ route('apply') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                        <button type="submit" class="d-block btn btn-primary">Apply Sekarang</button>
                      </form>
                      {{-- <a href="{{ route('apply', $lowongan->id) }}" class="d-block btn btn-primary">Apply Sekarang</a> --}}
                    </div>
                  </div>
                </div>
              </div>
              <!-- Sidebar (Apply Buttons) End -->
              <!-- Sidebar (Job Overview) Start -->
              {{-- <div class="sidebar-widget">
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
              </div> --}}
              <!-- Sidebar (Job Overview) End -->

              <!-- Sidebar (Job Location) Start -->
              <div class="sidebar-widget">
                <div class="inner">
                  <h6 class="title">Lokasi</h6>
                  <div class="mapouter">
                    <div class="gmap_canvas">
                      <iframe width="100%" height="300" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2963663289993!2d108.55051270935574!3d-6.733651993234402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d8ebc133e3f%3A0x91385801f5822049!2sUniversitas%20Catur%20Insan%20Cendekia%20(CIC)!5e0!3m2!1sid!2ssg!4v1720204950522!5m2!1sid!2ssg" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.cic.ac.id/">Universitas Catur Insan Cendekia</a>
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
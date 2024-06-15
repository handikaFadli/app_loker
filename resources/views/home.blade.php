@extends('layouts.main')

@section('content')
    <!-- Start Hero Area -->
<section class="hero-area">
  <!-- Single Slider -->
  <div class="hero-inner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 co-12">
          <div class="inner-content">
            <div class="hero-text">
              <h1 class="wow fadeInUp" data-wow-delay=".3s">Find Your Career <br />to Make a Better Life</h1>
              <p class="wow fadeInUp" data-wow-delay=".5s">
                Creating a beautiful job website is not easy <br />
                always. To make your life easier, we are<br />
                introducing Jobcamp template.
              </p>
            </div>
            <div class="job-search-wrap-two mt-50 wow fadeInUp" data-wow-delay=".7s">
              <div class="job-search-form">
                <form action="#">
                  <!-- Single Field Item Start  -->
                  <div class="single-field-item keyword">
                    <label for="keyword">What</label>
                    <input id="keyword" placeholder="What jobs you want?" name="keyword" type="text" />
                  </div>
                  <!-- Single Field Item End  -->
                  <!-- Single Field Item Start  -->
                  <div class="single-field-item location">
                    <label for="location">Where</label>
                    <input id="location" class="input-field input-field-location" placeholder="Location" name="location" type="text" />
                  </div>
                  <!-- Single Field Item End  -->
                  <div class="submit-btn">
                    <button class="btn" type="submit">Search</button>
                  </div>
                </form>
              </div>
              <div class="trending-keywords mt-30">
                <div class="keywords style-two">
                  <span class="title">Popular Keywords:</span>
                  <ul>
                    <li><a href="#">Administrative</a></li>
                    <li><a href="#">Android</a></li>
                    <li><a href="#">app</a></li>
                    <li><a href="#">ASP.NET</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 co-12">
          <div class="hero-video-head wow fadeInRight" data-wow-delay=".5s">
            <div class="video-inner">
              <img src="{{ asset('assets_landing/images/hero/hero-image.png') }}" alt="#" />
              <a href="https://www.youtube.com/watch?v=cz4z8CyvDas" class="glightbox hero-video"><i class="lni lni-play"></i></a>
              <!-- Video Animation -->
              <div class="promo-video">
                <div class="waves-block">
                  <div class="waves wave-1"></div>
                  <div class="waves wave-2"></div>
                  <div class="waves wave-3"></div>
                </div>
              </div>
              <!--/ End Video Animation -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ End Single Slider -->
</section>
<!--/ End Hero Area -->

<!-- Start Apply Process Area -->
<section class="apply-process section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <div class="process-item">
          <i class="lni lni-user"></i>
          <h4>Register Your Account</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <div class="process-item">
          <i class="lni lni-book"></i>
          <h4>Upload Your Resume</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <div class="process-item">
          <i class="lni lni-briefcase"></i>
          <h4>Apply for Dream Job</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Apply Process Area -->

<!-- Start Job Category Area -->
<section class="job-category section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <span class="wow fadeInDown" data-wow-delay=".2s">Job Category</span>
          <h2 class="wow fadeInUp" data-wow-delay=".4s">Choose Your Desire Category</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>
      </div>
    </div>
    <div class="cat-head">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".2s">
            <div class="icon">
              <i class="lni lni-cog"></i>
            </div>
            <h3>
              Technical<br />
              Support
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".4s">
            <div class="icon">
              <i class="lni lni-layers"></i>
            </div>
            <h3>
              Business<br />
              Development
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".6s">
            <div class="icon">
              <i class="lni lni-home"></i>
            </div>
            <h3>
              Real Estate<br />
              Business
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".8s">
            <div class="icon">
              <i class="lni lni-search"></i>
            </div>
            <h3>
              Share Maeket<br />
              Analysis
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".2s">
            <div class="icon">
              <i class="lni lni-investment"></i>
            </div>
            <h3>
              Finance & Banking <br />
              Service
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".4s">
            <div class="icon">
              <i class="lni lni-cloud-network"></i>
            </div>
            <h3>
              IT & Networing <br />
              Sevices
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".6s">
            <div class="icon">
              <i class="lni lni-restaurant"></i>
            </div>
            <h3>
              Restaurant <br />
              Services
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".8s">
            <div class="icon">
              <i class="lni lni-fireworks"></i>
            </div>
            <h3>
              Defence & Fire <br />
              Service
            </h3>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /End Job Category Area -->

<!-- Start Call Action Area -->
<section class="call-action overlay section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-12">
        <div class="inner">
          <div class="section-title">
            <span class="wow fadeInDown" data-wow-delay=".2s">JobGrids Free Lite Version</span>
            <h2 class="wow fadeInUp" data-wow-delay=".4s">Currently You are using free lite Version of JobGrids</h2>
            <p class="wow fadeInUp" data-wow-delay=".6s">
              Please, purchase full version of the template to get all pages, <br />
              Features and commercial license.
            </p>
            <div class="button wow fadeInUp" data-wow-delay=".8s">
              <a href="#" class="btn"><i class="lni lni-cart"></i> Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /End Call Action Area -->

<!-- Start Find Job Area -->
<section class="find-job section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <span class="wow fadeInDown" data-wow-delay=".2s">Hot Jobs</span>
          <h2 class="wow fadeInUp" data-wow-delay=".4s">Browse Recent Jobs</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>
      </div>
    </div>
    <div class="single-head">
      <div class="row">
        <div class="col-lg-6 col-12">
          <!-- End Single Job -->
          <!-- Single Job -->
          <div class="single-job wow fadeInUp" data-wow-delay=".3s">
            <div class="job-image">
              <img src="{{ asset('assets_landing/images/jobs/img2.png') }}" alt="#" />
            </div>
            <div class="job-content">
              <h4><a href="job-details.html">Graphics Design</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="#"> designhub.com</a></li>
                <li><i class="lni lni-dollar"></i> $20k - $25k</li>
                <li><i class="lni lni-map-marker"></i> Washington, USA</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="job-details.html">Apply</a></li>
                <li><span>Intern</span></li>
              </ul>
            </div>
          </div>
          <!-- End Single Job -->
          <!-- Single Job -->
          <div class="single-job wow fadeInUp" data-wow-delay=".3s">
            <div class="job-image">
              <img src="{{ asset('assets_landing/images/jobs/img3.png') }}" alt="#" />
            </div>
            <div class="job-content">
              <h4><a href="job-details.html">Ui/Ux Design</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="#"> uddesign.com</a></li>
                <li><i class="lni lni-dollar"></i> $20k - $25k</li>
                <li><i class="lni lni-map-marker"></i> Cupertino, USA</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="job-details.html">Apply</a></li>
                <li><span>Part Time</span></li>
              </ul>
            </div>
          </div>
          <!-- End Single Job -->
          <!-- Single Job -->
          <div class="single-job wow fadeInUp" data-wow-delay=".3s">
            <div class="job-image">
              <img src="{{ asset('assets_landing/images/jobs/img4.png') }}" alt="#" />
            </div>
            <div class="job-content">
              <h4><a href="job-details.html">Web Developer</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="#"> webinner.com</a></li>
                <li><i class="lni lni-dollar"></i> $20k - $25k</li>
                <li><i class="lni lni-map-marker"></i> Delaware, USA</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="job-details.html">Apply</a></li>
                <li><span>Intern</span></li>
              </ul>
            </div>
          </div>
          <!-- End Single Job -->
        </div>
        <div class="col-lg-6 col-12">
          <!-- Single Job -->
          <div class="single-job wow fadeInUp" data-wow-delay=".5s">
            <div class="job-image">
              <img src="{{ asset('assets_landing/images/jobs/img7.png') }}" alt="#" />
            </div>
            <div class="job-content">
              <h4><a href="job-details.html">Digital Marketer</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="#"> marketers.com</a></li>
                <li><i class="lni lni-dollar"></i> $20k - $25k</li>
                <li><i class="lni lni-map-marker"></i> New York, USA</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="job-details.html">Apply</a></li>
                <li><span>Part Time</span></li>
              </ul>
            </div>
          </div>
          <!-- End Single Job -->
          <!-- Single Job -->
          <div class="single-job wow fadeInUp" data-wow-delay=".5s">
            <div class="job-image">
              <img src="{{ asset('assets_landing/images/jobs/img5.png') }}" alt="#" />
            </div>
            <div class="job-content">
              <h4><a href="job-details.html">Sales Manager</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="#"> winbrans.com</a></li>
                <li><i class="lni lni-dollar"></i> $20k - $25k</li>
                <li><i class="lni lni-map-marker"></i> Delaware, USA</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="job-details.html">Apply</a></li>
                <li><span>full time</span></li>
              </ul>
            </div>
          </div>
          <!-- End Single Job -->
          <!-- Single Job -->
          <div class="single-job wow fadeInUp" data-wow-delay=".5s">
            <div class="job-image">
              <img src="{{ asset('assets_landing/images/jobs/img6.png') }}" alt="#" />
            </div>
            <div class="job-content">
              <h4><a href="job-details.html">Product Designer</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="#"> winbrans.com</a></li>
                <li><i class="lni lni-dollar"></i> $20k - $25k</li>
                <li><i class="lni lni-map-marker"></i> New York, USA</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="job-details.html">Apply</a></li>
                <li><span>full time</span></li>
              </ul>
            </div>
          </div>
          <!-- End Single Job -->
          <!-- Single Job -->
          <div class="single-job wow fadeInUp" data-wow-delay=".5s">
            <div class="job-image">
              <img src="{{ asset('assets_landing/images/jobs/img8.png') }}" alt="#" />
            </div>
            <div class="job-content">
              <h4><a href="job-details.html">Android Developer</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="#"> androidplex.com</a></li>
                <li><i class="lni lni-dollar"></i> $20k - $25k</li>
                <li><i class="lni lni-map-marker"></i> Cupertino, USA</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="job-details.html">Apply</a></li>
                <li><span>Part Time</span></li>
              </ul>
            </div>
          </div>
          <!-- End Single Job -->
        </div>
      </div>
      <!-- Pagination -->
      <div class="row">
        <div class="col-12">
          <div class="pagination center wow fadeInUp" data-wow-delay=".3s">
            <ul class="pagination-list">
              <li>
                <a href="#"><i class="lni lni-arrow-left"></i></a>
              </li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>
                <a href="#"><i class="lni lni-arrow-right"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ End Pagination -->
    </div>
  </div>
</section>
<!--/ End Find Job Area -->

<!-- Start Featured Job Area -->
<section class="featured-job section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <span class="wow fadeInDown" data-wow-delay=".2s">Featured Jobs</span>
          <h2 class="wow fadeInUp" data-wow-delay=".4s">Browse Featured Jobs</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>
      </div>
    </div>
    <div class="single-head">
      <div class="row">
        
        @foreach ($lowongans as $lowongan)
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-job wow fadeInUp" data-wow-delay=".2s">
            <div class="shape"></div>
            <div class="feature">Featured</div>
            <div class="image">
              <img src="{{ asset('media/'.$lowongan->gambar) }}" alt="#" />
            </div>
            <div class="content">
              <h4><a href="#">{{ $lowongan->judul }}</a></h4>
              <ul>
                <li><i class="lni lni-map-marker"></i> {{ $lowongan->perusahaan->lokasi }}</li>
                <li><i class="lni lni-briefcase"></i> {{ ucwords($lowongan->tipe) }}</li>
                {{-- <li><i class="lni lni-dollar"></i> 80K-90K</li> --}}
              </ul>
              <p>{{ $lowongan->deskripsi }}</p>
              <div class="button">
                <a href="/detail/{{ $lowongan->slug }}" class="btn">Apply Now</a>
                <a href="bookmarked.html" class="btn save"><i class="lni lni-bookmark"></i> Save It</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-job wow fadeInUp" data-wow-delay=".4s">
            <div class="shape"></div>
            <div class="feature">Featured</div>
            <div class="image">
              <img src="{{ asset('assets_landing/images/featured-job/img2.jpg') }}" alt="#" />
            </div>
            <div class="content">
              <h4><a href="job-details.html">Restaurant Services</a></h4>
              <ul>
                <li><i class="lni lni-map-marker"></i> New York</li>
                <li><i class="lni lni-briefcase"></i> Full-time</li>
                <li><i class="lni lni-dollar"></i> 80K-90K</li>
              </ul>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <div class="button">
                <a href="job-details.html" class="btn">Apply Now</a>
                <a href="bookmarked.html" class="btn save"><i class="lni lni-bookmark"></i> Save It</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-job wow fadeInUp" data-wow-delay=".6s">
            <div class="shape"></div>
            <div class="feature">Featured</div>
            <div class="image">
              <img src="{{ asset('assets_landing/images/featured-job/img3.jpg') }}" alt="#" />
            </div>
            <div class="content">
              <h4><a href="job-details.html">Share Maeket Analysis</a></h4>
              <ul>
                <li><i class="lni lni-map-marker"></i> New York</li>
                <li><i class="lni lni-briefcase"></i> Full-time</li>
                <li><i class="lni lni-dollar"></i> 80K-90K</li>
              </ul>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <div class="button">
                <a href="job-details.html" class="btn">Apply Now</a>
                <a href="bookmarked.html" class="btn save"><i class="lni lni-bookmark"></i> Save It</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-job wow fadeInUp" data-wow-delay=".2s">
            <div class="shape"></div>
            <div class="feature">Featured</div>
            <div class="image">
              <img src="{{ asset('assets_landing/images/featured-job/img4.jpg') }}" alt="#" />
            </div>
            <div class="content">
              <h4><a href="job-details.html">Medical services</a></h4>
              <ul>
                <li><i class="lni lni-map-marker"></i> New York</li>
                <li><i class="lni lni-briefcase"></i> Full-time</li>
                <li><i class="lni lni-dollar"></i> 80K-90K</li>
              </ul>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <div class="button">
                <a href="job-details.html" class="btn">Apply Now</a>
                <a href="bookmarked.html" class="btn save"><i class="lni lni-bookmark"></i> Save It</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-job wow fadeInUp" data-wow-delay=".4s">
            <div class="shape"></div>
            <div class="feature">Featured</div>
            <div class="image">
              <img src="{{ asset('assets_landing/images/featured-job/img5.jpg') }}" alt="#" />
            </div>
            <div class="content">
              <h4><a href="job-details.html">Auto Mobile Services</a></h4>
              <ul>
                <li><i class="lni lni-map-marker"></i> New York</li>
                <li><i class="lni lni-briefcase"></i> Full-time</li>
                <li><i class="lni lni-dollar"></i> 80K-90K</li>
              </ul>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <div class="button">
                <a href="job-details.html" class="btn">Apply Now</a>
                <a href="bookmarked.html" class="btn save"><i class="lni lni-bookmark"></i> Save It</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-job wow fadeInUp" data-wow-delay=".6s">
            <div class="shape"></div>
            <div class="feature">Featured</div>
            <div class="image">
              <img src="{{ asset('assets_landing/images/featured-job/img6.jpg') }}" alt="#" />
            </div>
            <div class="content">
              <h4><a href="job-details.html">IT & Networing Sevices</a></h4>
              <ul>
                <li><i class="lni lni-map-marker"></i> New York</li>
                <li><i class="lni lni-briefcase"></i> Full-time</li>
                <li><i class="lni lni-dollar"></i> 80K-90K</li>
              </ul>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <div class="button">
                <a href="job-details.html" class="btn">Apply Now</a>
                <a href="bookmarked.html" class="btn save"><i class="lni lni-bookmark"></i> Save It</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /End Featured Job Area -->

<!-- Start Clients Area -->
<div class="client-logo-section">
  <div class="container">
    <div class="client-logo-wrapper">
      <div class="client-logo-carousel d-flex align-items-center justify-content-between">
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client1.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client2.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client3.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client4.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client5.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client6.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client2.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client3.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client4.png') }}" alt="#" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Clients Area -->

<!-- Login Modal -->
<div class="modal fade form-modal" id="login" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog max-width-px-840 position-relative">
    <button type="button" class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper" data-dismiss="modal"><i class="lni lni-close"></i></button>
    <div class="login-modal-main">
      <div class="row no-gutters">
        <div class="col-12">
          <div class="row">
            <div class="heading">
              <h3>Login From Here</h3>
              <p>
                Log in to continue your account <br />
                and explore new jobs.
              </p>
            </div>
            <div class="social-login">
              <ul>
                <li>
                  <a class="linkedin" href="#"><i class="lni lni-linkedin-original"></i> Log in with LinkedIn</a>
                </li>
                <li>
                  <a class="google" href="#"><i class="lni lni-google"></i> Log in with Google</a>
                </li>
                <li>
                  <a class="facebook" href="#"><i class="lni lni-facebook-original"></i> Log in with Facebook</a>
                </li>
              </ul>
            </div>
            <div class="or-devider">
              <span>Or</span>
            </div>
            <form action="/">
              <div class="form-group">
                <label for="email" class="label">E-mail</label>
                <input type="email" class="form-control" placeholder="example@gmail.com" id="email" />
              </div>
              <div class="form-group">
                <label for="password" class="label">Password</label>
                <div class="position-relative">
                  <input type="password" class="form-control" id="password" placeholder="Enter password" />
                </div>
              </div>
              <div class="form-group d-flex flex-wrap justify-content-between">
                <!-- Default checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault">Remember password</label>
                </div>
                <a href="" class="font-size-3 text-dodger line-height-reset">Forget Password</a>
              </div>
              <div class="form-group mb-8 button">
                <button class="btn">Log in</button>
              </div>
              <p class="text-center create-new-account">Don’t have an account? <a href="#">Create a free account</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Login Modal -->

<!-- Signup Modal -->
<div class="modal fade form-modal" id="signup" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog max-width-px-840 position-relative">
    <button type="button" class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper" data-dismiss="modal"><i class="lni lni-close"></i></button>
    <div class="login-modal-main">
      <div class="row no-gutters">
        <div class="col-12">
          <div class="row">
            <div class="heading">
              <h3>
                Create a free Account <br />
                Today
              </h3>
              <p>
                Create your account to continue <br />
                and explore new jobs.
              </p>
            </div>
            <div class="social-login">
              <ul>
                <li>
                  <a class="linkedin" href="#"><i class="lni lni-linkedin-original"></i> Import from LinkedIn</a>
                </li>
                <li>
                  <a class="google" href="#"><i class="lni lni-google"></i> Import from Google</a>
                </li>
                <li>
                  <a class="facebook" href="#"><i class="lni lni-facebook-original"></i> Import from Facebook</a>
                </li>
              </ul>
            </div>
            <div class="or-devider">
              <span>Or</span>
            </div>
            <form action="/">
              <div class="form-group">
                <label for="email" class="label">E-mail</label>
                <input type="email" class="form-control" placeholder="example@gmail.com" />
              </div>
              <div class="form-group">
                <label for="password" class="label">Password</label>
                <div class="position-relative">
                  <input type="password" class="form-control" placeholder="Enter password" />
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="label">Confirm Password</label>
                <div class="position-relative">
                  <input type="password" class="form-control" placeholder="Enter password" />
                </div>
              </div>
              <div class="form-group d-flex flex-wrap justify-content-between">
                <!-- Default checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" />
                  <label class="form-check-label" for="flexCheckDefault">Agree to the <a href="#">Terms & Conditions</a></label>
                </div>
              </div>
              <div class="form-group mb-8 button">
                <button class="btn">Sign Up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Signup Modal -->
@endsection
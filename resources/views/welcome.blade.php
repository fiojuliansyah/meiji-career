@extends('layouts.guest')

@section('content')
<main class="main">
  <section class="section-box-2">
    <div class="container">
      <div class="banner-hero banner-single banner-single-bg">
        <div class="block-banner text-center">
          <h3 class="wow animate__animated animate__fadeInUp"><span class="color-brand-2">{{ $careers->count() }} Jobs</span> Available Now</h3>
          <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero repellendus magni,
            <br class="d-none d-xl-block">atque delectus molestias quis?</div>
          <div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
            <form method="GET" action="{{ route('welcome') }}">
              <input class="form-input input-keysearch mr-10" type="text" name="keyword" placeholder="Your keyword..." value="{{ request()->keyword }}">
              <button class="btn btn-default btn-find font-sm">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>  
    <section class="section-box mt-30">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
            <div class="content-page">
              <div class="row">
                @foreach ($careers as $career)  
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                      <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left"><span class="flash"></span>
                              <div class="right-info">
                                  <a class="name-job" href="{{ route('job.detail', $career->slug) }}">{{ $career->name }}</a>
                                  <span class="location-small">{{ $career->location->name }}</span>
                              </div>
                          </div>
                          <div class="card-block-info">
                              <h6><a href="{{ route('job.detail', $career->slug) }}">{{ $career->department->name }}</a></h6>
                              <div class="mt-5"><span class="card-briefcase">{{ $career->job_type }}</span><span class="card-time">{{ \Carbon\Carbon::parse($career->created_at)->diffForHumans() }}</span></div>
                              <p class="font-sm color-text-paragraph mt-15">{!! \Str::limit(strip_tags($career->description), 50) !!}</p>
                              <div class="card-2-bottom mt-30">
                                  <div class="row">
                                      <div class="col-lg-5 col-5 text-end">
                                          <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm_{{ $career->slug }}">Apply now</div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Modal Apply Now for Each Job -->
                  <div class="modal fade" id="ModalApplyJobForm_{{ $career->slug }}" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content apply-job-form">
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              <div class="modal-body pl-30 pr-30 pt-50">
                                  <div class="text-center">
                                      <p class="font-sm text-brand-2">{{ $career->name }}</p>
                                      <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
                                      <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer.</p>
                                  </div>
                                  <form class="login-register text-start mt-20 pb-30" action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <input type="hidden" name="career_id" value="{{ $career->id }}">
                                      <div class="form-group">
                                          <label class="form-label" for="input-1">Full Name *</label>
                                          <input class="form-control" id="input-1" type="text" required="" name="name" placeholder="Steven Job">
                                      </div>
                                      <div class="form-group">
                                          <label class="form-label" for="input-2">Email *</label>
                                          <input class="form-control" id="input-2" type="email" required="" name="email" placeholder="stevenjob@gmail.com">
                                      </div>
                                      <div class="form-group">
                                          <label class="form-label" for="number">Contact Number *</label>
                                          <input class="form-control" id="number" type="text" required="" name="phone" placeholder="(+01) 234 567 89">
                                      </div>
                                      <div class="form-group">
                                          <label class="form-label" for="des">Description</label>
                                          <input class="form-control" id="des" type="text" required="" name="description" placeholder="Your description...">
                                      </div>
                                      <div class="form-group">
                                          <label class="form-label" for="file">Upload Resume</label>
                                          <input class="form-control" id="file" name="resume" type="file">
                                      </div>
                                      <div class="login_footer form-group d-flex justify-content-between">
                                          <label class="cb-container">
                                              <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>
                                          </label><a class="text-muted" href="page-contact.html">Lean more</a>
                                      </div>
                                      <div class="form-group">
                                          <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>
                                      </div>
                                      <div class="text-muted text-center">Do you need support? <a href="page-contact.html">Contact Us</a></div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach

              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="sidebar-shadow none-shadow mb-30">
              <div class="sidebar-filters">
                <form method="GET" action="{{ route('welcome') }}">
                  <div class="sidebar-shadow none-shadow mb-30">
                      <div class="sidebar-filters">
                          <div class="filter-block head-border mb-30">
                              <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
                          </div>
              
                          <!-- Filter Lokasi -->
                          <div class="filter-block mb-30">
                              <div class="form-group select-style select-style-icon">
                                  <select class="form-control form-icons select-active" name="location_id">
                                      <option value="">All Locations</option>
                                      @foreach($locations as $location)
                                          <option value="{{ $location->id }}" {{ request()->location_id == $location->id ? 'selected' : '' }}>
                                              {{ $location->name }}
                                          </option>
                                      @endforeach
                                  </select><i class="fi-rr-marker"></i>
                              </div>
                          </div>
              
                          <!-- Filter Department -->
                          <div class="filter-block mb-30">
                              <h5 class="medium-heading mb-10">Department</h5>
                              <div class="form-group">
                                  <ul class="list-checkbox">
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="department[]" value="all" {{ in_array('all', request()->department ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">All</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      @foreach($departments as $department)
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="department[]" value="{{ $department->id }}" {{ in_array($department->id, request()->department ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">{{ $department->name }}</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      @endforeach
                                  </ul>
                              </div>
                          </div>
              
                          <!-- Filter Experience Level -->
                          <div class="filter-block mb-30">
                              <h5 class="medium-heading mb-10">Experience Level</h5>
                              <div class="form-group">
                                  <ul class="list-checkbox">
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="experience[]" value="Internship" {{ in_array('Internship', request()->job_level ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Internship</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_level[]" value="Entry Level" {{ in_array('Entry Level', request()->job_level ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Entry Level</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_level[]" value="Associate" {{ in_array('Associate', request()->job_level ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Associate</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_level[]" value="Mid Level" {{ in_array('Mid Level', request()->job_level ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Mid Level</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_level[]" value="Director" {{ in_array('Director', request()->job_level ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Director</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                  </ul>
                              </div>
                          </div>
              
                          <!-- Filter Onsite/Remote -->
                          <div class="filter-block mb-30">
                              <h5 class="medium-heading mb-10">Onsite/Remote</h5>
                              <div class="form-group">
                                  <ul class="list-checkbox">
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="work_type[]" value="On-site" {{ in_array('On-site', request()->work_type ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">On-site</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="work_type[]" value="Remote" {{ in_array('Remote', request()->work_type ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Remote</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="work_type[]" value="hybrid" {{ in_array('hybrid', request()->work_type ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Hybrid</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                  </ul>
                              </div>
                          </div>
              
                          <!-- Filter Job Type -->
                          <div class="filter-block mb-20">
                              <h5 class="medium-heading mb-15">Job type</h5>
                              <div class="form-group">
                                  <ul class="list-checkbox">
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_type[]" value="Full Time" {{ in_array('Full Time', request()->job_type ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Full Time</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_type[]" value="Part Time" {{ in_array('Part Time', request()->job_type ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Part Time</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_type[]" value="Remote Jobs" {{ in_array('Remote Jobs', request()->job_type ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Remote Jobs</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                      <li>
                                          <label class="cb-container">
                                              <input type="checkbox" name="job_type[]" value="Freelance" {{ in_array('Freelance', request()->job_type ?? []) ? 'checked' : '' }}>
                                              <span class="text-small">Freelancer</span><span class="checkmark"></span>
                                          </label>
                                      </li>
                                  </ul>
                              </div>
                          </div>
              
                          <!-- Button Submit -->
                          <button class="btn btn-default" type="submit">Apply Filters</button>
                      </div>
                  </div>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('modals')

@endsection

@if(session('success'))
    @push('js')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'Okay'
        });
    </script>
    @endpush
@endif
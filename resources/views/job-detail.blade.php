@extends('layouts.guest')


@section('content')
<main class="main">
    <section class="section-box mt-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="box-border-single">
              <div class="row mt-10">
                <div class="col-lg-8 col-md-12">
                  <h3>{{ $career->name }}</h3>
                  <div class="mt-0 mb-15"><span class="card-briefcase">{{ $career->job_type }}</span><span class="card-time">{{ \Carbon\Carbon::parse($career->created_at)->diffForHumans() }}</span></div>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end">                              
                  <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                </div>
              </div>
              <div class="border-bottom pt-10 pb-10"></div>
              <div class="banner-hero banner-image-single mt-10 mb-20"><img src="/frontend/assets/imgs/page/job-single-2/img.png" alt="Meiji"></div>
              <div class="job-overview">
                <h5 class="border-bottom pb-15 mb-30">Overview</h5>
                <div class="row">
                  <div class="col-md-6 d-flex">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/industry.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description industry-icon mb-10">Department</span><strong class="small-heading"> {{ $career->department->name }}</strong></div>
                  </div>
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/job-level.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description joblevel-icon mb-10">Job level</span><strong class="small-heading">{{ $career->job_level }}</strong></div>
                  </div>
                </div>
                {{-- <div class="row mt-25">
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/salary.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description salary-icon mb-10">Salary</span><strong class="small-heading">$800 - $1000</strong></div>
                  </div>
                  <div class="col-md-6 d-flex">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/experience.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description experience-icon mb-10">Experience</span><strong class="small-heading">1 - 2 years</strong></div>
                  </div>
                </div> --}}
                <div class="row mt-25">
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/job-type.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10">Job type</span><strong class="small-heading">{{ $career->job_type }}</strong></div>
                  </div>
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/deadline.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Deadline</span><strong class="small-heading">{{ $career->deadline_date }}</strong></div>
                  </div>
                </div>
                <div class="row mt-25">
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/updated.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10">Updated</span><strong class="small-heading">{{ $career->updated_at }}</strong></div>
                  </div>
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="/frontend/assets/imgs/page/job-single/location.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Location</span><strong class="small-heading">{{ $career->location->name }}</strong></div>
                  </div>
                </div>
              </div>
              <div class="content-single">
                {!! $career->description !!}
              </div>
              <div class="single-apply-jobs">
                <div class="row align-items-center">
                  <div class="col-md-5"><a class="btn btn-default mr-15" href="#">Apply now</a><a class="btn btn-border" href="#">Save job</a></div>
                  <div class="col-md-7 text-lg-end social-share">
                    <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Share this</h6><a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox" src="/frontend/assets/imgs/template/icons/share-fb.svg"></a><a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox" src="/frontend/assets/imgs/template/icons/share-tw.svg"></a><a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox" src="/frontend/assets/imgs/template/icons/share-red.svg"></a><a class="d-inline-block d-middle" href="#"><img alt="jobBox" src="/frontend/assets/imgs/template/icons/share-whatsapp.svg"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
            <div class="sidebar-border">
              <div class="sidebar-heading">
                <div class="avatar-sidebar">
                  <figure><img alt="jobBox" src="/frontend/assets/imgs/template/icon.png"></figure>
                  <div class="sidebar-info"><span class="sidebar-company">Meiji Indonesia</span><span class="card-location">{{ $career->location->name }}</span></div>
                </div>
              </div>
              <div class="sidebar-list-job">
                <div class="box-map">
                    {{ $career->location->map }}
                </div>
                <ul class="ul-disc">
                  <li>{{ $career->location->address }}</li>
                  <li>Phone: {{ $career->location->phone }}</li>
                  <li>Email: {{ $career->location->email }}</li>
                </ul>
              </div>
            </div>
            <div class="sidebar-border">
              <h6 class="f-18">Similar jobs</h6>
              <div class="sidebar-list-job">
                <ul>
                    @foreach ($relatedCareer as $item) 
                        <li>
                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                            <div class="image"><a href="job-details.html"><img src="/frontend/assets/imgs/template/icon.png" alt="Meiji" width="50%"></a></div>
                            <div class="info-text">
                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">{{ $item->name }}</a></h5>
                            <div class="mt-0"><span class="card-briefcase">{{ $item->job_type }}</span><span class="card-time">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></div>
                        </div>
                        </li>
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('modals')
<div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content apply-job-form">
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body pl-30 pr-30 pt-50">
          <div class="text-center">
            <p class="font-sm text-brand-2">Job Application </p>
            <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
            <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer.                   </p>
          </div>
          <form class="login-register text-start mt-20 pb-30" action="#">
            <div class="form-group">
              <label class="form-label" for="input-1">Full Name *</label>
              <input class="form-control" id="input-1" type="text" required="" name="fullname" placeholder="Steven Job">
            </div>
            <div class="form-group">
              <label class="form-label" for="input-2">Email *</label>
              <input class="form-control" id="input-2" type="email" required="" name="emailaddress" placeholder="stevenjob@gmail.com">
            </div>
            <div class="form-group">
              <label class="form-label" for="number">Contact Number *</label>
              <input class="form-control" id="number" type="text" required="" name="phone" placeholder="(+01) 234 567 89">
            </div>
            <div class="form-group">
              <label class="form-label" for="des">Description</label>
              <input class="form-control" id="des" type="text" required="" name="Description" placeholder="Your description...">
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
@endsection
@extends('layouts.master-without-nav')
@section('title')
Register as a Cooperative
@endsection
@section('content')

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index" class="d-inline-block auth-logo">
                                <h1 style="color: white;" class="mt-3">INDIG.CO</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-8">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Create New Account as a Cooperative</h5>
                                <p class="text-muted">Get your free cooperative account now</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form class="needs-validation" method="POST" action="{{ route('register-cooperative.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                                                <input required type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" id="nik" placeholder="Enter nik" required>
                                                @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter nik
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Cooperative Name<span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="Enter cooperative name" required>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter cooperative name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="since_year" class="form-label">Since Year <span class="text-danger">*</span></label>
                                                <input required type="number" class="form-control @error('since_year') is-invalid @enderror" name="since_year" value="{{ old('since_year') }}" id="since_year" placeholder="Enter since year" required>
                                                @error('since_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter since year
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="owner_name" class="form-label">Owner Name <span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" id="owner_name" placeholder="Enter owner name" required>
                                                @error('owner_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter owner name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" id="company_name" placeholder="Enter company name" required>
                                                @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter company name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input required type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="useremail" placeholder="Enter email address" required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter email
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="website" class="form-label">Url Website</label>
                                                <input required type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" id="website" placeholder="Enter url website" required>
                                                @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter url website
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="contact" class="form-label">Contact <span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" id="contact" placeholder="Enter contact" required>
                                                @error('contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter contact
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fax" class="form-label">FAX <span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax') }}" id="fax" placeholder="Enter fax" required>
                                                @error('fax')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter fax
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Province <span class="text-danger">*</span></label>
                                                <select class="form-select" name="provinsi" id="provinsi" required>
                                                    <option selected disabled>Choose..</option>
                                                    @foreach($provinces as $key => $provinsi)
                                                    <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('fax')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter fax
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Regency <span class="text-danger">*</span></label>
                                                <select class="form-select" name="kabupaten" id="kabupaten" required>
                                                    <option selected disabled>Choose..</option>
                                                </select>
                                                @error('fax')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter fax
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="userpassword" class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="Enter password" required>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Please enter password
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="input-password">Confirm Password</label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="input-password" placeholder="Enter Confirm Password" required>

                                                <div class="form-floating-icon">
                                                    <i data-feather="lock"></i>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="logo" class="form-label">Logo Cooperative <span class="text-danger">*</span></label>
                                                <input required type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}" id="logo" placeholder="Upload logo" required>
                                                @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="invalid-feedback">
                                                    Upload logo
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the
                                            indigco <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                of Use</a></p>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success w-100">Sign Up</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Already have an account ? <a href="{{ url('login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <script type="text/javascript">
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(function() {

                    $('#provinsi').on('change', function() {
                        let id_provinsi = $('#provinsi').val();

                        $.ajax({
                            type: 'POST',
                            url: "{{url('getkabupaten')}}",
                            data: {
                                id_provinsi: id_provinsi,
                            },
                            cache: false,

                            success: function($msg, $id) {
                                $("#kabupaten").html($msg);
                            },
                            error: function(data) {
                                console.log('error:', data);
                            }
                        })
                    });
                });
            });
        </script>

        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
@endsection
@extends('layouts.credential')

@section('title', 'Sign In')

@section('content')

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block"><b>DPL </b>ERP</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your
                                        Account</h5>
                                    <p class="text-center small">Enter your username & password to
                                        login</p>
                                </div>

                                <form action="{{ route('login') }}" method="POST" class="row g-3 needs-validation">
                                    @csrf

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">E-mail</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" type="email" id="email" name="email"
                                                value="{{old('email')}}" class="form-control" id="email" required>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            id="yourPassword" required>

                                    </div>

                                    <div class="col-12">
                                        <div class="">
                                            <label class="form-check-label" for="rememberMe">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">I forgot
                                                    my password</a>
                                                @endif
                                            </label>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="{{route('register')}}">Create
                                                an account</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Powered by : <a href="https://sasinna.com/" target="_blank">Sasinna</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

@endsection
<x-guest-layout>
    <section id="wrapper" class="login-register login-sidebar "
        style="background-image:url(primary/assets/images/background/login-register.jpg);">
        <div class="login-box card  pt-5 background-trs">
            <div class="card-body">
                
                <form class="form-horizontal form-material text-center mt-5" id="loginform" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="spacing"></div>
                    <a href="{{ route('login') }}" class="db">
                        <img src="{{ asset('primary/assets/images/Logo_atar_white.png') }}" alt="Home" />
                    </a>
                    <x-jet-validation-errors class="alert alert-danger mt-5" />
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="email"  placeholder="Email addresse" type="email" name="email" :value="old('email')" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" placeholder="Password" type="password" name="password" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </div>
                                <div class="ml-auto">
                                    <a href="{{ route('password.request') }}" >
                                        <i class="fas fa-lock m-r-5"></i> Forgot pwd?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log
                                In</button>
                        </div>
                    </div>                    
                </form>

            </div>
        </div>
    </section>
</x-guest-layout>

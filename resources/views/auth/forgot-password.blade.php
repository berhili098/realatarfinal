{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<x-guest-layout>
    <section id="wrapper" class="login-register login-sidebar "
    style="background-image:url(primary/assets/images/background/login-register.jpg);">
    <div class="login-box card  pt-5 background-trs">
        <div class="card-body">
            
            <form class="form-horizontal form-material"  method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="spacing"></div>
                <div class="text-center pt-5 pb-5">
                    <a href="{{ route('login') }}" class="db text-center">
                        <img src="{{ asset('primary/assets/images/Logo_atar_white.png') }}" alt="Home" />
                    </a>
                </div>
                <x-jet-validation-errors class="mb-4" />
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p>Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                            type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</x-guest-layout>
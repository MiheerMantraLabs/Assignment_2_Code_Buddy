@include('includes.header')

<section class="login-screen" id="google_translate_element">
    <form action="{{route('verify-login')}}" method="post">
        <div class="heading-title text-center mt-5">
            <h1 style="font-family: 'Raleway', sans-serif;"><b>Code<strong
                        style="background-color: #fedc3b; padding: 0 20px;">Buddy</strong></b></h1>
            <div class="slogan" style="font-family: 'Raleway', sans-serif; color: black">Learn, Think & Build</div>
        </div>
        <div class="login-box p-5 m-auto mt-5 mb-5"
            style="max-width: 600px; background-color: white; border-radius: 12px;">
            <h1 class="mb-0 pb-0"><b>Login</b></h1>
            <p class="mt-0 pt-0" style="font-size: 12px; color: #b4b2b2; font-family: 'Raleway', sans-serif;">Login here
                your account</p>
                @csrf
                <span class="text-danger">
                    @if (Session::has('error'))
                        {{Session::get('error')}}
                    @endif
                </span>
            <input type="text" name="email" class="form-control p-3 border-2 mt-3" placeholder="Username or Email address"
                value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
                <input type="password" name="password" class="form-control p-3 border-2 mt-3" placeholder="Password"
                value="">
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
                <div class="form-check mt-2 click_show_pass">
                    <input type="checkbox" id="show-pass" class="form-check-input">
                    <label for="show-pass" class="form-check-label">Show password</label>
                </div>
                <div class="forget-pass p-2" style="text-align: right;">
                    <a href="#" style="color: black; visibility: hidden;" title="disabled"><b>Reset Password?</b></a>
                </div>
            <button type="submit" class="form-control p-3 mt-3" style="background-color: #fedc3b; color: black"><b><i
                        class="bi bi-shield-lock"></i> &nbsp; Secure Login</b></button>
            <p class="mb-0 pb-0 text-center"
                style="font-size: 12px; color: #b4b2b2; font-family: 'Raleway', sans-serif;">By continuing you agree our
            </p>
            <p class="mt-0 pt-0 text-center"
                style="font-size: 12px; color: #b4b2b2; font-family: 'Raleway', sans-serif;"><a href="#">Privacy
                    Policy</a> and <a href="#">Terms of services</a></p>
        </div>
    </form>
</section>
<script>
    $('.click_show_pass').click(function() {
        if ($("#show-pass").is(':checked')) {
            $('input[name=password]').attr("type","text");
        }else{
            $('input[name=password]').attr("type","password");
        }
    });
</script>


@include('includes.footer')
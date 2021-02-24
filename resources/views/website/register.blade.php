@extends('website.layout.master')

@section('body')

<style>
input[type=text], input[type=password], input[type=number], input[type=date], input[type=email] {
    padding: 8px;
    margin: 5px 0 12px 0;
}
</style>

<div class="row col-12 mx-0 px-0">

    {{-- <img style="width: 100%;height:100%;" src="{{ asset('images/whatsapp_image_20201110_at_9.17.41_am.jpg') }}"> --}}

    {{-- <div class="row col-12 mx-0 pl-5 py-5" style="
            background-position: 100% 100%;
            background-repeat: no-repeat;
            background-position: 100% 100%;
            background-attachment: fixed;
            background-size: cover;
            background-image: url({{ asset('images/whatsapp_image_20201110_at_9.17.41_am.jpg') }}) "> --}}

        <div class="row col-12 mx-0 pl-5 py-5">

            <div  class="d-flex flex-column text-left">

                @foreach ($errors->all() as $error)
                <span class="text-sm text-danger mb-2"> {{  $error }}</span>
                @endforeach


                <form action="/register" method="post">
                  @csrf
                    <div class="container" style="background-image: url('{{asset('/images/Asset 5.png')}}');">
                      @if ( @session()->has('error') )
                          <div class="bg rounded bg-danger bg-sm text-white  alert-message p-2 m-2">
                              {{  session()->get('error') }}
                          </div>
                      @endif

                      <div class="row justify-content-center">

                        <a href="/sign-in/facebook"><i style="color: black;" class="fab fa-facebook-square fa-3x"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <a href="/sign-in/google"><i style="color: black;" class="fab fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
  
                       </div>

                      <h2 class="@if(Lang::locale() == 'ar') text-arabic @endif">{{ __('Register') }}</h2>
                       <p style="font-weight: bold" class="mb-0 @if(Lang::locale() == 'ar') text-arabic @endif">{{ __('Please fill in this form to create an account.') }}</p>
                      <hr>

                      {{-- Full Name  --}}
                      <div class="@if(Lang::locale() == 'ar') text-arabic @endif">
                        <label for="Full Name" class="mb-0"><b>{{ __('Full Name') }}</b></label>
                        <input type="text" value="{{ old("name") }}" placeholder="{{ __('Enter Full Name') }}" name="name" id="Full Name" required>
                          @error('name')
                              @foreach ($errors->get('name') as $error)
                              <span class="text-sm text-danger mb-2"> {{  $error }}</span>
                              @endforeach
                          @enderror
                      </div>
                      
                      {{-- Email  --}}
                      <div class="@if(Lang::locale() == 'ar') text-arabic @endif">
                        <label for="email" class="mb-0"><b>{{ __('Email Address') }}</b></label>
                        <input type="email" value="{{ old("email") }}" placeholder="{{ __('Enter Email') }}" name="email" id="email" required>
                        @error('email')
                            @foreach ($errors->get('email') as $error)
                            <span class="text-sm text-danger mb-2"> {{  $error }}</span>
                            @endforeach
                        @enderror
                      </div>

                      {{-- Phone Number  --}}
                      <div class="@if(Lang::locale() == 'ar') text-arabic @endif">
                        <label for="Phone Number" class="mb-0"><b>{{ __('Phone Number') }}</b></label>
                        <input type="number"  value="{{ old("phone") }}" 
                                placeholder="{{ __('Enter Phone Number') }}" name="phone" id="Phone Number" required>
                        @error('phone')
                            @foreach ($errors->get('phone') as $error)
                            <span class="text-sm text-danger mb-2"> {{  $error }}</span>
                            @endforeach
                        @enderror
                      </div>

                      {{-- Password  --}}
                      <div class="@if(Lang::locale() == 'ar') text-arabic @endif">
                          <label for="psw" class="mb-0"><b>{{ __('Password') }}</b></label>
                          <div class="input-group">
                            <input class="form-control passwordInput" type="password" value="{{ old("password") }}" placeholder="{{ __('Enter Password') }}" name="password" id="psw" required>
                            <div class="input-group-append" style="height: 39px;margin-top: 3px;">
                              <span class="input-group-text bg-dark cursor" id="basic-addon2" onclick="togglePassword()">
                                  <i class="fas fa-lock"></i>
                              </span>
                            </div>                            
                          </div>
                          @error('password')
                              @foreach ($errors->get('password') as $error)
                              <span class="text-sm text-danger mb-2"> {{  $error }}</span>
                              @endforeach
                          @enderror
                      </div>

                       {{-- Repear  --}}
                       
                       <div class="mt-3 @if(Lang::locale() == 'ar') text-arabic @endif"> <label for="psw-repeat" class="mb-0"><b>{{ __('Repeat Password') }}</b></label></div>
                        <div class="input-group @if(Lang::locale() == 'ar') text-arabic @endif">
                          {{-- <div class="input-group-prepend" style="width: inherit;"> --}}
                        <input class="form-control repeatpasswordInput" type="password" value="{{ old("repeat") }}" placeholder="{{ __('Enter Repeat Password') }}" name="password_confirmation" id="password_confirmation" required>
                        <div class="input-group-append" style="height: 39px;margin-top: 3px;">
                          <span class="input-group-text bg-dark cursor" id="basic-addon2" onclick="togglePasswordre()">
                              <i class="fas fa-lock"></i>
                          </span>
                      </div>
                          @error('repeat')
                              @foreach ($errors->get('repeat') as $error)
                              <span class="text-sm text-danger mb-2"> {{  $error }}</span>
                              @endforeach
                          @enderror
                      {{-- </div> --}}
                        </div>
                        {{-- <div class="input-group-append">
                          <span class="input-group-text bg-light cursor" id="basic-addon2" onclick="togglePassword()">
                              <i class="fas fa-lock    "></i>
                          </span>
                      </div> --}}


                      <hr style="margin-bottom: 12px !important;">
                      <div class="px-3 @if(Lang::locale() == 'ar') text-arabic @endif">
                        <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1"><p style="font-weight: bold">{{ __('By creating an account you agree to our') }} 
                          <a style="font-weight: bold">{{ __('Terms & Privacy') }}</a>.</p>
                        </div>
                      <button type="submit" class="registerbtn">{{ __('Register') }}</button>
                      {{-- <div class="row justify-content-center">

                        <a href="/sign-in/facebook"><i style="color: black;" class="fab fa-facebook-square fa-4x"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <a href="/sign-in/google"><i style="color: black;" class="fab fa-google-plus-square fa-4x" aria-hidden="true"></i></a>
  
                       </div> --}}
                    </div>
                    
                    <div class="container signin " style="background-color: #5E2719">
                      <p class="mb-0" style="color: white !important">{{ __('Already have an account?') }} &nbsp;<a style="color: white !important;font-size: 20px" href="/login">{{ __('Sign In') }}</a>.</p>
                    </div>
                  </form>
    
           </div>
    </div>
</div>

<script>

  function togglePassword () {
      var x = document.getElementsByClassName("passwordInput")[0];
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
  }

  function togglePasswordre () {
      var x = document.getElementsByClassName("repeatpasswordInput")[0];
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
  }

</script>

@endsection


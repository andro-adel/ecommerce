@extends('website.layout.master')

@section('body')


<div class="row col-12 justify-content-center mx-0 px-0">

    <form method="post" action="/login">

        @csrf
    
        <div class="text-center my-3" style="font-family: Arial, Helvetica, sans-serif;font-size:30px;font-weight: bold;">{{ __('Sign In') }}</div>
    

                @if ( @session()->has('error') )
                    <div class="bg rounded bg-danger bg-sm text-white  alert-message p-2 m-2">
                        {{  session()->get('error') }}
                    </div>
                @endif

                {{-- <div class="mb-5">
                    <a style="font-weight: bold;">{{ __('If you already have an account with us, sign in blew') }}</a>
                </div> --}}

        
                    
                        <div class="@if(Lang::locale() == 'ar') text-arabic @endif"> <Strong class="regis" style="color: #5E2719;font-size: 20px ">{{ __('Email Address') }}</Strong> </div>

                        <div class="@if(Lang::locale() == 'ar') text-arabic @endif"> <input type="email" value="" required type="email" id="email" name="email" placeholder="{{ __('Enter Email') }}"> </div><br>

                        <div class="@if(Lang::locale() == 'ar') text-arabic @endif"> <Strong class="regis" style="color: #5E2719;font-size: 20px ">{{ __('Password') }}</Strong> </div>


                        <div class="mb-3 input-group @if(Lang::locale() == 'ar') text-arabic @endif">
                            {{-- <div class="input-group-prepend" style="width: inherit;">  --}}
                                <input class="form-control passwordInput" autocomplete="off" type="password" value="" required id="password" name="password" placeholder="{{ __('Enter Password') }}">
                                <div class="input-group-append" style="height: 39px;margin-top: 3px;">
                                    <span class="input-group-text bg-dark cursor" id="basic-addon2" onclick="togglePassword()">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                           {{-- </div>  --}}
                      </div>
                        
                      

                        <div class="text-center">  
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label style="color: #5E2719;font-size: 20px " class="regis form-check-label" for="exampleCheck1">{{ __('Remember Me') }}</label>
                        </div>
                   

                    <div class="text-center my-3"> <button style="background-color: #6b0101;color:white;width:70%;height:70%;">{{ __('Sign In') }}</button></div>

                    <div class="text-center"> <a href="/forgetpassword"><Strong class="regis" style="color: #5E2719;font-size: 20px ">{{ __('Forget Password?') }}</Strong></a></div>


                     <br>
         </form>
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

</script>

@endsection





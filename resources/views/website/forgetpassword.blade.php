@extends('website.layout.master')

@section('body')



@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="bg rounded bg-danger text-white py-2 my-2 px-0 mx-0"> {{  $error }}</div>
    @endforeach
@endif

<div class="row col-12 justify-content-center mx-0 px-0 my-5">

    <form method="post" action="/forgetpassword">
        @csrf
        @if ( @session()->has('error') )
            <div class="bg rounded bg-danger bg-sm text-white  alert-message p-2 m-2">
                {{  session()->get('error') }}
            </div>
        @endif

        <div class="mb-5 mt-5">
            <a style="font-weight: bold;font-size: larger;">{{ __('If you forget your password enter your email address') }}</a>
        </div>


            
                <div> <Strong>{{ __('Email Address') }}</Strong> </div>

                <div> <input type="email" value="" required type="email" id="email" name="email" placeholder="{{ __('Enter Email') }}"> </div>


                <a href="/resetpassword"><div class="text-center my-5"> <button style="background-color: #6b0101;color:white;width:70%;height:70%;">{{ __('Submit') }}</button></div></a>


                
    </form>
</div>

@endsection


@extends('website.layout.master')

@section('body')



<div class="row col-12 flex-column py-4  px-2 justify-content-center">

    <h3 class="text-center">{{ __('Reset Password PAGE') }}</h3>
</div>

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="bg rounded bg-danger text-white py-2 my-2 px-0 mx-0"> {{  $error }}</div>
    @endforeach
@endif

@if ( @session()->has('message') )
    <div class="bg rounded bg-success bg-sm text-white  alert-message p-2 m-2">
        {{  session()->get('message') }}
    </div>
@endif

<div class="row col-12 justify-content-center mx-0 px-0 text-center">
    <form method="post" action="/resetpassword" class="col-md-6">
        @csrf 

        <div class="mt-5"> <Strong>{{ __('Enter Reset key') }}</Strong> </div>
        <div> <input  required type="text" name="key" placeholder="{{ __('Enter Reset key') }}" style="width: 40%;"> </div>

        <div class="mt-5"> <Strong>{{ __('New Password') }}</Strong> </div>
        <div> <input  required type="password" name="password" placeholder="{{ __('Enter Password') }}" style="width: 40%;"> </div>

        <div class="mt-5"> <Strong>{{ __('Repeat Password') }}</Strong> </div>
        <div> <input  required type="password" name="password_confirmation" placeholder="{{ __('Enter Repeat Password') }}" style="width: 40%;"> </div>


        <div class="text-center my-5">
           <button style="background-color: #6b0101;color:white;width:40%;height:70%;">{{ __('Submit') }}</button>
        </div>
    
    </form>
</div>

@endsection


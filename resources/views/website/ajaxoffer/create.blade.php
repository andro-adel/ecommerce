@extends('website.layout.master')

@section('body')


<div class="col-12 text-center">

    <div class="header my-3">
        <h3 class=" float-left"> Add Offer </h3>
        <div class="clearfix"></div>
    </div>


    <form id="ajaxform">
        <div class="form-group">
            <label for="name_ar">Name Arabic</label>
            <input value="{{ old('name_ar') }}" type="text"
                class="form-control @error('name_ar') border-danger @enderror" id="admin_name" name="name_ar">

            @error('name_ar')
            @foreach ($errors->get('name_ar') as $error)
            <span class="text-sm text-danger mb-2"> {{ $error }}</span>
            @endforeach
            @enderror

        </div>


        <div class="form-group">
            <label for="name_en">Name English</label>
            <input value="{{ old('name_en') }}" type="text"
                class="form-control @error('name_en') border-danger @enderror" id="name_en" name="name_en">

            @error('name_en')
            @foreach ($errors->get('name_en') as $error)
            <span class="text-sm text-danger mb-2"> {{ $error }}</span>
            @endforeach
            @enderror

        </div>


        <div class="form-group">
            <label for="details_ar">Details Arabic</label>
            <input value="{{ old('details_ar') }}" type="text"
                class="form-control @error('details_ar') border-danger @enderror" id="details_ar" name="details_ar">

            @error('details_ar')
            @foreach ($errors->get('details_ar') as $error)
            <span class="text-sm text-danger mb-2"> {{ $error }}</span>
            @endforeach
            @enderror

        </div>


        <div class="form-group">
            <label for="details_en">Details English</label>
            <input value="{{ old('details_en') }}" type="text"
                class="form-control  @error('details_en') border-danger @enderror" id="details_en" name="details_en">

            @error('details_en')
            @foreach ($errors->get('details_en') as $error)
            <span class="text-sm text-danger mb-2"> {{ $error }}</span>
            @endforeach
            @enderror

        </div>


        <div class="form-group">
            <label for="price">Price</label>
            <input value="{{ old('price') }}" type="text" class="form-control  @error('price') border-danger @enderror"
                id="price" name="price">

            @error('price')
            @foreach ($errors->get('price') as $error)
            <span class="text-sm text-danger mb-2"> {{ $error }}</span>
            @endforeach
            @enderror

        </div>




        <button class="btn btn-primary save-data">Save Admin</button>
    </form>


</div>

@endsection


@section('scripts')

<script>
    $(".save-data").click(function(event){
    event.preventDefault();
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
            type:'POST',
            url:'/offer/store',
            data: {
            _token: _token,
            'name_en': $("input[name='name_en']").val() ,
            'name_ar': $("input[name='name_ar']").val(),
            'details_en': $("input[name='details_en']").val(),
            'details_ar': $("input[name='details_ar']").val(),
            'price': $("input[name='price']").val(),
            }
            , success:function(response){
            console.log(response);
            if(response) {
            $('.success').text(response.success);
            $("#ajaxform")[0].reset();
            }
            },
        });

    });

</script>


@stop
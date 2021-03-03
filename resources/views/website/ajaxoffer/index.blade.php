@extends('website.layout.master')

@section('body')


<div class="col-12 text-center">

    <div class="header my-3">
        <h3 class=" float-left"> Manage Admins </h3>
        <a class="float-right btn btn-success cursor text-white" href="/offer/create">
            <i class="fa fa-plus mr-1" aria-hidden="true"></i>
            Create Admin
        </a>
    </div>

    <div class="table-responsive">

        <table class="table table-light table-striped table-hover">
            <thead>
                <th> ID </th>
                <th> name_en </th>
                <th> name_ar </th>
                <th> details_en </th>
                <th> details_ar </th>
                <th> price </th>
            </thead>
            <tbody>

                {{-- @foreach ($offer as $offe)
                <tr>
                    <td>{{ $offe->id }} </td>
                <td>{{ $offe->name_en }} </td>
                <td>{{ $offe->name_ar }} </td>
                <td>{{ $offe->details_en }} </td>
                <td>{{ $offe->details_ar }} </td>
                <td>{{ $offe->price }} </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>

        {{-- <div class="container">
                    {{ $admins->appends(request()->query())->links("pagination::bootstrap-4")}}
    </div> --}}

</div>

</div>

@endsection
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
                <th> # </th>
                <th> image </th>
                <th> Name </th>
                <th> Email </th>
                <th> phoneNumber </th>
                <th> Branch </th>
                <th> Status </th>
                <th> Action </th>
            </thead>
            {{-- <tbody>
                        
                        @foreach ($admins as $admin)
                            <tr>
                                <td> <a href="/admin/manage-admins/{{ $admin->id }}"> {{  $admin->id }} </a> </td>
            <td>
                @if ($admin->image)
                <img class="img-thumbnail" src="{{  asset( "/storage//" . $admin->image->image) }}"
                    onerror="this.src='/storage/users/user-default.png'">
                @else

                <img class="img-thumbnail" src="{{ asset( "/storage/users/user-default.png") }}">
                @endif
            </td>
            <td> <a href="/admin/manage-admins/{{ $admin->id }}"> {{  $admin->name }} </a></td>
            <td> {{  $admin->email }} </td>
            <td> {{  $admin->phoneNumber  }} </td>
            <td> {{  ($admin->branch) ? $admin->branch->name_en : 'No' }} </td>
            <td>
                @if($admin->status == 1)
                <span class="bg bg-success text-white text-sm px-2 rounded-pill statusBackground{{ $admin->id }}">Active
                </span>
                @else
                <span
                    class="bg bg-danger text-white text-sm px-2 rounded-pill statusBackground{{ $admin->id }}">InActive
                </span>
                @endif
            </td>
            <td>
                <span> <a href="/admin/manage-admins/{{ $admin->id }}"> <i class="fas fa-edit text-info mr-2"></i> </a>
                </span>

                <span>
                    <a data-toggle="modal" data-target="#toggleStatuts" onclick="setAdminId({{ $admin->id }})"
                        class="cursor">
                        <i
                            class="statusIcon{{ $admin->id }} @if($admin->status == 1) text-success fas fa-user-check  @else fas fa-user-times text-danger @endif"></i>
                    </a>
                </span>
                <span> <a href="/admin/address?user_id={{ $admin->id }}"> <i
                            class="fas fa-map-marker-alt text-info ml-2" aria-hidden="true"></i> </a> </span>

            </td>
            </tr>
            @endforeach
            </tbody> --}}
        </table>

        {{-- <div class="container">
                    {{ $admins->appends(request()->query())->links("pagination::bootstrap-4")}}
    </div> --}}

</div>

</div>

@endsection
@extends('admin.dashboard.dashboard')

@section('Content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{url('home')}} ">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
    <table class="table table-bordered" style="color:white">
        @if (session('deletestatus'))
        <div class="alert alert-success" style="text-align:center">
            {{session('deletestatus')}}
        </div>
        @endif
        <thead>
            <tr>
                <th>SL. NO</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contactmessages as $contactmessage)
            <tr class={{ ($contactmessage->read_status== 1)? "bg-info":"" }}>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $contactmessage->first_name }}</td>
                <td>{{ $contactmessage->last_name }}</td>
                <td>{{ $contactmessage->subject }}</td>
                <td>{{ $contactmessage->message }}</td>
                <td>
                    <a href="{{url('/view/contact')}}/{{ $contactmessage->id }}" class="btn btn-default">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr class="text-center text-danger">
                <td colspan="8">
                    Product Not Available !!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection

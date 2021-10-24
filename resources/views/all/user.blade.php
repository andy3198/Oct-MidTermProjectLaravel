@extends('index')

@section('form')

<a href="/dashboard" class="btn btn-primary mt-4">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
        <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"/>
        <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"/>
    </svg>
    <i class="bi bi-layout-text-sidebar"></i>Dashboard

</a>

<div class="container mt-4" style="background-color: rgb(157, 171, 255); padding-bottom: 10px;">

    <h1 class="text-center">List of Users</h1>

    @foreach($users as $user)
        @if ($user->gender == 'Male')
            <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: #add8e6">
        @else
            <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: #ffb6c1">
        @endif
        <div class="card-body">
            <h5 class="card-title"><i class='bx bxs-user' id="icons"></i> {{$user->name}}</h5>
            <p class="card-title"><i class='bx bxs-user' id="icons"></i> {{$user->email}}</p>
            <p class="card-title"><i class='bx bxs-user' id="icons"></i> {{$user->gender}}</p>
            <a href="/users/{{$user->id}}" class="btn btn-primary">

                Show Posts <i class="bi bi-chevron-double-right"></i>

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>

            </a>
        </div>
    </div>
    @endforeach

</div>

@endsection


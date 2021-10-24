@extends('index')

@section('form')

<a href="/users" class="btn btn-primary mt-4">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
        <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
    </svg>
    <i class="bi bi-back"></i>Back to Users
</a>

<div class="container mt-4" style="background-color: #d3d3d3">

    <h1 class="" style="padding: 6px;">{{$user->name}}</h1>

    <div class="cbody">

        @foreach($posts as $pot)
            @if ($pot->user->gender == 'Male')
                <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: #add8e6">
            @else
            <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: #ffb6c1">
            @endif

                <div class="card-body">

                    <div class="dropdown float-end">

                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$pot->category->category}}
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach(App\Models\User::whereHas('posts', function($query) use ($pot){
                                $query->where('category_id', $pot->category_id);
                                })->get() as $eu)
                                <li><a class="dropdown-item" href="/user/{{$u->id}}">{{$eu->name}}</a></li>
                            @endforeach
                        </ul>

                    </div>

                    <h5 class="card-title pb-3"><i class='bx bxs-user' id="icons"></i> {{$pot->user->name}}</h5>
                    <p class="card-text bg-white p-3" style="border-radius: 10px;">{{$pot->post}}</p>

                </div>

            </div>
        @endforeach

    </div>

</div>

@endsection


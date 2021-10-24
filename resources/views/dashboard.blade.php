@extends('index')



<div class="bottom-nav">

    <ul>
        @foreach(App\Models\Category::all() as $c)
            <li><a class="box" href="/categories/{{$c->id}}">{{$c->category}}</a></li>
        @endforeach
    </ul>

</div>

@section('form')

<div class="container-fluid">

    <a href="/dashboard1" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
        </svg>
        <i class="bi bi-back"></i>Back to Main
    </a>

    <div class="row" >

        <div class="d-flex justify-content-end mt-4">

            <a href="/dashboard" class="-2 btn btn-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                </svg>
                <i class="bi bi-house-door">Home</i>
            </a>

            <a href="/users" class="btn btn-secondary">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>

                <i class="bi bi-people-fill">Users</i>

            </a>

            <a href="" aria-labelledby="navbarDropdown" class="btn btn-secondary">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                    <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/>
                    <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>
                </svg>

                <i class="bi bi-bookmarks-fill">Category</i>

            </a>

            <a href="/post" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
                </svg>
                <i class="bi bi-file-earmark-plus-fill">Add Post</i>
            </a>
        </div>

        <div class="col-md-12" id="dashboard">


            <h1 class="card-header text-center">List Of Post</h1>

            <div class="cbody">
                @foreach($posts as $p)
                    @if ($p->user->gender == 'Male')
                        <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: #add8e6">
                    @else
                    <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: #ffb6c1">
                    @endif
                        <div class="card-body">

                            <div class="dropdown float-end">

                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$p->category->category}}
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach(App\Models\User::whereHas('posts', function($query) use ($p){
                                    $query->where('category_id', $p->category_id);
                                })->get() as $u)
                                <li><a class="dropdown-item" href="/authors/{{$u->id}}">{{$u->name}}</a></li>
                                @endforeach

                                </ul>
                            </div>

                            <h5 class="card-title pb-3"><i class='bx bxs-user' id="icons"></i> {{$p->user->name}}</h5>
                            <p class="card-text bg-white p-3" style="border-radius: 10px;">{{$p->post}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection

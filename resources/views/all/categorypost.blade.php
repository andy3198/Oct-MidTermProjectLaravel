@extends('index')

<div class="bottom-nav">
    <ul>
        @foreach(App\Models\Category::all() as $c)
        <li><a class="box" href="/categories/{{$c->id}}">{{$c->category}}</a></li>
        @endforeach
    </ul>
</div>

@section('form')

<div class="container" style="background-color: rgb(9, 240, 163); padding-bottom: 10px;">

    <h1 class="text-white pt-2 pb-2 name">{{$category->category}} Post</h1>
    <hr>

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

@endsection


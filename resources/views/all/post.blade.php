@extends('index')

@section('form')

<div class="container mt-4">

    <div class="row">

        <div class="col">

            <div class="card" id="postcard">

                <div class="card-header">
                    <h3 class="card-title text-center">New Category Post</h3>
                </div>

                <div class="card-body">

                    <form action="{{url('/post')}}" method="post">

                        {{csrf_field()}}

                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        <div class="mb-3">

                            <label for="category_id">Categories</label>

                            <select name="category_id" id="category_id" class="form-select">

                                @foreach(App\Models\Category::all() as $cat)

                                    <option value="{{$cat->id}}">{{$cat->category}}</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-3">

                            <label for="post">Post Here</label>
                            <textarea name="post" id="post" class="form-control"></textarea>

                        </div>

                        <a href="/dashboard" class="btn btn-secondary">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                            </svg>
                            <i class="bi bi-back"></i>Back

                        </a>

                        <button class="btn btn-primary" type="submit" style="width: 100px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                            </svg>
                            <i class="bi bi-save"></i>Save
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection


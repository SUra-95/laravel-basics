<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Dashboard Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>

    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <div class="row">
                    <div class="col-md-11 flex flex-row">
                        <div>
                            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                                <img src="https://img.icons8.com/?size=100&id=2797&format=png&color=000000"
                                    alt=" Logo" width="30">
                            </a>
                        </div>
                        <div>
                            <h5>Dashboard</h5>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </header>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">

                    @session('success')
                        <div class="alert alert-success" role="alert">
                            {{ $value }}
                        </div>
                    @endsession

                    <div class="container mt-5">
                        <form method="POST" action="/edit/{{ $post->id }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="title">Title</label>
                                <input type="title" class="form-control" name="title" placeholder="Enter title"
                                    value="{{ $post->title }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="content">Content</label>
                                <textarea type="textArea" class="form-control" name="content" placeholder="Enter content" rows="5">{{ $post->content }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="content">Category</label>
                                <select class="form-control rounded mt-2" aria-label="Default select example"
                                    name="category_id">
                                    <option selected>{{ $post->category->name }}</option>
                                    @foreach ($categories as $category)
                                        @if ($post->category->id != $category->id)
                                            <option value={{ $category->id }}>{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

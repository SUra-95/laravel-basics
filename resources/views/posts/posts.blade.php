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

                    <form action="{{ route('posts') }}">
                        <div class="input-group">
                            <input type="text" class="form-control rounded" name="search" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                            
                            <select class="form-control rounded mt-2 m-4" aria-label="Default select example"
                                name="category">
                                <option selected>Select Category Here</option>
                                @foreach ($categories as $cat)
                                    <option value={{ $cat->id }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-success btn-lg" type="button" onclick="window.location.href='{{ route('create') }}'">Create</button>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td><button class="btn btn-dark btn-lg" type="button" onclick="window.location.href='{{ route('edit', $post->id) }}'">Edit</button></td>
                                    <td><button class="btn btn-danger btn-lg" type="button" onclick="window.location.href='{{ route('delete', $post->id) }}'">Delete</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div>

                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

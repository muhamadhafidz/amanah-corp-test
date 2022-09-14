<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Amanah Corp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container my-5">
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
            @endif
            <h4 >Edit Data From <a href="https://jsonplaceholder.typicode.com/{{ $item->id }}">https://jsonplaceholder.typicode.com/{{ $item->id }}</a></h4>
            <form action="{{ route('update', $item->id) }}" class="mb-5" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $item->title }}">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" rows="3" name="body">{{ old('body') ? old('body') : $item->body }}</textarea>
                </div>
                <button class="btn btn-sm btn-success" type="submit">Update</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>

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
            @if(session('status'))
            <div class="alert alert-success">
               Response Status : {{ session('status') }} 
               <br>
               <b>note : update/tambah/delete data berhasil dilakukan tetapi data default API tidak dapat diubah/ditambah/didelete sehingga tidak terjadi perubahan</b>
            </div>
            @endif
            <h4>Posts Data From <a href="https://jsonplaceholder.typicode.com/">https://jsonplaceholder.typicode.com</a></h4>
            <div class="d-block text-end">
                <a href="{{ route('create') }}" class="btn btn-sm btn-success">Create Data +</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->body }}</td>
                        <td>
                            <a href="{{ route('edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>

@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">All Books</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('book.create') }}">Add Book</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <input id="searchInput" type="text" placeholder="Search Books" class="form-control" style="margin-bottom: 20px; display: block;" />
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table" id="myTable">
                        <thead>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Institute</th>
                            <th>Author</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td class="id">{{ $book->id }}</td>
                                    <td><a href="{{ route('book.details', $book) }}">{{ $book->name }}</a></td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->auther->name }}</td>
                                  <!-- #region -->
                                    <td class="edit">
                                        <a href="{{ route('book.edit', $book) }}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('book.destroy', $book) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-book">Delete</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Books Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
              
                </div>
            </div>
        </div>
    </div>
@endsection

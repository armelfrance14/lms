@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Dashboard</h2>
                </div>
            </div>
            @if (Auth::user()->role === 'admin')
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $authors }}</p>
                            <h5 class="card-title mb-0">Authors Listed</h5>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-3">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $categories }}</p>
                            <h5 class="card-title mb-0">Institutes Listed</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $books }}</p>
                            <h5 class="card-title mb-0">Books</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $students }}</p>
                            <h5 class="card-title mb-0">Students</h5>
                        </div>
                    </div>
                </div>
              
            </div>
            @else
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
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td class="id">{{ $book->id }}</td>
                                    <td><a href="{{ route('book.details', $book) }}">{{ $book->name }}</a></td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->auther->name }}</td>
                                
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
            @endif
        </div>
    </div>
@endsection

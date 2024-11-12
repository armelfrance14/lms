@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Update Book</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book.update', $book->id) }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Book Name</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Book Name" name="name" value="{{ $book->name }}" >
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Abstract</label>
                            <textarea placeholder="Abstract" name="body" class="form-control">{{ $book->body }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Institute</label>
                            <select class="form-control @error('category_id') isinvalid @enderror " name="category_id"
                                >
                                <option value="">Select Institute</option>
                                @foreach ($categories as $category)
                                    @if ($category->id == $book->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select class="form-control @error('auther_id') isinvalid @enderror " name="author_id">
                                <option value="">Select Author</option>
                                @foreach ($authors as $auther)
                                    @if ($auther->id == $book->auther_id)
                                        <option value="{{ $auther->id }}" selected>{{ $auther->name }}</option>
                                    @else
                                        <option value="{{ $auther->id }}">{{ $auther->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('auther_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" value="1" name="publisher_id" />
                        <input type="submit" name="save" class="btn btn-danger" value="Update" >  or <a href="{{ route('books') }}">Cancel
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

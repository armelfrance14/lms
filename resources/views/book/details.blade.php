@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Book Details</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
               
                        <div class="form-group">
                            <label>Book Name</label>
                            <p>{{$book->name}}</p>
                        </div>

                        <div class="form-group">
                            <label>Abstract</label>
                            <p>{{$book->body}}</p> 
                        </div>

                        <div class="form-group">
                            <label>Institute</label>
                            <p>{{$book->category->name}}</p>
                          
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <p>{{$book->auther->name}}</p>
                          
                        </div>
                      
                </div>
            </div>
        </div>
    </div>

@endsection

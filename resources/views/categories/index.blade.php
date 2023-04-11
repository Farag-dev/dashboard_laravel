@extends('layouts.dashboard')
@section('page_title')
All Categories
@endsection
@section('content')

        <div class="card  mx-auto p-3">
            <div class="card-header">
              <h3 class="card-title">All Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              @if (session('success'))
              <div class="alert alert-success text-center text-white">
                      <h1>{{ session('success') }}</h1>
              </div>
              @endif
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>name </th>
                    <th>slug</th>
                    <th>parent</th>
                    <th>description</th>
                    <th>edit</th>
                    <th>delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="text-center"><a href="#"><i class="fa fa-edit text-warning"></i></a></td>
                    <td class="text-center">
                        <form action="{{ route('categories.destroy', ['category'=> $category->id ]) }}" method="post">
                            @csrf
                        @method("DELETE")
                        <button type="submit" class="btn-danger"><i class="fa fa-trash text-white"></i></button>
                        </form>
                    </td>
                  </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

@endsection


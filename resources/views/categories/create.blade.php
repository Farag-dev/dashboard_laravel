@extends('layouts.dashboard')
@section('page_title')
Add Categories
@endsection
@section('content')
<div class="card w-75 mx-auto p-3">
    <form action="{{ route('categories.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">name category</label>
        <input type="text"name="name"id="name"class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="name category">
        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">description</label>
        <textarea type="text"name="description"id="description"class="form-control form-control-lg @error('description') is-invalid @enderror"  ></textarea>
        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
    <label for="parent_id">parent category</label>
    <select name="parent_id" id="parent_id" class="form-control form-control-lg @error('parent_id') is-invalid @enderror">
        <option value="">no parent</option>
        @foreach ($parents as $parent)
        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
        @endforeach
    </select>
    @error('parent_id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group text-center">
    <button type="submit"class="btn btn-primary btn-lg ">Add </button>
    </div>
    </form>
</div>
@endsection

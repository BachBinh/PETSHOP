@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Category list</strong></h1>

<div class="">
  @if(session()->has('success'))
      <div class="alert alert-success mb-3">
          {{session('success')}}
      </div>
  @endif
</div>

<a class="btn btn-primary" href="{{route('danhmuc.create')}}">Add categories</a>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category' name:</th>
        <th colspan="2">Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach($Danhmucs as $danhmuc)
      <tr>
        <td>{{$danhmuc->id_danhmuc}}</td>
        <td>{{$danhmuc->ten_danhmuc}}</td>
        <td colspan="2">
          <a href="{{ route('danhmuc.edit', ['danhmuc' => $danhmuc]) }}" class="btn btn-warning mb-2">Edit</a>
          <form method="post" action="{{route('danhmuc.destroy', ['danhmuc' => $danhmuc])}}">
              @csrf
              @method('delete')
              <input type="submit" class="btn btn-danger" value="Delete"
              onclick="return confirm('Are you sure you want to delete this category?')">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

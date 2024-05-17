@extends('admin_layout')
@section('admin_content')

    <h1 class="h3 mb-3"><strong>Keywords searched: {{ $tukhoa }}</strong></h1>

    <div class="d-flex justify-content-between">
        <a class="btn btn-primary" href="{{route('product.create')}}">Add product</a>

        <form action="{{route('adminSearch')}}" method="GET" class="d-flex">
            <input type="text" value="" placeholder="Search..." name="tukhoa" class="form-control" style="width: unset;" required>
            <button class="btn btn-primary" type="submit">
              <i class="align-middle" data-feather="search"></i>
            </button>
        </form>

      </div>

    <table class="table">
        <thead>
            <tr>
            <th>Product's Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($searchs as $product)
            <tr>
            <td>{{$product->tensp}}</td>
            <td><img src="{{ asset($product->anhsp)}}" width="120" height="120" alt=""></td>
            <td>{{$product->soluong}}</td>
            <td>{{$product->giasp}}</td>
            <td colspan="2">
                <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-warning mb-2">Edit</a>
                <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"
                    onclick="return confirm('Are you sure you want to delete this product?')">
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item @if($searchs->currentPage() === 1) disabled @endif">
                <a class="page-link" href="{{ $searchs->url(1) }}&tukhoa={{ $tukhoa }}">First</a>
            </li>
            <li class="page-item @if($searchs->currentPage() === 1) disabled @endif">
                <a class="page-link" href="{{ $searchs->previousPageUrl() }}&tukhoa={{ $tukhoa }}">Previous</a>
            </li>
            @for ($i = 1; $i <= $searchs->lastPage(); $i++)
                <li class="page-item @if($searchs->currentPage() === $i) active @endif">
                    <a class="page-link" href="{{ $searchs->url($i) }}&tukhoa={{ $tukhoa }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item @if($searchs->currentPage() === $searchs->lastPage()) disabled @endif">
                <a class="page-link" href="{{ $searchs->nextPageUrl() }}&tukhoa={{ $tukhoa }}">Next</a>
            </li>
            <li class="page-item @if($searchs->currentPage() === $searchs->lastPage()) disabled @endif">
                <a class="page-link" href="{{ $searchs->url($searchs->lastPage()) }}&tukhoa={{ $tukhoa }}">Last</a>
            </li>
        </ul>
    </nav>

@endsection

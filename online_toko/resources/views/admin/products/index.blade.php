@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1 class="mb-4">Daftar Produk</h1>

  <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

  <form action="{{ route('products.index') }}" method="GET" class="mb-4">
    <div class="row g-2">
      <div class="col-md-8">
        <div class="input-group">
          <input type="text" name="query" class="form-control" placeholder="Cari produk..." value="{{ request('query') }}">
          <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
      </div>

      <div class="col-md-4">
        <select name="category_id" class="form-select" onchange="this.form.submit()">
          <option value="">Semua Kategori</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
    </div>
  </form>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($products as $product)
      <div class="col">
        <div class="card h-100">
          @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" alt="{{ $product->name }}">
          @else
            <img src="{{ asset('images/default-image.jpg') }}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" alt="{{ $product->name }}">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
          </div>

          <div class="d-flex justify-content-between p-3">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
  </div>

</div>
@endsection

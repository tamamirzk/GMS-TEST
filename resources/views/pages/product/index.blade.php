@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Product</h1>
            <a href="{{ route('create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Add Product
            </a>

        </div>

        <div class="container">
            <div class="card">
              @if (session('successMsg'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                        <th scope="col">description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                          function rupiah($i){
                            return "Rp " . number_format($i,2,',','.');
                          }
                          ($i = 1)
                        @endphp
                      @foreach ($products as $product)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->size}}</td>
                        <td>{{ rupiah($product->price) }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                          <a href="{{ url('edit', $product->id) }}" class="btn btn-info">
                              <i class="fa fa-pencil-alt"></i>
                          </a>
                          <form action="{{ url('delete', $product->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger">
                                  <i class="fa fa-trash"></i>
                              </button>
                          </form>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>

    </div>

@endsection
@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Product "{{ $products->name }}"</h1> 
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    {{-- <tr>
                        <th>ID</th>
                        <td>{{ $products->id }}</td>
                    </tr> --}}
                    <tr>
                        <th>Product Name</th>
                        <td>{{ $products->name }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ $products->category->name }}</td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td>{{ $products->size_min }} - {{ $products->size_max }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>@currency($products->price)</td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td>{{ $products->detail }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $products->description }}</td>
                    </tr>
                    <tr>
                        <th>Image  </th>
                        <td>
                            @foreach ($products->galleries as $galleries)
                            <img src="{{ Storage::url($galleries->directory) }}" style="width: 100px">
                            @endforeach
                        </td>
                        {{-- <td>
                            <table class="table table-bordered">
                            @php
                            ($i = 1)
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <th>Image {{ $i++ }}</th>
                                </tr>
                                
                                <tr>
                                    <td>{{ ($product->galleries->directory) }}</td>
                                </tr>
                            @endforeach
                                
                                
                                
                            </table>
                        </td> --}}
                    </tr>
                </table>
            </div>
        </div>


    </div>
    
@endsection
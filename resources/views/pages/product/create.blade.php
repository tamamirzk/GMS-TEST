@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product </h1> 
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
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf                                       
                    <div class="form-group">
                        <label for="title">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="">
                    </div> 
                    <div class="form-group">
                        <label for="inputState">Size</label>
                        <select id="inputState" name="size" class="form-control">
                            <option value="">
                                - Select Size -
                            </option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                    </div>      
                 
                    <div class="form-group">
                        <label for="title">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" rows="3"></textarea>
                     </div>
                                                            
                    <button type="submit" class="mt-4 btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>


    </div>
    
@endsection
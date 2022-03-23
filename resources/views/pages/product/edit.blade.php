@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Product "{{ $products->name }}"</h1> 
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
                <form action="{{ url('update', $products->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Product Name :</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $products->name }}">
                    </div>

                    <div class="form-group">
                        <label for="inputState">Size</label>
                        <select id="inputState" name="size" class="form-control">
                            <option value="">
                                - Select Size -
                            </option>
                            
                            <option value="S" @php if($products->size == 'S'){echo "selected";} @endphp>S</option>
                            <option value="M" @php if($products->size == 'M'){echo "selected";} @endphp>M</option>
                            <option value="L" @php if($products->size == 'L'){echo "selected";} @endphp>L</option>
                            <option value="XL" @php if($products->size == 'XL'){echo "selected";} @endphp>XL</option>
                            <option value="XXL" @php if($products->size == 'XXL'){echo "selected";} @endphp>XXL</option>

                        </select>
                    </div>    
 
                    <div class="form-group" P>
                        <label for="title">Price :</label>
                        <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $products->price }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description :</label>
                        <textarea class="form-control" name="description" placeholder="Description" rows="3" value="{{ $products->description }}">{{ $products->description }}</textarea>
                    </div>   
                
                    <button type="submit" class="btn btn-primary btn-block mt-4">
                        Simpan
                    </button>
                </form>
            </div>
        </div>


    </div>
    
@endsection
@foreach ($products->galleries  as $galleries)
    <div id ="productImage" class="productImage">
        <label for="filenames">Edit Image :</label>
        <div class="deleteProduct border rounded mb-2">
            <input id="demo" type="file" class="ml-2" name="filenames[]" placeholder="Image" value="{{ $galleries->directory }}">
            <label for="image">Old Image :</label>
            <img src="{{ Storage::url($galleries->directory) }}" class="gambar ml-2 mr-4 mt-1 mb-1" style="width: 100px">
            <a data-url="{{ route('deleteImg',$galleries->id) }}" 
                class="deleteImg btn btn-xs btn-danger" 
                data-id="{{ $galleries->id }}" data-token="{{ csrf_token() }}">
                Delete
            </a>
        </div>
    </div>
@endforeach
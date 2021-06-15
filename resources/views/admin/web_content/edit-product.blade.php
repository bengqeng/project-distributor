<div class="row">
    <div class="col-sm-6">
        <input type="hidden" name="id" value="{{$product['slug']}}" id="id-data">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="title"
                class="form-control"
                value="{{$product['title']}}" minlength="4" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="10" cols="50" id="description"
                class="form-control" value="{{ $product['description'] }}"
                required="">{{ $product['description'] }}</textarea>
                <span id="descriptionError" class="alert-message text-danger"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Produk by Kategory</label>
            <select class="form-control"
                id="category_id" name="category_id" required="">
                <option class="text-disabled" value="">Pilih Kategori</option>
                @foreach ($categoryProduct as $item)
                    @if ($item->id == $product['category_id'])
                        <option value={{$item->id}} selected>{{$item->category_name}}</option>
                    @else
                        <option value={{$item->id}}>{{$item->category_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>


        @foreach (range(1, 4) as $x)

            <div class="form-group">
                <label>Gambar {{$x}}</label>
                <select class="form-control @error('images_id') is-invalid @enderror"
                    id="images_{{$x}}" name="images_{{$x}}" required="">
                    <option class="text-disabled" value="">Pilih Gambar</option>
                    @foreach ($listImage as $image)
                        <?php
                            $name = "images_". $x;
                        ?>
                        <option value="{{ $image->id }}" {{ $product[$name] == $image->id ? "selected": ""}}>
                            {{ $image->title }}
                        </option>
                    @endforeach
                    {{-- @foreach ($cat_image as $item)
                    @if ($item->id == $product->images_$x)
                    <option value={{$item->id}} selected>{{$item->title}}</option>
                    @else
                    <option value={{$item->id}}>{{$item->title}}</option>
                    @endif
                    @endforeach --}}
                </select>
            </div>

        @endforeach

    </div>
</div>

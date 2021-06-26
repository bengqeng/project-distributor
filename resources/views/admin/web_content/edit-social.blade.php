<div class="row">
    <div class="col-sm-6">
        <input type="hidden" name="id" value="{{$social->id}}" id="id-data">
        <div class="form-group">
            <label>Social Media</label>
            <select class="form-control" name="media_type" required="">
                <option class="text-disabled" value="">Pilih Social Media</option>
                {{-- <option value="{{$carousel->images_id_id}}" selected>{{$carousel->images_id_id}}</option> --}}
                <option value={{$social->media_type}} selected>{{$social->media_type}}</option>
                <option class="text" value="Instagram">Instagram</option>
                <option class="text" value="Facebook">Facebook</option>
                <option class="text" value="Twitter">Twitter</option>
                <option class="text" value="Tiktok">Tiktok</option>
            </select>
            <span id="gambarError" class="alert-message text-danger"></span>
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{$social->url}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>URL Share</label>
            <input type="text" name="url_share" id="url_share" class="form-control" value="{{$social->url_share}}">
        </div>
    </div>
</div>

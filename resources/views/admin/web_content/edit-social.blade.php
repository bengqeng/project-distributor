<div class="row">
    <div class="col-sm-6">
        <input type="hidden" name="id" value="{{$social->id}}" id="id-data">
        <div class="form-group">
            <label>Sosial Media</label>
            <input type="text" name="media_type" id="media_type" class="form-control" value="{{$social->media_type}}"
                required>
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

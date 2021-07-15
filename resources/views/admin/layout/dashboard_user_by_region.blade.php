<div class="row">
    @foreach ($user_region as $region)
        <div class="col-3">
            <a class="info-box mb-3 bg-info" href="{{ route('admin.users_by_region').'?kode_area='.$region['nama_provinsi']->id_prov }}">
                <div class="info-box-content users-region-dashboard">
                    <span class="info-box-text">{{ $region['nama_provinsi']->nama }}</span>
                    <label>Total<br>{{ $region['total_member'] }}</label>
                    <label>Agent<br>{{ $region['agent'] }}</label>
                    <label>Distributor<br>{{ $region['distributor'] }}</label>
                </div>
            </a>
        </div>
    @endforeach
</div>

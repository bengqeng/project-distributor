@extends('admin.master_admin')
@section('title', 'Graphic')

@section('main-content')
    ini about us
@endsection

    @section('js-script')
      <script>
        $(document).ready(function () {
          Swal.fire('Hello world!');
          console.log("asd");
        });
      </script>
      <!-- /.content -->
    @endsection


@extends('user.layout.tamplate')

@section('content')  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white">{{$namaKategori}}</h1>
          </div>
          <div class="col-sm-6">
        
          </div>
        </div>
      </div>
      <div class="card card-default">

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped" id="fileTable">
                    <thead>
                    <tr>
                      <th style="width: 10%;">No.</th>
                      <th style="width: 60%;">Nama</th>
                      <th style="width: 60%;">File</th>
                      <th style="width: 60%;">Kategori</th>
                      <th style="width: 60%;">Uploader</th>
                      <th style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if($data->count() > 0)
                        @foreach($data as $i => $g)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$g->nama}}</td>
                            <td>{{$g->file_name}}</td>
                            <td>{{$g->kategori}}</td>
                            <td>{{$g->uploader}}</td>
                            <td>
                              <a href="{{ asset('storage/' . $g->file) }}" target="_blank" class="btn btn-sm btn-success">Download</a>
                            </td>
                          </tr>
                        @endforeach
                      @else
                          <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
                      @endif
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>File</th>
                      <th>Kategori</th>
                      <th>Uploader</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </div> 
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
{{-- </div> --}}
<!-- ./wrapper -->
@endsection

{{-- @push('scripts')
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
@endpush
</body>
</html> --}}

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      $(document).ready(function (){
        $('#fileTable').DataTable();
        // $('#modulTable').DataTable();
      });
    </script>
@endpush

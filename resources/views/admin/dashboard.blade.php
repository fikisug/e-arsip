@extends('admin.layout.tamplate')

@section('content')  
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">
                10
                <small>%</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      
      <div class="card card-default">

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <button type="button" class="btn btn-success btn-sm float-right" onclick="tambahData()">
                    Tambah Kategori
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped" id="data_admin">
                    <thead>
                    <tr>
                      <th style="width: 10%;">No.</th>
                      <th style="width: 60%;">Kategori</th>
                      <th style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      {{-- @if ($admin->count() > 0)
                        @foreach ($admin as $i => $a)
                        <tr>
                          <td class="text-center">{{++$i}}</td>
                          <td>{{$a->username}}</td>
                          <td></td>
                          <td class="d-flex justify-content-around">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailAdmin">
                              <i class="fa-solid fa-circle-info"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAdminModal">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAdminModal">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      @else
                        <tr><td colspan="6" class="text-center">No matching records found</td></tr>
                      @endif --}}
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Kategori</th>
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

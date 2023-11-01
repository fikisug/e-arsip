@extends('user.layout.tamplate')

@section('content')  
    <!-- Main content -->
    {{-- <section class="content"> --}}
    <div class="container-fluid">
      <div class="row">
        @foreach ($jmlFile as $k)
        <div class="col-12 col-sm-6 col-md-3">
          <a href="{{ route('kategori2', ['id' => $k->id]) }}" class="" style="color: black; background-color: #f7f8f9">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1" style="background-color: #ffa501; color: white"><i class="fas fa-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{$k->nama}}</span>
              <span class="info-box-number">{{$k->count}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        @endforeach
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        <!-- /.col -->
      </div>
    </div>
      
      {{-- <div class="card card-default">

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped" id="data_admin">
                    <thead>
                    <tr>
                      <th style="width: 10%;">No.</th>
                      <th style="width: 60%;">Nama</th>
                      <th style="width: 60%;">File</th>
                      <th style="width: 60%;">File</th>
                      <th style="width: 60%;">Kategori</th>
                      <th style="width: 60%;">Uploader</th>
                      <th style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                    <tbody> --}}
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
                    {{-- </tbody>
                    <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>File</th>
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
      </div>  --}}
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
    {{-- <script>
      $(document).ready(function (){
        var dataAdmin = $('#data_admin').DataTable({
            processing:true,
            serverSide:true,
            stateSave: true,
            ajax:{
              url: '{{ route('dataFile.all') }}',
              dataType: 'json',
              type: 'POST',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            },
            columns:[
                {data:'nomor', name:'nomor', sortable:false, searchable:false},
                {data:'nama',name:'nama', sortable: true, searchable: true},
                {data:'file_name',name:'file_name', sortable: true, searchable: true},
                {data:'file',name:'file', sortable: true, searchable: true, visible: false},
                {data:'kategori',name:'kategori', sortable: true, searchable: true},
                {data:'uploader',name:'uploader', sortable: true, searchable: true},
                {data:'id',name:'id', sortable: false, searchable: false,
                render: function(data, type, row, meta) {
            var btn = `<div class="d-flex justify-content-around">` +
                `<form action="/file/download/${row.id}" method="get">` +
                    `<button class="btn btn-success btn-sm" data-toggle="modal"><i class="fa-solid fa-download"></i></button>` +
                `</form>` +
            `</div>`;
            return btn;
                }
                },

            ]
        });
      });
    </script> --}}
@endpush

@extends('admin.layout.tamplate')

@section('content')
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 style="color: white">Input File</h1>
    </div>
    <div class="col-sm-6">
  
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

    <div class="card card-default">

      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #f7f8f9">
                <div class="row">
                  <div class="col-md-6">
                      <h5>{{ $namaKategori }}</h5>
                  </div>
                  <div class="col-md-6 text-right">
                      <button type="button" class="btn btn-success btn-sm" onclick="tambahData()" style="background-color: #ffa501; border-color: #ffa501">
                          Upload File
                      </button>
                  </div>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped" id="data_admin">
                  <thead>
                  <tr>
                    <th style="width: 10%;">No.</th>
                    <th style="width: 40%;">Nama</th>
                    <th style="width: 40%;">File</th>
                    <th style="width: 10%;">Action</th>
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
                    <th>Nama</th>
                    <th>File</th>
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
  </div>
</section>
<!-- /.content -->

  <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModal-label" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdminModal-label"><strong>Tambah File</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row form-message"></div>
        <form id="AdminForm-add" method="POST" action="{{ url('/inputFile'.'/'.$categoryId) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name-add" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama File" required>
                <input type="hidden" class="form-control" id="kategori-add" name="kategori" value="{{ $categoryId }}" placeholder="" required>
                @error('nama')
                  <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="file">Upload File</label>
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file"value="{{ old('file') }}" placeholder="Masukkan File" style="padding: 0; height: 100%;">
                @error('file')
                  <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="AdminForm-add">Simpan</button>
      </div>
    </div>
  </div>
</div>
                       
<div class="modal fade" id="detailAdmin" tabindex="-1" role="dialog" aria-labelledby="detailAdminLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailAdminLabel"><strong>Detail Admin</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="image-preview">
              <img id="show_foto" src="" alt="" class="img-fluid rounded img-thumbnail">
            </div>
          </div>
          <div class="col-md-8">
            <label><strong>Username</strong></label>
            <p id="show_username"></p>
            <label><strong>Name</strong></label>
            <p id="show_name"></p>
            <label><strong>Email</strong></label>
            <p id="show_email"></p> 
            <label><strong>User</strong></label>
            <p id="show_level_user"></p> 
          </div>                                
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="editAdminModal-label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdminModal-label"><strong>Edit Kategori</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row form-message"></div>
        <form id="AdminForm-edit" method="POST" action="{{ url('/inputKategori') }}">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama-edit" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama" required>
                @error('nama')
                  <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="AdminForm-edit">Simpan</button>
      </div>
    </div>
  </div>
</div>   

<div class="modal fade" id="deleteAdminModal" tabindex="-1" role="dialog" aria-labelledby="deleteAdminModal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteAdminModal-label"><strong>Hapus File </strong></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row form-message"></div>
            <form id="AdminForm-delete" method="POST" action="{{ url('admin/input-admin') }}" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <p>Anda yakin ingin menghapus file <strong><span id="show_nama"></span></strong> ?</p>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-sm" form="AdminForm-delete"><i class="fa-solid fa-trash"></i></button>
          </div>
      </div>
  </div>
</div>      

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    function tambahData() {
        $('#addAdminModal').modal('show');
        $('#addAdminModal #name-add').val('');
    }

    function updateData(th){
        $('#editAdminModal').modal('show');
    
        $('#editAdminModal #nama-edit').val($(th).data('nama'));

        $('#editAdminModal #AdminForm-edit').attr('action', $(th).data('url'));
        $('#editAdminModal #AdminForm-edit').append('<input type="hidden" name="_method" value="PUT">');
    }

        function showData(element) {
        $.ajax({
            url: '{{  route('inputKategori.index') }}' + '/' + element,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#detailAdmin').modal('show');

                // $('#show_username').text(data.username);
                $('#show_name').text(data.nama);
                // $('#show_email').text(data.email);
                // if (data.level_user === 0) {
                //     $('#show_level_user').text('Admin');
                // } else {
                //     $('#show_level_user').text(data.level_user);
                // }
                // $('#show_foto').attr('src', '{{ asset('storage/') }}' + '/' + data.foto);
                // $('#$show_foto').attr('alt', data.name);
            },
            error: function () {
                alert('Error occurred while retrieving data.');
            }
        });
    }

    function deleteData(th) {
        $('#deleteAdminModal').modal('show');
        $('#show_nama').text($(th).data('nama'));
        $('#deleteAdminModal #AdminForm-delete').attr('action', $(th).data('url'));
    }

    $(document).ready(function (){
        var dataAdmin = $('#data_admin').DataTable({
            processing:true,
            serverSide:true,
            stateSave: true,
            ajax:{
              url: '{{ route('dataFile', ['id' => $categoryId]) }}',
              dataType: 'json',
              type: 'POST',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            },
            columns:[
                {data:'nomor', name:'nomor', sortable:false, searchable:false},
                {data:'nama',name:'nama', sortable: true, searchable: true},
                {data:'file_name',name:'file_name', sortable: true, searchable: true},
                {data:'id',name:'id', sortable: false, searchable: false,
                render: function(data, type, row, meta) {
                    var btn = `<div class="d-flex justify-content-around">` +
                        `<button data-url="{{ url('/inputFile/') }}/` + data + `" class="btn btn-danger btn-sm" data-toggle="modal" onclick="deleteData(this)" data-id="` + row.id + `" data-name="` + row.name + `"><i class="fa-solid fa-trash"></i></button>` +
                        `</div>`;
                    return btn;
                }
                },

            ]
        });
        // alert('DataTable initialized!');
        
        $('#AdminForm-add').submit(function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);  // Membuat objek FormData untuk mengirim data form, termasuk file
            
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: formData,  // Mengirimkan objek FormData sebagai data
                dataType: 'json',
                processData: false,  // Menonaktifkan pemrosesan data
                contentType: false,  // Menonaktifkan pengaturan tipe konten otomatis
                
                success: function(data) {
                    if (data.status) {
                      toastr.success(data.message);
                      $('#AdminForm-add')[0].reset();
                      dataAdmin.draw(false); // Reload tabel sesuai dengan halaman pagination yang sedang aktif
                      $('#AdminForm-add').attr('action');
                      $('#photo-preview-add').attr('src', '{{ asset('storage/file/img/default/foto.png') }}');
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        });

        $('#AdminForm-edit').submit(function(e) {
          e.preventDefault();

          var form = $(this);
          var formData = new FormData(form[0]);

          $.ajax({
              url: form.attr('action'),
              method: "POST",
              data: formData,
              dataType: 'json',
              processData: false,
              contentType: false,
              success: function(data) {
                  if (data.status) {
                    toastr.success(data.message);
                    dataAdmin.draw(false);
                    $('#AdminForm-edit').attr('action');
                  } else {
                      toastr.error(data.message);
                  }
              }
            });
        });

        $('#AdminForm-delete').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);

            $.ajax({
                url: form.attr('action'),
                method: "POST",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status) {
                      toastr.success(data.message);
                      dataAdmin.draw(false); // Reload tabel sesuai dengan halaman pagination yang sedang aktif
                      $('#AdminForm-delete').attr('action');
                      $('#deleteAdminModal').modal('hide');
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        });
    });
</script>
@endpush
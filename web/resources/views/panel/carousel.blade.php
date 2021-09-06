@extends('layouts.main')

@section('title')
    SK Bupati
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
            <div class="table-responsive">
                <table class="table" id="dt-table">
                    <thead class=" text-primary">
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    <img src="{{ url('carousel_images/' . $item->image) }}" alt="" style="width: 100px">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <button style="width: 100px; margin-bottom: 2px" class="btn btn-sm btn-info" onclick="
                                    $('#edit_form').attr('action', '{{ route('panel.carousel.update', $item->id) }}')
                                    $('#edit_title').val('{{ $item->title }}');
                                    $('#edit_description').val('{{ $item->description }}');
                                    $('#editModal').modal('show');
                                    ">Edit</button>

                                    <button style="width: 100px; margin-bottom: 2px" onclick="
                                    if(confirm('Anda yakin?')) {
                                        $(this).find('form').submit();
                                    }
                                    " class="btn btn-sm btn-danger">
                                        <form method="post" action="{{ route('panel.carousel.destroy', $item->id) }}">
                                            @csrf
                                        </form>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('modals')

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form enctype="multipart/form-data" action="{{ route('panel.carousel.store') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image" accept="jpg, jpeg, png" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="edit_form" enctype="multipart/form-data" action="" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" id="edit_description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image" accept="png, jpg, jpeg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection

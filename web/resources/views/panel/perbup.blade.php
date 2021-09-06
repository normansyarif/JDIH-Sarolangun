@extends('layouts.main')

@section('title')
    Peraturan Bupati
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
            <div class="table-responsive">
                <table class="table" id="dt-table">
                    <thead class=" text-primary">
                        <tr>
                            <th>No Perbup</th>
                            <th>Tanggal</th>
                            <th>Tahun</th>
                            <th>Judul</th>
                            <th>Ditambahkan<br>pada</th>
                            <th>File</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->no }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->year }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a
                                    href="{{ url('ViewerJS/#../files/perbup/' . $item->link) }}">Lihat</a>
                                </td>
                                <td>
                                    <button style="width: 100px; margin-bottom: 2px" class="btn btn-sm btn-info" onclick="
                                    $('#edit_form').attr('action', '{{ route('panel.perbup.update', $item->id) }}')
                                    $('#edit_no').val('{{ $item->no }}');
                                    $('#edit_tanggal').val('{{ $item->tanggal }}');
                                    $('#edit_year').val('{{ $item->year }}');
                                    $('#edit_title').val('{{ $item->title }}');
                                    $('#editModal').modal('show');
                                    ">Edit</button>

                                    <button style="width: 100px; margin-bottom: 2px" onclick="
                                    if(confirm('Anda yakin?')) {
                                        $(this).find('form').submit();
                                    }
                                    " class="btn btn-sm btn-danger">
                                        <form method="post" action="{{ route('panel.perbup.destroy', $item->id) }}">
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
            <form enctype="multipart/form-data" action="{{ route('panel.perbup.store') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nomor</label>
                        <input type="text" class="form-control" name="no" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" name="year" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="">File (.pdf)</label>
                        <input type="file" class="form-control" name="link" accept="pdf" required>
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
                        <label for="">Nomor</label>
                        <input type="text" class="form-control" id="edit_no" name="no" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" id="edit_year" name="year" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="">File (.pdf)</label>
                        <input type="file" class="form-control" name="link" accept="pdf">
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

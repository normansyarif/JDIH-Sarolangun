@extends('layouts.main')

@section('title')
    Buat Berita
@endsection

@section('content')

    <div class="card">
        <form enctype="multipart/form-data" method="post" action="{{ route('panel.news.store') }}" class="card-body">
            @csrf
            <div class="mb-3">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <div class="mb-3">
                <label for="">Isi Berita</label>
                <textarea class="form-control" name="content" id="ck" cols="50" rows="50"></textarea>
            </div>
            <div class="mb-3">
                <div class="col">
                    <div class="text-center">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
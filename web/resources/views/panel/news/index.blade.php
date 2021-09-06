@extends('layouts.main')

@section('title')
    Berita
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <a href="{{ route('panel.news.create') }}" class="btn btn-primary float-right">Tambah</a>
            <div class="table-responsive">
                <table class="table" id="dt-table">
                    <thead class=" text-primary">
                        <tr>
                            <th>Tanggal</th>
                            <th style="width: 5%">Gambar</th>
                            <th>Judul</th>
                            <th>Ditambahkan<br>pada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                                <td>
                                    <img src="{{ url('news_images/thumbs/' . $item->image) }}" style="width: 100%; border-radius: 5px" alt="">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('panel.news.edit', $item->id) }}" style="width: 100px; margin-bottom: 2px" class="btn btn-sm btn-info">Edit</a>

                                    <button style="width: 100px; margin-bottom: 2px" onclick="
                                    if(confirm('Anda yakin?')) {
                                        $(this).find('form').submit();
                                    }
                                    " class="btn btn-sm btn-danger">
                                        <form method="post" action="{{ route('panel.news.destroy', $item->id) }}">
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
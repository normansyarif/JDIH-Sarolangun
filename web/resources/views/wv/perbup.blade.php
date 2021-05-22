<?php

date_default_timezone_set('Asia/Jakarta'); ?>

<html>

<head>
    <title>Peraturan Bupati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .button-custom {
            background-color: #FF817C !important;
            color: white !important;
            border-radius: 20px !important;
        }

        .button-custom:hover {
            background-color: #ff4038 !important;
        }

        label {
            color: #606060;
            font-style: italic;
            font-size: .9em;
        }

        .detail-text {
            font-weight: bold;
        }
        table {
            font-size: .85em;
        }

    </style>
</head>

<body>

    <div class="row" style="--bs-gutter-x: 0">
        <div class="col-12 col-md-6 offset-md-3 mt-4">
            <div style="padding: 5px 15px">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No. Perbup</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->no }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <button onclick="
                                $('#no').html('{{ $item->no }}');
                                $('#year').html('{{ $item->year }}');
                                $('#title').html('{{ $item->title }}');
                                $('#url').val('http:\/\/docs.google.com/gview?embedded=true&url={{ url('files/perbup/' . $item->link) }}');
                                $('#detailModal').modal('show');
                                " class="btn btn-sm button-custom">Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nomor Peraturan Bupati</label>
                        <p class="detail-text" id="no"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Tahun</label>
                        <p class="detail-text" id="year"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <p class="detail-text" id="title"></p>
                        <input id="url" type="hidden" />
                    </div>
                    <div class="col" style="margin-top: 30px; margin-bottom: 30px">
                        <div class="text-center">
                            <div>
                                <a onclick="
                                $.LoadingOverlay('show');
                                window.location.href = $('#url').val();
                                " class="btn button-custom" id="link">Lihat PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#detailModal').modal('hide')"
                        data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.22/index.umd.min.js" integrity="sha512-djmgTiVR15A/7fON+ojDzFYrRsfVkzQZu07ZVb0zLC1OhA2iISP39Lzs05GqSKF0vPjkLzL5hBC+am6po7dKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        const ptr = PullToRefresh.init({
          mainElement: 'body',
          onRefresh() {
            window.location.reload();
          }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

    </script>


</body>

</html>

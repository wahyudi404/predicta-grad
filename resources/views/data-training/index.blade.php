@extends('layouts.app')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Data Training</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Training</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <h3 class="card-title"> Data Training </h3>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- Alert --}}
                    @include('components.alert')

                    {{-- Error Validation --}}
                    @if ($errors->post->any())
                        <x-alert-validation :errors="$errors->post" />
                    @endif

                    @if ($errors->put->any())
                        <x-alert-validation :errors="$errors->put" />
                    @endif
                    {{-- Error Validation --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center data-training text-sm">
                            <thead>
                                <tr>
                                    {{-- <th rowspan="3" class="align-middle">No</th> --}}
                                    <th rowspan="3" style="min-width: 100px" class="align-middle">Nama</th>
                                    <th colspan="{{ count($studies) }}">Data Training</th>
                                    <th colspan="2" class="align-middle">Lulus/Tidak Lulus</th>
                                    {{-- <th rowspan="3" class="align-middle">Aksi</th> --}}
                                </tr>
                                <tr>
                                    @foreach ($studies as $study)
                                    <th>{{ $study->name }}</th>
                                    @endforeach
                                    <th rowspan="2" class="align-middle">T/TL</th>
                                    <th rowspan="2" style="min-width: 150px" class="align-middle">Catatan</th>
                                </tr>
                                <tr>
                                    @foreach ($studies as $study)
                                        <th class="text-nowrap">Min {{ $study->min }} - Max {{ $study->max }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                    <tr>
                                        {{-- <td>{{ ++$key }}</td> --}}
                                        <td>{{ $row->name }}</td>
                                        @foreach ($row->participantScores as $participantScore)
                                            <td>{{ $participantScore->score }}</td>
                                        @endforeach
                                        <td>
                                            @if ($row->isPassed == 2)
                                                <span class="badge badge-success">Lulus</span>
                                            @elseif ($row->isPassed == 1)
                                                <span class="badge badge-danger">Tidak Lulus</span>
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->notes }}</td>
                                        {{-- <td></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            {{-- Modal --}}
            <div class="modal fade" id="modal-add">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Training Peserta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form-data-training" action="{{ route('data-training.store') }}" method="POST">
                                <div class="form-group">
                                    <label for="participant_id">Nama Peserta</label>
                                    <select id="participant_id" class="form-control select2" style="width: 100%;">
                                        <option value="">-- Pilih --</option>
                                        @foreach ($participants as $participant)
                                            <option value="{{ $participant->id }}">{{ $participant->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-participant"></div>
                                </div>
                                <h5><b>Nilai:</b></h5>
                                <div class="row">
                                    @foreach ($studies as $study)
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="score-{{ $study->id }}">{{ $study->name }}</label>
                                                <input type="number" id="score-{{ $study->id }}" class="form-control"
                                                    placeholder="Nilai">
                                                <div class="alert alert-danger mt-2 d-none" role="alert"
                                                    id="alert-score-{{ $study->id }}"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="0">-</option>
                                        <option value="1">Lulus</option>
                                        <option value="2">Tidak Lulus</option>
                                    </select>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-status"></div>
                                </div>
                                <div class="form-group">
                                    <label for="note">Catatan</label>
                                    <textarea id="note" class="form-control"></textarea>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-note"></div>
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" id="btn-delete" class="d-none btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            <form class="d-none" id="form-delete" action="" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <h3 class="card-title"> Kategorisasi Data </h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center data-training text-sm">
                            <thead>
                                <tr>
                                    {{-- <th rowspan="3" class="align-middle">No</th> --}}
                                    <th rowspan="3" style="min-width: 100px" class="align-middle">Nama</th>
                                    <th colspan="{{ count($studies) }}">Kategorisasi Data Training</th>
                                    <th colspan="2" class="align-middle">Lulus/Tidak Lulus</th>
                                    {{-- <th rowspan="3" class="align-middle">Aksi</th> --}}
                                </tr>
                                <tr>
                                    @foreach ($studies as $study)
                                    <th>{{ $study->name }}</th>
                                    @endforeach
                                    <th rowspan="2" class="align-middle">T/TL</th>
                                    <th rowspan="2" style="min-width: 150px" class="align-middle">Catatan</th>
                                </tr>
                                <tr>
                                    @foreach ($studies as $study)
                                        <th class="text-nowrap">Min {{ $study->min }} - Max {{ $study->max }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                    <tr>
                                        {{-- <td>{{ ++$key }}</td> --}}
                                        <td>{{ $row->name }}</td>
                                        @foreach ($row->participantScores as $participantScore)
                                            <td>
                                                {!!
                                                ($participantScore->score > $participantScore->study->min) ?
                                                    "<span class='badge badge-success'>Tinggi</span>" :
                                                    "<span class='badge badge-danger'>Rendah</span>"
                                                !!}
                                            </td>
                                        @endforeach
                                        <td>
                                            @if ($row->isPassed == 2)
                                                <span class="badge badge-success">Lulus</span>
                                            @elseif ($row->isPassed == 1)
                                                <span class="badge badge-danger">Tidak Lulus</span>
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->notes }}</td>
                                        {{-- <td></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
                }
            })

            $('.btn-edit').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let origin_of_institution = $(this).data('origin_of_institution');
                let address = $(this).data('address');

                $('#modal-edit form').attr('action', '/peserta/' + id);
                $('#modal-edit #name').val(name);
                $('#modal-edit #origin_of_institution').val(origin_of_institution);
                $('#modal-edit #address').val(address);
            });

            $('.btn-delete').on('click', function() {
                let id = $(this).data('id');
                $('#modal-delete form').attr('action', '/peserta/' + id);
            });

            $('.data-training').DataTable({
                columnDefs: [{
                        orderable: true,
                        targets: 0
                    }, // Kolom Nama dapat di-sort (index 1)
                    {
                        orderable: false,
                        targets: '_all'
                    } // Kolom lain tidak bisa di-sort
                ],
                order: [[0, 'asc']],
                "responsive": false,
                "autoWidth": false
            });

            $('#form-data-training').on('submit', function(e) {
                e.preventDefault();
                let data = {
                    'participant_id': $('#participant_id').val(),
                    'status': $('#status').val(),
                    'note': $('#note').val(),
                    'scores': [],
                };
                let studies = @json($studies);

                studies.forEach(study => {
                    data.scores.push({
                        'study_id': study.id,
                        'score': $('#score-' + study.id).val()
                    });
                })

                // reset alert
                $('#alert-participant').removeClass('d-block');
                $('#alert-participant').addClass('d-none');
                studies.forEach((study, index) => {
                    $('#alert-score-' + study.id).removeClass('d-block');
                    $('#alert-score-' + study.id).addClass('d-none');
                })
                $('#alert-status').removeClass('d-block');
                $('#alert-status').addClass('d-none');

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    cache: false,
                    data: data,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            $('#modal-add').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(error) {
                        let errors = error.responseJSON;

                        if (errors.participant_id) {
                            //show alert
                            $('#alert-participant').removeClass('d-none');
                            $('#alert-participant').addClass('d-block');

                            //add message to alert
                            $('#alert-participant').html(error.responseJSON.participant_id[0]);
                        }

                        studies.forEach((study, index) => {
                            if (errors['scores.' + index + '.score']) {
                                //show alert
                                $('#alert-score-' + study.id).removeClass('d-none');
                                $('#alert-score-' + study.id).addClass('d-block');

                                //add message to alert
                                $('#alert-score-' + study.id).html(error.responseJSON[
                                    'scores.' + index + '.score'][0]);
                            }
                        })

                        if (errors.status) {
                            $('#alert-status').removeClass('d-none');
                            $('#alert-status').addClass('d-block');
                            $('#alert-status').html(error.responseJSON.status[0]);
                        }
                    }
                });
            });

            $('#participant_id').on('change', function() {
                let val = $(this).val()
                let studies = @json($studies);

                // reset form
                $('#modal-add .modal-title').text('Tambah Data Training Peserta');
                studies.forEach((study, index) => {
                    $('#score-' + study.id).val('');
                })
                $('#status').val('').trigger('change');
                $('#note').val('');
                $('#form-data-training button[type=submit]').text('Simpan');
                $('#btn-delete').addClass('d-none');


                if (val != '') {
                    $.ajax({
                        url: `/peserta/${val}/nilai`,
                        method: 'GET',
                        cache: false,
                        success: function(response) {
                            let data = response.data;
                            if (data.participant_scores.length > 0) {
                                $('#modal-add .modal-title').text('Data Training Peserta ' + data
                                    .name);
                                data.participant_scores.forEach((ps, index) => {
                                    $('#score-' + ps.study_id).val(ps.score);
                                })
                                $('#status').val(data.isPassed).trigger('change');
                                $('#note').val(data.notes);
                                // ubah text submit
                                $('#form-data-training button[type=submit]').text('Update');
                                // form delete action
                                $('#btn-delete').removeClass('d-none');
                                // form delete action
                                $('#form-delete').attr('action', '/data-training/' + data.id);
                            }
                        }
                    })
                }
            })

            $('#btn-delete').on('click', function() {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $('#form-delete').attr('action'),
                            method: 'DELETE',
                            cache: false,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    location.reload();
                                });
                            }
                        })
                    }
                })
            });
        });
    </script>
@endsection

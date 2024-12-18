@extends('layouts.app')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Peserta</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Peserta</li>
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
                        <h3 class="card-title"> Data Peserta </h3>
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

                    <table class="datatable table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Asal Lembaga</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peserta->name }}</td>
                                    <td>{{ $peserta->origin_of_institution }}</td>
                                    <td>{{ $peserta->address }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button
                                                data-toggle="modal"
                                                data-target="#modal-edit"
                                                data-id="{{ $peserta->id }}"
                                                data-name="{{ $peserta->name }}"
                                                data-origin_of_institution="{{ $peserta->origin_of_institution }}"
                                                data-address="{{ $peserta->address }}"
                                                class="btn btn-edit btn-warning btn-sm"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button
                                                data-toggle="modal"
                                                data-target="#modal-delete"
                                                data-id="{{ $peserta->id }}"
                                                class="btn btn-delete btn-danger btn-sm"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Asal Lembaga</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            {{-- Modal Add --}}
            <div class="modal fade" id="modal-add">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Peserta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('peserta.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name', 'post') is-invalid @enderror">
                                    @error('name', 'post') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="origin_of_institution">Asal Lembaga</label>
                                    <input type="text" name="origin_of_institution" id="origin_of_institution" class="form-control @error('origin_of_institution', 'post') is-invalid @enderror">
                                    @error('origin_of_institution', 'post') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" name="address" id="address" class="form-control @error('address', 'post') is-invalid @enderror">
                                    @error('address', 'post') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            {{-- Modal Edit --}}
            <div class="modal fade" id="modal-edit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Peserta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name', 'put') is-invalid @enderror">
                                    @error('name', 'put') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="origin_of_institution">Asal Lembaga</label>
                                    <input type="text" name="origin_of_institution" id="origin_of_institution" class="form-control @error('origin_of_institution', 'put') is-invalid @enderror">
                                    @error('origin_of_institution', 'put') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" name="address" id="address" class="form-control @error('address', 'put') is-invalid @enderror">
                                    @error('address', 'put') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            {{-- Modal Delete --}}
            <div class="modal fade" id="modal-delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Peserta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
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
        });
    </script>
@endsection

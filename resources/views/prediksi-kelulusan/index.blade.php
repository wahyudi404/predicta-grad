@extends('layouts.app')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Prediksi Kelulusan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Prediksi Kelulusan</li>
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
                        <h3 class="card-title"> Form Prediksi Kelulusan Siswa Baru </h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="form-prediksi" action="">
                        <div class="row">
                            <div class="col-12"><h5><b>Data Siswa:</b></h5></div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="name">Nama Siswa</label>
                                    <input type="text" id="name" class="form-control" placeholder="Masukkan nama" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="origin_of_institution">Asal Lembaga</label>
                                    <input type="text" id="origin_of_institution" class="form-control" placeholder="Masukkan asal lembaga" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" id="address" class="form-control" placeholder="Masukkan alamat" required>
                                </div>
                            </div>
                            <div class="col-12"><h5><b>Nilai:</b></h5></div>
                            @foreach ($studies as $study)
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="mapel-{{ $study->id }}">{{ $study->name }}</label>
                                    <input type="number" id="mapel-{{ $study->id }}" class="form-control" min="0" max="{{ $study->max }}" placeholder="Masukkan nilai (Max {{ $study->max }})" step="0.01" required>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="reset" class="btn btn-reset btn-default mr-2">
                                    <i class="fas fa-sync mr-2"></i> Reset</button>
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-calculator mr-2"></i>
                                    Analisis
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div id="hasil-prediksi" class="col-12 d-none">
            <div class="card">
                <div class="card-header bg-secondary">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <h3 class="card-title"> <b>Hasil Prediksi Kelulusan Siswa Baru</b> </h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3" class="text-center">Data Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="20%">Nama Siswa</td>
                                    <td id="nama-siswa"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Asal Lembaga</td>
                                    <td id="asal-lembaga"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Alamat</td>
                                    <td id="alamat"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3" class="text-center">Hasil Prediksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="20%">Probabilitas Lulus</td>
                                    <td id="probabilitas-lulus"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Probabilitas Tidak Lulus</td>
                                    <td id="probabilitas-tidak-lulus"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Kesimpulan</td>
                                    <td id="kesimpulan"></td>
                                </tr>
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
            // ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-reset').on('click', function() {
                $('#hasil-prediksi').addClass('d-none');
            })

            $('#form-prediksi').on('submit', function(e) {
                e.preventDefault();
                $('#hasil-prediksi').addClass('d-none');
                let name = $('#name').val();
                let origin_of_institution = $('#origin_of_institution').val();
                let address = $('#address').val();
                let studies = @json($studies);

                let dataSiswa = {
                    'name': name,
                    'origin_of_institution': origin_of_institution,
                    'address': address,
                }

                let nilaiSiswa = {};
                studies.forEach(study => {
                    let nilai = $('#mapel-' + study.id).val();
                    nilaiSiswa['mapel-' + study.id] = parseFloat(nilai);
                })

                $.ajax({
                    url: "{{ route('naive-bayes') }}",
                    type: "POST",
                    data: {
                        'dataSiswa': dataSiswa,
                        'nilaiSiswa': nilaiSiswa
                    },
                    success: function(response) {
                        $('#hasil-prediksi').removeClass('d-none');
                        $('#nama-siswa').text(response.siswa_baru.name);
                        $('#asal-lembaga').text(response.siswa_baru.origin_of_institution);
                        $('#alamat').text(response.siswa_baru.address);
                        let predictions = response.prediksi;
                        let probabilitas_lulus = 0;
                        let probabilitas_tidak_lulus = 0;
                        let kesimpulan = '';

                        predictions.forEach(prediction => {
                            if(prediction.status == 2) {
                                probabilitas_lulus = prediction.probabilitas;
                            }else {
                                probabilitas_tidak_lulus = prediction.probabilitas;
                            }
                        })

                        kesimpulan = (probabilitas_lulus > probabilitas_tidak_lulus) ? 'Siswa Lulus' : 'Siswa Tidak Lulus';

                        $('#probabilitas-lulus').text(probabilitas_lulus);
                        $('#probabilitas-tidak-lulus').text(probabilitas_tidak_lulus);
                        $('#kesimpulan').html(`<b>${kesimpulan}</b>`);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                })
            })
        });
    </script>
@endsection

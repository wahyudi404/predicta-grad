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
                            <div class="col-12"><h5><b>Data Siswa Baru:</b></h5></div>
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
                    {{-- Probabilitas Kelas --}}
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3" class="text-center">Probabilitas Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="20%">Total Siswa</td>
                                    <td id="total-siswa"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Siswa Lulus</td>
                                    <td id="siswa-lulus"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Siswa Tidak Lulus</td>
                                    <td id="siswa-tidak-lulus"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Probabilitas Kelas Lulus</td>
                                    <td id="probabilitas-kelas-lulus"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Probabilitas Kelas Tidak Lulus</td>
                                    <td id="probabilitas-kelas-tidak-lulus"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Probabilitas Kondisional: Untuk Kelas Lulus --}}
                    <div>
                        <table id="probabilitas-kondisional-lulus" class="table table-bordered text-center">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3" class="text-center">Probabilitas Kondisional: Untuk Kelas Lulus</th>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Probabilitas</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    {{-- Probabilitas Kondisional: Untuk Kelas Tidak Lulus --}}
                    <div>
                        <table id="probabilitas-kondisional-tidak-lulus" class="table table-bordered text-center">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3" class="text-center">Probabilitas Kondisional: Untuk Kelas Tidak Lulus</th>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Probabilitas</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    {{-- Data Siswa --}}
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3" class="text-center">Data Siswa Baru</th>
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

                    {{-- Data Nilai --}}
                    <div>
                        <table id="data-nilai-siswa-baru" class="table table-bordered text-center">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3">Data Nilai Siswa Baru</th>
                                </tr>
                                <tr>
                                    <th width="40%">Mata Pelajaran</th>
                                    <th width="30%">Nilai</th>
                                    <th width="30%">Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background: #e0e0e0">
                                    <th colspan="3" class="text-center">Keputusan</th>
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
                        // console.log(response);

                        let data_nilai_siswa_baru = response.data_nilai_siswa_baru;
                        let siswa_baru = response.siswa_baru;
                        let predictions = response.prediksi;
                        let probabilitas_lulus = 0;
                        let probabilitas_tidak_lulus = 0;
                        let kesimpulan = '';
                        let probabilitas_cond = response.probabilitas_cond;
                        let filter_p_cond_lulus = probabilitas_cond.filter(probabilitas_cond => probabilitas_cond.status == 2);
                        let filter_p_cond_tidak_lulus = probabilitas_cond.filter(probabilitas_cond => probabilitas_cond.status == 1);

                        // tampilkan tampilan hasil
                        $('#hasil-prediksi').removeClass('d-none');

                        // data siswa
                        $('#nama-siswa').text(siswa_baru.name);
                        $('#asal-lembaga').text(siswa_baru.origin_of_institution);
                        $('#alamat').text(siswa_baru.address);

                        // probabilitas kelas
                        $('#total-siswa').text(response.total_siswa);
                        $('#siswa-lulus').text(response.siswa_lulus);
                        $('#siswa-tidak-lulus').text(response.siswa_tidak_lulus);
                        $('#probabilitas-kelas-lulus').text(response.probabilitas_lulus);
                        $('#probabilitas-kelas-tidak-lulus').text(response.probabilitas_tidak_lulus);

                        // data nilai
                        $('#data-nilai-siswa-baru tbody').html('');
                        data_nilai_siswa_baru.forEach(data_nilai => {
                            let row = `
                                <tr>
                                    <td>${data_nilai.mapel}</td>
                                    <td>${data_nilai.nilai}</td>
                                    <td><span class="badge badge-${data_nilai.color}">${data_nilai.kategori}</span></td>
                                </tr>
                            `;
                            $('#data-nilai-siswa-baru tbody').append(row);
                        });

                        // probabilitas kondisional kelas lulus
                        $('#probabilitas-kondisional-lulus tbody').html('');
                        filter_p_cond_lulus.forEach(p_cond => {
                            let row = `
                                <tr>
                                    <td>${p_cond.nama_mapel}</td>
                                    <td>${p_cond.nilai_name}</td>
                                    <td>${p_cond.probabilitas}</td>
                                </tr>
                            `;
                            $('#probabilitas-kondisional-lulus tbody').append(row);
                        });

                        // probabilitas kondisional kelas tidak lulus
                        $('#probabilitas-kondisional-tidak-lulus tbody').html('');
                        filter_p_cond_tidak_lulus.forEach(p_cond => {
                            let row = `
                                <tr>
                                    <td>${p_cond.nama_mapel}</td>
                                    <td>${p_cond.nilai_name}</td>
                                    <td>${p_cond.probabilitas}</td>
                                </tr>
                            `;
                            $('#probabilitas-kondisional-tidak-lulus tbody').append(row);
                        });

                        // prediksi
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

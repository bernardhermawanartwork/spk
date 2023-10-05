@auth
@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>{{ $page_title }}</h1>
                        <span>{{ $page_description }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <a href="{{ route('cetak.saw') }}" class="btn btn-success"><i class="material-icons">print</i> Cetak Perhitungan SAW</a>
                </div>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data {{ $page_title }}</h5>
                        </div>
                        <div class="card-body">
                            <table id="tableKeputusan" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Jemaat</th>
                                        <th>Formula SAW</th>
                                        <th>Bantuan yang didapatkan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $data['id'] }}</td>
                                            <td>{{ $data['nama'] }}</td>
                                            <td><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal{{ $data['id'] }}"><i class="material-icons">visibility</i> Lihat Formula SAW</button>
                                            {{-- <td>(5 *{{ $data['pendapatan'] }}) +(3 *{{ $data['kehadiran'] }})+(2 *{{ $data['keaktifan'] }})+(1 *{{ $data['status'] }})</td> --}}
                                            <td>{{ $data['totalSkor'] }}</td>
                                            <td class="d-flex justify-content-center">
                                                aksi
                                            </td>
                                        </tr>
                                        
                                    @endforeach

                                </tbody>

                            </table>
                            @foreach ($datas as $data)
                            <div class="modal fade" id="modal{{ $data['id'] }}" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Formula SAW</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Langkah 1 : Menentukan Kriteria dan Bobot</h5>
                                            <p>
                                            Langkah pertama adalah menentukan kriteria yang akan digunakan dan memberikan bobot untuk masing-masing kriteria. Bobot ini mencerminkan tingkat pentingnya setiap kriteria dalam pengambilan keputusan. Dalam hal ini, kita akan memberikan bobot sebagai berikut:
                                            <br>
                                            <ul>
                                                <li><b>Kehadiran di Gereja (30%)</b>: Kehadiran di gereja adalah indikator seberapa aktif seseorang dalam kegiatan gereja. Semakin sering mereka hadir, semakin tinggi bobotnya.</li>
                                                <li><b>Status Janda/Duda (20%)</b>: Status janda/duda mencerminkan tingkat kerentanan seseorang. Kami memberikan bobot yang lebih tinggi untuk status ini karena biasanya mereka memiliki tanggung jawab yang lebih besar.</li>
                                                <li><b>Penghasilan (25%)</b>: Penghasilan adalah indikator kemampuan finansial. Semakin rendah penghasilan, semakin tinggi bobotnya.</li>
                                                <li><b>Keaktifan dalam Pelayanan (25%)</b>: Keaktifan dalam pelayanan gereja mencerminkan kontribusi mereka dalam komunitas gereja. Semakin aktif mereka, semakin tinggi bobotnya.</li>
                                            </ul>
                                            </p>

                                            <h5>Langkah 2: Pengumpulan Data</h5>
                                            <p>Setelah menentukan kriteria dan bobot, langkah selanjutnya adalah mengumpulkan data penerima diakonia. Misalnya, kita memiliki data sebagai berikut:
                                                <table border="1" style="collapse:collapse;width:100%">
                                                    <tr>
                                                        <th>Nama<br>{{ $data['nama'] }}</th>
                                                        <th>Kehadiran di Gereja (1-10)</th>
                                                        <th>Status Janda/Duda (0/1)</th>
                                                        <th>Penghasilan (Rupiah)</th>
                                                        <th>Keaktifan dalam Pelayanan (1-10)</th>
                                                    </tr>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                </table>
                                            </p>
                                            {{-- Langkah 3: Normalisasi Data

                                            Data perlu dinormalisasi agar memiliki skala yang seragam, sehingga bisa dijumlahkan. Kriteria kehadiran dan keaktifan dalam pelayanan memiliki rentang 1-10, sementara status janda/duda dan penghasilan hanya memiliki dua nilai. Kita akan mengonversi status janda/duda menjadi skala 1-10, dengan nilai 10 untuk janda/duda dan 0 untuk bukan janda/duda. Penghasilan juga akan dinormalisasi dengan merubah nilai-nilai tersebut ke dalam skala 1-10.

                                            Nama	Kehadiran di Gereja (1-10)	Status Janda/Duda (1-10)	Penghasilan (1-10)	Keaktifan dalam Pelayanan (1-10)
                                            Penerima 1	8	0	5	7
                                            Penerima 2	6	10	3	5
                                            Penerima 3	9	0	6	9
                                            Penerima 4	7	10	4	8
                                            Langkah 4: Menghitung Nilai SAW

                                            Selanjutnya, kita akan menghitung nilai SAW untuk setiap penerima diakonia dengan mengalikan setiap nilai kriteria dengan bobotnya dan menjumlahkannya.

                                            Penerima 1:
                                            SAW = (8 * 0.3) + (0 * 0.2) + (5 * 0.25) + (7 * 0.25) = 2.4 + 0 + 1.25 + 1.75 = 5.4

                                            Penerima 2:
                                            SAW = (6 * 0.3) + (10 * 0.2) + (3 * 0.25) + (5 * 0.25) = 1.8 + 2 + 0.75 + 1.25 = 5.8

                                            Penerima 3:
                                            SAW = (9 * 0.3) + (0 * 0.2) + (6 * 0.25) + (9 * 0.25) = 2.7 + 0 + 1.5 + 2.25 = 6.45

                                            Penerima 4:
                                            SAW = (7 * 0.3) + (10 * 0.2) + (4 * 0.25) + (8 * 0.25) = 2.1 + 2 + 1 + 2 = 7.1

                                            Langkah 5: Mengambil Keputusan

                                            Penerima 4 memiliki nilai SAW tertinggi, sehingga penerimaan diakonia akan diberikan kepada Penerima 4. Penerima 3 memiliki nilai SAW tertinggi kedua, diikuti oleh Penerima 2, dan yang terakhir Penerima 1.

                                            Ini adalah contoh sederhana penggunaan metode SAW dalam menilai penerima diakonia berdasarkan beberapa kriteria. Dalam situasi nyata, dapat ada lebih banyak penerima dan kriteria yang lebih kompleks. --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endauth


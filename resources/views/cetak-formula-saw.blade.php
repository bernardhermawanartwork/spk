<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <section>
            <div class="container-sm">
                <div class="col-md-12">
                    <h3>Langkah 1: Menentukan Kriteria dan Bobot</h3>
                    <p>Kriteria yang akan digunakan tetap sama seperti sebelumnya, namun kita akan menyesuaikan bobotnya untuk skala 1-5:
                        <ul>                        
                            <li>Kehadiran di Gereja (30%): Bobot 1 = Sangat Rendah, Bobot 5 = Sangat Tinggi.</i>
                            <li>Status Janda/Duda (20%): Bobot 1 = Bukan Janda/Duda, Bobot 5 = Janda/Duda.</i>
                            <li>Penghasilan (25%): Bobot 1 = Sangat Rendah, Bobot 5 = Sangat Tinggi.</i>
                            <li>Keaktifan dalam Pelayanan (25%): Bobot 1 = Sangat Rendah, Bobot 5 = Sangat Tinggi.</i>
                        </ul>
                    </p>
                    <h3>Langkah 2: Pengumpulan Data</h3>
                    <p>Data penerima diakonia akan tetap sama, dengan nilai-nilai pada skala 1-5. Misalnya:
                    <table border='1' class='table table-striped'>
                        <tr>
                            <th>Nama</th>
                            <th>Kehadiran di Gereja (1-5)</th>
                            <th>Status Janda/Duda (1-5)</th>
                            <th>Penghasilan (1-5)</th>
                            <th>Keaktifan dalam Pelayanan (1-5)</th>
                        </tr>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data['nama'] }}</td>
                                <td>{{ $data['kehadiran'] }}</td>
                                <td>{{$data['status']}}</td>
                                <td>{{ $data['pendapatan']}}</td>
                                <td>{{ $data['keaktifan']}}</td>
                            </tr>                            
                        @endforeach
                    </table>
                    </p>
                    <h3>Langkah 3: Menghitung Nilai SAW</h3>

                    <p>Kita akan menghitung nilai SAW seperti sebelumnya, tetapi kali ini dengan skala 1-5:
                       <table class="table table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Nama.</th>
                            <th>Formula</th>
                        </tr>
                        @php
                        $no = 1;
                        @endphp
                         @foreach ($datas as $data)
                         @php
                            $num = $no++;
                        @endphp
                         
                        <tr @if($num <= 5) class="bg bg-success" @endif>
                            <td @if($num <= 5) style="background: #AAFFAA" @else style="background: #FFAAAA" @endif>{{ $num }}</td>
                            <td @if($num <= 5) style="background: #AAFFAA" @else style="background: #FFAAAA" @endif>{{ $data['nama'] }}</td>
                            <td @if($num <= 5) style="background: #AAFFAA" @else style="background: #FFAAAA" @endif> (5 *{{ $data['pendapatan'] }}) +(3 *{{ $data['kehadiran'] }})+(2 *{{ $data['keaktifan'] }})+(1 *{{ $data['status'] }}) = {{ $data['totalSkor'] }}</td>
                        </tr>                            
                    @endforeach  
                       </table>
                    </p>

                    <h3>Langkah 4: Mengambil Keputusan</h3>
                    <p>
                    Penerima 4 memiliki nilai SAW tertinggi, sehingga penerimaan diakonia akan diberikan kepada Penerima 4. Penerima 2 memiliki nilai SAW tertinggi kedua, diikuti oleh Penerima 3, dan yang terakhir Penerima 1.

                    Dengan skala 1-5, proses pengambilan keputusan tetap sama, tetapi bobot dan nilai kriteria telah disesuaikan dengan rentang skala yang digunakan.
                    </p>

                </div>
            </div>
        </section>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
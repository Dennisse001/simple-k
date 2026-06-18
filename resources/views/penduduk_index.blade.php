@extends('template.template')

@section('content')
    <div class="container-fluid">

        <!-- Judul Halaman -->
        <h1 class="h3 mb-2 text-gray-800">Data Penduduk</h1>

        <p class="mb-4">
            Data seluruh penduduk.
        </p>

        <!-- Card Tabel -->
        <div class="card shadow mb-4">

            <!-- Header Card -->
            <div class="card-header py-1">
                <br>
                <h6 class="m-0 font-weight-bold text-primary">
                    Daftar Penduduk
                </h6>
                <br>

            </div>


            <!-- Body Card -->
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <!-- Header Tabel -->
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>JK</th>
                                <th>ALAMAT</th>
                            </tr>
                        </thead>

                        <!-- Isi Tabel -->
                        <tbody>
                            @foreach ($warga as $item)
                                <tr>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->alamat }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        <!-- Footer Tabel -->

                    </table>

                </div>
            </div>
            <div class="card-header py-1">
                <br>
                <h6 class="m-0 font-weight-bold text-primary">
                    Daftar Pengguna
                </h6>
                <br>

            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <!-- Header Tabel -->
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>EMAIL</th>

                            </tr>
                        </thead>

                        <!-- Isi Tabel -->
                        <tbody>
                            @foreach ($user as $u)
                                <tr>
                                    <td>{{ $u->name }}
                                    <td>{{ $u->email }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <!-- Footer Tabel -->

                    </table>

                </div>
            </div>

        </div>

    </div>
@endsection

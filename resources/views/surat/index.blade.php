@extends('template.template')

@section('content')
    <div class="container-fluid">

        <!-- Judul Halaman -->
        <h1 class="h3 mb-2 text-gray-800">Data Surat</h1>

        <p class="mb-4">
            Data seluruh surat yang telah diajukan oleh penduduk.
        </p>

        <!-- Card Tabel -->
        <div class="card shadow mb-4">

            <!-- Header Card -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Daftar Surat
                </h6>
                <br>
                <a href="{{ route('surat.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Tambah Data Pengajuan</span>
                </a>
            </div>


            <!-- Body Card -->
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <!-- Header Tabel -->
                        <thead>
                            <tr>
                                <th>No Surat</th>
                                <th>Jenis Surat</th>
                                <th>Nama Pemohon</th>
                                <th>NIK Pemohon</th>
                                <th>Tanggal Ajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <!-- Isi Tabel -->
                        <tbody>
                            @foreach ($semuaSurat as $s)
                                <tr>
                                    <td>{{ $s->nomor_surat }}</td>
                                    <td>{{ $s->jenis_surat }}</td>
                                    <td>{{ $s->penduduk->nama }}</td>
                                    <td>{{ $s->penduduk->nik }}</td>
                                    <td>{{ $s->tanggal_ajuan }}</td>
                                    <td><a class="btn btn-warning" href="{{ route('surat.edit', $s->id) }}">Edit</a>
                                    <form action="{{ route('surat.destroy', $s->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data surat ini?')"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <!-- Footer Tabel -->
                        {{-- <tfoot>
                        <tr>
                            <th>No Surat</th>
                            <th>Jenis Surat</th>
                            <th>Nama Pemohon</th>
                            <th>NIK Pemohon</th>
                            <th>Tanggal Ajuan</th>
                        </tr>
                    </tfoot> --}}

                    </table>

                </div>
            </div>

        </div>

    </div>
@endsection

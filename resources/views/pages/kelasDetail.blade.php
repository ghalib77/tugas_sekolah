@extends(".layouts.master")
@section('children')
@include('.layouts.appbar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{$kelas["kelas"]}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/kelas">kelas</a></div>
                <div class="breadcrumb-item">{{$kelas["kelas"]}}</div>
            </div>
        </div>
        <div class="body-section">
            <h2 class="section-title">{{$kelas["kelas"]}}</h2>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Siswa kelas {{$kelas["kelas"]}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="m-auto justify-content-center w-50">
                                <form action="/kelasDetail/{{$kelas['kelas']}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="biodata">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama siswa</th>
                                        <th>NIS siswa</th>
                                        <th>No absen</th>
                                        <th>Tanggal lahir</th>
                                    </tr>
                                    @foreach($biodata->biodata as $siswa)
                                    <tr>
                                        <td>{{$siswa["nama"]}}
                                            <div class="table-links">
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            {{$siswa["NIS"]}}
                                        </td>
                                        <td>{{$siswa["no_absen"]}}</td>
                                        <td>{{$siswa["tanggal_lahir"]}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('.layouts.footer')
@include('.layouts.sidebar')
@stop
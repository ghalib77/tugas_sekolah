@extends(".layouts.master")
@section('children')
@include('.layouts.appbar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">kelas</div>
            </div>
        </div>
        <div class="body-section">
            <h2 class="section-title">Kelas</h2>
            <p class="section-lead">
                You can manage all Kelas, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Kelas</h4>
                        </div>
                        <div class="card-body">
                            <div class="justify-content-center w-50 m-auto">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
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
                                        <th>Kelas</th>
                                        <th>Wali kelas</th>
                                        <th>No ruangan</th>
                                    </tr>
                                    @foreach($kelas as $dataKelas)
                                    <tr>
                                        <td>{{$dataKelas["kelas"]}}
                                            <div class="table-links">
                                                <a href="/kelasDetail/{{$dataKelas['kelas']}}">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            {{$dataKelas["wali_kelas"]}}
                                        </td>
                                        <td>{{$dataKelas["no_ruang"]}}</td>
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
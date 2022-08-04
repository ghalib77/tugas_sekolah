@extends(".layouts.master")
@section('children')
@include('.layouts.appbar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Biodata</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">biodata</div>
            </div>
        </div>
        <div class="body-section">
            <h2 class="section-title">Biodata</h2>
            <p class="section-lead">
                You can manage all Biodata, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Biodata</h4>
                        </div>
                        <div class="card-body">
                            <div class="m-auto justify-content-center w-50">
                                <form action="/biodata">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
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
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>Tempat lahir</th>
                                        <th>Tanggal lahir</th>
                                    </tr>
                                    @foreach($biodata as $biodataData)
                                    <tr>
                                        <td>{{$biodataData["nama"]}}
                                            <div class="table-links">
                                                <a href="/biodata/{{$biodataData['NIS']}}">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="/kelasDetail/{{$biodataData->kelas->kelas}}">{{$biodataData->kelas->kelas}}</a>
                                        </td>
                                        <td>{{$biodataData["NIS"]}}</td>
                                        <td>{{$biodataData["tempat_lahir"]}}</td>
                                        <td>{{$biodataData["tanggal_lahir"]}}</td>
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
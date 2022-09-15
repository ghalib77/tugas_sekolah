@extends('.layouts.master')

@section('children')
    @include('.layouts.appbar')
    <div class="main-content">
        <section class=" section">
            <div class="section-header">
                <h1>Edit biodata</h1>
            </div>
            <div class="body-section">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit biodata baru</h4>
                                </div>
                                <form class="card-body" method="POST" action="{{ url('biodata/update', $query->id) }}">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nama"
                                                value="{{ old('nama') ?? $query->nama }}">
                                            @if ($errors->has('nama'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('nama') }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIS</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="NIS" readonly
                                                value="{{ $query->NIS }}">
                                            @if ($errors->has('NIS'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('NIS') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="kelas_id" class="form-control selectric">
                                                <option value="{{ $query->kelas->id }}" selected hidden>
                                                    {{ $query->kelas->kelas }}</option>
                                                @foreach ($kelas as $data)
                                                    <option value="{{ $data->id }}">{{ $data->kelas }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('kelas_id'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('kelas_id') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat
                                            lahir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="tempat_lahir"
                                                value="{{ old('tempat_lahir') ?? $query->tempat_lahir }}">
                                            @if ($errors->has('tempat_lahir'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('tempat_lahir') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                            lahir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" class="form-control inputtags" name="tanggal_lahir"
                                                value="{{ old('tanggal_lahir') ?? $query->tanggal_lahir }}">
                                            @if ($errors->has('tanggal_lahir'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('tanggal_lahir') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="email"
                                                value="{{ old('email') ?? $query->email }}">
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    @include('.layouts.footer')
    @include('.layouts.sidebar')

@stop

@extends('.layouts.master')

@section('children')
    @include('.layouts.appbar')
    <div class="main-content">
        <section class=" section">
            <div class="section-header">
                <h1>Edit kelas</h1>
            </div>
            <div class="body-section">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit kelas baru</h4>
                                </div>
                                <form class="card-body" method="POST" action="{{ url('kelas/update', $query->id) }}">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="kelas"
                                                value="{{ old('kelas') ?? $query->kelas }}">
                                            @if ($errors->has('kelas'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('kelas') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wali
                                            kelas</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="wali_kelas"
                                                value="{{ old('wali_kelas') ?? $query->wali_kelas }}">
                                            @if ($errors->has('wali_kelas'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('wali_kelas') }}
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

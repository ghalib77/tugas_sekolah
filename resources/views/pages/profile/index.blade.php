@extends('.layouts.master')
@section('children') @include('.layouts.appbar')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4 justify-content-start align-items-start">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png"
                                    class="rounded-circle profile-widget-picture">
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">{{ Auth::user()->name }} <div
                                        class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> Web Developer
                                    </div>
                                </div>
                                Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                                fictional character but an original hero in my family, a hero for his children and for his
                                wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with
                                <b>'John Doe'</b>.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form method="post" class="needs-validation" novalidate="">
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Name</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ Auth::user()->name }}" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>NIS</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $biodata->NIS }}" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the NIS
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ $biodata->email }}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Tempat lahir</label>
                                            <input type="text" name="tempat_lahir" name="tempat_lahir"
                                                class="form-control" value="{{ $biodata->tempat_lahir }}" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the tempat lahir
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Tanggal lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control"
                                                value="{{ $biodata->tanggal_lahir }}" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the tanggal lahir
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@include('.layouts.footer') @include('.layouts.sidebar') @stop

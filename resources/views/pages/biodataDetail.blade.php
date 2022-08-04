@extends('.layouts.master')

@section('children')
@include('.layouts.appbar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Biodata </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/biodata">biodata</a></div>
                <div class="breadcrumb-item">{{$biodata["nama"]}}</a></div>
            </div>
        </div>
        <div class="body-section">
            <div class="row h-100">
                <div class="col-lg-12 h-100">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png"
                                    class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">{{$biodata["nama"]}}</a>
                                </div>
                                <div class="author-box-job">{{$biodata["NIS"]}}</div>
                                <div class="author-box-description">
                                    <p></p>
                                </div>
                                <div class="w-100 d-sm-none"></div>
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
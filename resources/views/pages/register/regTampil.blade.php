@extends('.layouts.master')
@section('page-css')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/prism.css') }}" rel="stylesheet">
@endsection
@section('children')
    @include('.layouts.appbar')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data user</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Home</a></div>
                    <div class="breadcrumb-item active">Data register</div>
                </div>
            </div>
            @if ($message = Session::get('sukses'))
                <div class="alert alert-success justify-content-center w-100 mb-4 mr-auto ml-auto text-center"
                    role="alert">
                    {{ $message }}
                </div>
            @endif
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row justify-content-between w-100">
                                <h4>Data user</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-md w-100 datatables-ajax">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
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
@endsection

@section('page-js')
    <!-- General Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/js/modules/prism.js') }}"></script>
    <script src="{{ asset('assets/js/modules/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>

    {{-- JS page --}}
    <script type="text/javascript">
        $(document).ready(() => {
            $(".form-select-sm").addClass("custom-select custom-select-sm form-control form-control-sm")
                .removeClass("form-select");
        });

        const tables = $(".datatables-ajax").DataTable({
            ajax: `{{ url('register/datatables') }}`,
            type: 'get',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: "name",
                    name: "name"
                },
                {
                    data: "email",
                    name: "email"
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                    name: 'action'
                },
            ]
        });

        $(document).on('click', '.btn-delete-data', function() {
            const id = $(this).data('id');

            swal({
                icon: "warning",
                title: "are you sure want to delete this data?",
                text: "this data will not be back",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: false,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    },
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    }
                },
            }).then(resp => {
                if (resp) {
                    $.ajax({
                        url: `{{ url('register/delete') }}`,
                        type: "post",
                        data: {
                            _token: `{{ csrf_token() }}`,
                            id
                        },
                        success: (resp) => {
                            return swal({
                                icon: "success",
                                title: "Delete data success",
                                buttons: {
                                    confirm: true
                                }
                            }).then(resp => {
                                window.location.assign('/register/data');
                                tables.ajax.reload();
                            });
                        },
                        error: (err) => {
                            console.log(err);
                            return swal({
                                icon: "error",
                                title: "Delete data fail",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-danger",
                                        closeModal: true
                                    }
                                }
                            })
                        }
                    })
                }
            });
        })
    </script>
@endsection

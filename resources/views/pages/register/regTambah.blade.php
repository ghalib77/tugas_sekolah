@extends('.layouts.master') @section('children')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="/assets/img/stisla-fill.svg" alt="logo" width="100"
                            class="shadow-light rounded-circle" />
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/register/add">
                                @csrf @if ($message = Session::get('register_sukses'))
                                    <div class="alert alert-success justify-content-center w-100 mb-2 mr-auto ml-auto text-center"
                                        role="alert">
                                        {{ $message }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" type="text" class="form-control" name="first_name"
                                            value="{{ old('first_name') }}" autofocus />
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" type="text" class="form-control" name="last_name"
                                            value="{{ old('last_name') }}" />
                                        @if ($errors->has('last_name'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('last_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>jQuery Selectric</label>
                                    <select class="form-control selectric" name="email" type="email">
                                        @foreach ($biodata as $data)
                                            <option>{{ $data->email }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength"
                                            name="password" />
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control"
                                            name="password_confirm" />
                                        @if ($errors->has('password_confirm'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('password_confirm') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">Copyright &copy; Stisla 2018</div>
                </div>
            </div>
        </div>
    </section>
@endsection

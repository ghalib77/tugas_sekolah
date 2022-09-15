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
                            <form method="POST" action="{{ url('register/update', $query->id) }}">
                                @method('put') @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ old('name', $query->name) }}" autofocus />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email', $query->email) }}" />
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength"
                                            name="password" value="{{ old('password') }}" />
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Edit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">Copyright &copy; Stisla 2018</div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('be.siuu')
@section('content')

<div class="auth-wrapper">
    <div class="auth-content text-center">
        <img src="{{ asset('back-end/images/logo.png') }}" alt="Logo" class="img-fluid mb-4">

        <div class="card borderless">
            <div class="card-body">
                <h4 class="mb-3">Sign In</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login_proses') }}">
                    @csrf

                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required autofocus>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <button type="submit" class="btn btn-primary btn-block mb-3">Login</button>
                </form>

                <small class="text-muted">Lupa password? <a href="#">Reset</a></small>
            </div>
        </div>
    </div>
</div>
@endsection

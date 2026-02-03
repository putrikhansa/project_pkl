@extends('layouts.login')

@section('content')
    <style>
        body {
            /* Menggunakan gambar yang sama dengan landing page */
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("{{ asset('assets/frontend/img/assalaam.jpeg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            border-radius: 20px;
            border: none;
            /* Efek kaca transparan (Glassmorphism) */
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            width: 100%;
        }

        .btn-login {
            background: #1977cc;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #1565c0;
            transform: translateY(-2px);
        }

        .brand-title {
            color: white;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            font-size: 2.5rem;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold brand-title">SchoolCare</h2>
                </div>
                <div class="card login-card">
                    <div class="card-body p-4">
                        <h4 class="text-center mb-4 fw-bold" style="color: #333;">Sign In</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-login mt-2">
                                Login Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

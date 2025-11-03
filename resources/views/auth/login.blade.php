<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel STAKAM</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --stakam-primary: #2563eb;
            --stakam-light-gray: #f3f4f6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--stakam-light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .login-logo {
            max-height: 60px;
            margin-bottom: 1.5rem;
        }

        .form-control-lg {
            padding: 0.8rem 1rem;
            font-size: 1rem;
            height: 50px;
        }
        
        
        .input-group-text {
            background-color: transparent;
            border-right: 0;
        }
        .form-control-icon {
            padding-left: 0.75rem;
            border-left: 0;
        }

        .btn-login {
            background-color: var(--stakam-primary);
            border-color: var(--stakam-primary);
            font-weight: 600;
            padding: 0.8rem;
            transition: all 0.2s ease-in-out;
        }

        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        #togglePassword {
            cursor: pointer;
            border-left: 0;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center">
            
            <img src="{{ asset('picture/logo/STAKAM_Logo.png') }}" alt="Logo STAKAM" class="login-logo">
            <h2 class="h3 fw-bold mb-2">Admin Panel Login</h2>
            <p class="text-secondary mb-4">Silakan masuk untuk melanjutkan.</p>
        </div>

        
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.proses') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-medium">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill text-secondary"></i></span>
                    <input type="email" class="form-control form-control-lg form-control-icon @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required autofocus>
                </div>
                 @error('email')
                    <div class="text-danger mt-1 small">{{ $message }}</div>
                 @enderror
            </div>

            
            <div class="mb-4">
                <label for="password" class="form-label fw-medium">Password</label>
                <div class="input-group">
                     <span class="input-group-text"><i class="bi bi-lock-fill text-secondary"></i></span>
                    <input type="password" class="form-control form-control-lg form-control-icon @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password" required>
                    <span class="input-group-text" id="togglePassword"><i class="bi bi-eye-slash-fill text-secondary"></i></span>
                </div>
                 @error('password')
                    <div class="text-danger mt-1 small">{{ $message }}</div>
                 @enderror
            </div>
            
          
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg btn-login">Masuk</button>
            </div>
        </form>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const eyeIcon = togglePassword.querySelector('i');

            togglePassword.addEventListener('click', function (e) {
                
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
               
                eyeIcon.classList.toggle('bi-eye-slash-fill');
                eyeIcon.classList.toggle('bi-eye-fill');
            });
        });
    </script>

</body>
</html>
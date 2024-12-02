<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #cecece;
        }
        .error {
            color: #ff6b6b;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>

              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-outline form-white mb-4">
                  <input placeholder="name" type="text" name="name" id="typeNameX" class="form-control form-control-lg" required />
                  @error('name')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-outline form-white mb-4">
                  <input placeholder="email" type="email" name="email" id="typeEmailX" class="form-control form-control-lg" required />
                  @error('email')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-outline form-white mb-4">
                  <input placeholder="password" type="password" name="password" id="typePasswordX" class="form-control form-control-lg" required />
                  @error('password')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-outline form-white mb-4">
                  <input placeholder="confirm password" type="password" name="password_confirmation" id="typePasswordConfirmX" class="form-control form-control-lg" required />
                  @error('password_confirmation')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
              </form>

            </div>

            <div>
              <p class="mb-0">Already have an account? <a href="{{ route('loginform') }}" class="text-white-50 fw-bold">Login</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>

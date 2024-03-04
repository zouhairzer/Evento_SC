<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Sign In</title>
</head>
<body>
    <!-- Section: Design Block -->
    <section class="text-center">
      <!-- Background image -->
      <div class="p-5 bg-image" style="
            background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
            height: 300px;
            "></div>
      <!-- Background image -->

      <div class="card mx-4 mx-md-5 shadow-5-strong" style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
            ">
        <div class="card-body py-5 px-md-5">
        <div class="d-flex justify-content-center">
          <div class="row d-flex justify-content-center w-50">
            <div class="col-lg-8">
              <h2 class="fw-bold mb-5">Sign In now</h2>
              <form action="/login" method="post">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 ">
                    <label class="form-label" for="form3Example3">Email address</label>
                    <input type="email" name="email" id="form3Example3" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" name="password" id="form3Example4" class="form-control" />
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Subscribe to our Web Site
                  </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Sign up
                </button>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>or <a href="/register">sign In</a></p>
                  

</body>
</html>
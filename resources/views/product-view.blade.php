<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>প্রোডাক্ট ভিউ পেজ</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-image {
      max-height: 500px;
      object-fit: cover;
      border-radius: 10px;
    }

    .old-price {
      text-decoration: line-through;
      color: #6c757d;
      font-size: 1.2rem;
    }

    .offer-price {
      color: #d9534f;
      font-size: 2rem;
      font-weight: bold;
    }

    .badge-brand {
      background-color: #0d6efd;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container my-5">
    <div class="card shadow-sm p-4">
      <div class="row g-4">

        <!-- প্রোডাক্ট ইমেজ সেকশন -->
        <div class="col-md-6">
          <img src="https://www.djibstyle.com/wp-content/uploads/2019/01/dummy-product-2.png"
            class="img-fluid product-image w-100" alt="প্রোডাক্ট ইমেজ">
        </div>

        <!-- প্রোডাক্ট ডিটেইলস সেকশন -->
        <div class="col-md-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $product->category }}</li> <!-- Category -->
            </ol>
          </nav>

          <h1 class="display-5 fw-bold">{{ $product->product_name }}</h1> <!-- Product Name -->

          <div class="mb-3">
            <span class="badge badge-brand fs-6">{{ $product->brand }}</span> <!-- Brand -->
            <span class="badge bg-success fs-6 ms-2">স্টক: {{ $product->stock }}টি অবশিষ্ট</span> <!-- Stock -->
          </div>

          <div class="mb-4">
            <span class="old-price">৳ {{ number_format($product->price) }}</span> <!-- Price -->
            <span class="offer-price ms-3">৳ {{ number_format($product->offer_price) }}</span> <!-- Offer Price -->
          </div>

          <hr>

          <h5>প্রোডাক্ট ডেসক্রিপশন:</h5>
          <p class="text-muted">
            {{ $product->description }}
          </p> <!-- Description -->

          <div class="mt-4">
            <div class="d-flex align-items-center mb-3">
              <label for="quantity" class="me-3 fw-bold">পরিমাণ:</label>
              <input type="number" id="quantity" class="form-control w-25" value="1" min="1">
            </div>

            <div class="d-grid gap-2 d-md-flex mt-4">
              <button class="btn btn-primary btn-lg px-5 me-md-2" type="button">কার্টে যোগ করুন</button>
              <button class="btn btn-outline-dark btn-lg px-5" type="button">এখনই কিনুন</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
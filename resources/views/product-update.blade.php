<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Product Update</title>
</head>

<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        @if (session()->has('success'))
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0">Update Product</h5>
            <a href="{{ route('products.index') }}" class="text-white text-decoration-none btn btn-sm btn-danger">সকল
              প্রোডাক্ট দেখুন</a>
          </div>
          <div class="card-body p-4">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
              @csrf
              @method('PUT')

              <!-- Product Title -->
              <div class="mb-3">
                <label for="productName" class="form-label">প্রোডাক্টের নাম</label>
                <input type="text" class="form-control" id="productName" placeholder="যেমন: স্মার্ট ওয়াচ" required
                  name="product_name" value="{{ $product->product_name }}">
              </div>

              <div class="row">
                <!-- Category Selection -->
                <div class="col-md-6 mb-3">
                  <label for="category" class="form-label">ক্যাটাগরি</label>
                  <select class="form-select" id="category" required name="category">
                    <option disabled>বাছাই করুন</option>
                    <option value="electronics" {{ $product->category == 'electronics' ? 'selected' : '' }}>ইলেকট্রনিক্স
                    </option>
                    <option value="fashion" {{ $product->category == 'fashion' ? 'selected' : '' }}>ফ্যাশন</option>
                    <option value="home-appliance" {{ $product->category == 'home-appliance' ? 'selected' : '' }}>হোম
                      অ্যাপ্লায়েন্স</option>
                  </select>
                </div>
                <!-- Brand -->
                <div class="col-md-6 mb-3">
                  <label for="brand" class="form-label">ব্র্যান্ড</label>
                  <input type="text" class="form-control" id="brand" placeholder="ব্র্যান্ডের নাম" name="brand"
                    value="{{ $product->brand }}">
                </div>
              </div>

              <div class="row">
                <!-- Regular Price -->
                <div class="col-md-4 mb-3">
                  <label for="price" class="form-label">মূল্য (৳)</label>
                  <div class="input-group">
                    <span class="input-group-text">৳</span>
                    <input type="number" class="form-control" id="price" required name="price"
                      value="{{ $product->price }}">
                  </div>
                </div>
                <!-- Discount Price -->
                <div class="col-md-4 mb-3">
                  <label for="discountPrice" class="form-label">ছাড়ের মূল্য (৳)</label>
                  <input type="number" class="form-control" id="discountPrice" name="offer_price"
                    value="{{ $product->offer_price }}">
                </div>
                <!-- Stock Quantity -->
                <div class="col-md-4 mb-3">
                  <label for="stock" class="form-label">স্টক পরিমাণ</label>
                  <input type="number" class="form-control" id="stock" value="{{ $product->stock }}" required
                    name="stock">
                </div>
              </div>

              <!-- Product Description -->
              <div class="mb-3">
                <label for="description" class="form-label">প্রোডাক্টের বর্ণনা</label>
                <textarea class="form-control" id="description" rows="4"
                  placeholder="প্রোডাক্ট সম্পর্কে বিস্তারিত লিখুন..."
                  name="description">{{ $product->description }}</textarea>
              </div>

              <!-- Buttons -->
              <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-outline-secondary px-4">রিসেট</button>
                <button type="submit" class="btn btn-primary px-4">প্রোডাক্ট সেভ করুন</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
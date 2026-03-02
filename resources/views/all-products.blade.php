<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>প্রোডাক্ট লিস্ট</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    .product-img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 5px;
    }

    .table align-middle th {
      font-weight: 600;
      background-color: #f8f9fa;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="card shadow-sm border-0">
      @if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">প্রোডাক্ট তালিকা</h5>
        <a href="{{ route('home') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> নতুন যোগ
          করুন</a>
      </div>
      <div class="card-body p-0">
        <!-- Responsive Table Wrapper -->
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th class="ps-4">প্রোডাক্ট</th>
                <th>ক্যাটাগরি</th>
                <th>মূল্য</th>
                <th>স্টক</th>
                <th>স্ট্যাটাস</th>
                <th class="text-end pe-4">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              <!-- Product Row 1 -->
              @foreach ($products as $product)
                <tr>
                  <td class="ps-4">
                    <div class="d-flex align-items-center">
                      <div>
                        <h6 class="mb-0">{{ $product->product_name }}</h6>
                        <small class="text-muted">SKU: {{ $product->id }}</small>
                      </div>
                    </div>
                  </td>
                  <td>{{ $product->category }}</td>
                  <td>৳ {{ number_format($product->price) }}</td>
                  <td>{{ $product->stock }}টি</td>
                  <td><span
                      class="badge bg-success-subtle text-success border border-success-subtle">{{ $product->stock > 0 ? "available" : "unavaiable" }}</span>
                  </td>
                  <td class="text-end pe-4">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-light btn-sm text-primary" title="view"><i
                        class="bi bi-eye-fill"></i></a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-light btn-sm text-info" title="এডিট"><i
                        class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="delete-form-{{ $product->id }}">
                      @csrf
                      @method('DELETE')

                      <button type="button" class="btn btn-light btn-sm text-danger" title="ডিলিট" onclick="deleteItem({{ $product->id }})">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- Pagination -->
      <div class="card-footer bg-white py-3">
        <nav aria-label="Page navigation">
          <ul class="pagination pagination-sm mb-0 justify-content-end">
            <li class="page-item disabled"><a class="page-link" href="#">পূর্ববর্তী</a></li>
            <li class="page-item active"><a class="page-link" href="#">১</a></li>
            <li class="page-item"><a class="page-link" href="#">২</a></li>
            <li class="page-item"><a class="page-link" href="#">পরবর্তী</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function deleteItem(id) {
      if (confirm('আপনি কি নিশ্চিত যে এটি মুছে ফেলতে চান?')) {
        document.getElementById('delete-form-' + id).submit();
      }
    }
  </script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Kios Laravel</title>
</head>

<body>
  <div class="container w-50 p-3 d-flex align-items-center justify-content-center">
    <h2>Edit Produk</h2>
  </div>
  <div class="container w-50 mt-3">
    <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label>Id Produk</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="id"
          value="{{ $product->product_id }}">
      </div>
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="nama"
          value="{{ $product->product_name }}">
      </div>
      <div class="form-group">
        <label>Harga Produk</label>
        <input type="number" class="form-control" aria-describedby="emailHelp" name="harga"
          value="{{ $product->product_price }}">
      </div>
      <div class="form-group d-flex flex-column">
        <label>Gambar Produk</label>
        <input type="file" aria-describedby="emailHelp" name="gambar" value="{{ $product->product_image }}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
  <!-- <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script> -->
</body>

</html>
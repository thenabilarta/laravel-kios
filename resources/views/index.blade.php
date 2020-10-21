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
  <div class="container p-5 d-flex align-items-center justify-content-center">
    <button class="btn btn-primary" id="fetch" onclick="location.href = '/fetch'">Fetch Data</button>
  </div>
  <div class="container w-50 mt-3">
    <form method="POST" action="/" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Id Produk</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="id">
      </div>
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="nama">
      </div>
      <div class="form-group">
        <label>Harga Produk</label>
        <input type="number" class="form-control" aria-describedby="emailHelp" name="harga">
      </div>
      <div class="form-group d-flex flex-column">
        <label>Gambar Produk</label>
        <input type="file" aria-describedby="emailHelp" name="gambar">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <div class="container py-5 flex-wrap d-flex">
    @foreach($prod as $dp)
    <div class="card m-2" style="width: 18rem;">
      <img src="/storage/uploads/{{ $dp->product_image }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $dp->product_name }}</h5>
        <p class="card-text">Rp {{ $dp->product_price }}</p>
      </div>
      <div class="card-body">
        <a href="{{ $dp->id }}/edit" class="card-link mr-3">Edit</a>
        <form action="/products/{{ $dp->id }}" method="POST" class="d-inline">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
    @endforeach
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
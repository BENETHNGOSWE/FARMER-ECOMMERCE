<!DOCTYPE html>
<html>

<head>
    <title>Farmer Access Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<style>
    .product-card {
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="hero_area">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand me-2" href="https://mdbgo.com/">
                   <h5 style="margin-top: 10px">FARMER <span style="color: green" >FAIR </span> MARKET</h5>
                </a>
                <button data-mdb-collapse-init class="navbar-toggler" type="button"
                    data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter">Bei za Mazao</a>
                        </li>
                        
                    </ul>

                    <div class="d-flex align-items-center" style="margin-left: auto">
                        <a href="{{ route('login') }}"> <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
                            Login
                        </button></a>
                        
                    </div>
                </div>
            </div>
        </nav>
        <section class="slider_section" style="position: relative;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="backend/assets/images/farmer.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="backend/assets/images/farmers.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="backend/assets/images/farmerss.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        
    </div>
    <br>
    <h1 class="text-center"><strong><span style="color: black;">PRODUCT</span> <span style="color: green;">LIST</span></strong></h1>
    <BR>
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="row">
                @foreach ($mazaos as $mazao)
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="{{ asset('images/' . $mazao->mazao_picha) }}" alt=""
                                style="width: 355px; height: 270px;">


                            <div class="card-body">
                                <h5 class="card-title">{{ $mazao->mazao_jina }}</h5>
                                <p class="card-text"><span style="color: red">Tsh.{{ $mazao->mazao_bei }}</span> <span
                                        style="margin-left: 10em; color:green;">{{ $mazao->user->name }}</span></p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <hr>
    <br>
    <h1 class="text-center"><strong><span style="color: black;">PEMBEJEO</span> <span style="color: green;">LIST</span></strong></h1>
    <BR>
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="row">
                @foreach ($pembejeos as $pembejeo)
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="{{ asset('images/' . $pembejeo->pembejeo_picha) }}" alt=""
                                style="width: 355px; height: 270px;">


                            <div class="card-body">
                                <h5 class="card-title">{{ $pembejeo->pembejeo_jina }}</h5>
                                <p class="card-text"><span style="color: red">Tsh.{{ $pembejeo->pembejeo_bei }}</span> </p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bei za Mazao</h5>
              </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Jina la Kundi</th>
                    <th scope="col">Min Price</th>
                    <th scope="col">Max Price</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($beizamazaos as $beizamazao)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $beizamazao->name }}</td>
                      <td>{{ $beizamazao->makundiyamazao->jinalakundi }}</td>
                      <td><span style="color: red">Tsh.{{ $beizamazao->min_price }}</span></td>
                      <td><span style="color: red">Tsh.{{ $beizamazao->max_price }}</span></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Online Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
    .product-card {
        margin-bottom: 20px;
    }
</style>

<body>


    <div class="hero_area">
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a>
                        <h5>LOGO YETU</h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="testimonial.html">Testimonial</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.html">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog_list.html">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>

                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <section class="slider_section" style="position: relative;">
            <img src="/backend\assets\images\test.png" alt="" style="width: 100%;">
            {{-- <div class="detail-box" style="position: absolute; top: 20%; left: 10%; padding: 20px; max-width: 300px; z-index: 1;">
                <h1>
                    <span>
                        Sale 20% Off
                    </span>
                    <br>
                    On Everything
                </h1>
                <p>
                    Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                </p>
                <div class="btn-box">
                    <a href="" class="btn1">
                        Shop Now
                    </a>
                </div>
            </div> --}}
        </section>
    </div>
    <br>
    <h1 class="text-center">Product List</h1>
    <BR>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">All</a>
                <a href="#" class="list-group-item list-group-item-action">Snack</a>
                <a href="#" class="list-group-item list-group-item-action">Vegetable</a>
                <a href="#" class="list-group-item list-group-item-action">Fruit</a>
                <a href="#" class="list-group-item list-group-item-action">Bakery</a>
            </div>
        </div>
        <div class="col-md-9">
           
                <div class="row">
                    @foreach ($mazaos as $mazao)
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="{{ asset('images/' . $mazao->mazao_picha) }}" alt="" style="width: 355px; height: 270px;">


                            <div class="card-body">
                                <h5 class="card-title">{{ $mazao->mazao_jina }}</h5>
                                <p class="card-text"><span>Tsh.{{$mazao->mazao_bei}}</span> <span style="margin-left: 10em;">{{ $mazao->user->name }}</span></p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

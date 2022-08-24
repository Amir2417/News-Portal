<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="bangla">সর্বশেষ</title>
     <!-- Bootstrap CDN -->
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

   <!-- Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/latest.css') }}">
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <!-- Top Navigation -->
        <div class="top-navigation d-flex align-items-center justify-content-between">
            <!-- Left Section -->
            <div class="left d-flex flex-column">
                <div class="left-icons d-flex">
                    <!-- Hamburger Menu Start -->

                    <input type="checkbox" id="openMenu" />
                    <label for="openMenu"><i class="fa-solid fa-bars fs-2 d-block  m-auto"></i></label>
                    <div class="wrapper">
                    <ul class="menu">
                        @php
                        $categories = App\Models\Category::where('status',1)->orderBy('name','ASC')->get();
                    @endphp
                    @foreach($categories as $category)
                        <li><a class="bangla" href="{{ url('category/article/'.$category->id) }}">{{ $category->name }}</a></li>
                    @endforeach

                    </ul>
                    </div>
                    <!-- Hamburger Menu Eng -->
                    <!-- Search Bar -->

                    <div class="search-box">
                        <input class="search-txt" type="text" name="" placeholder="Type to Search">
                        <a class="search-btn" href="./latest.html">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>

                    <!-- <i class="fa-solid fa-magnifying-glass fs-2 d-block px-4 m-auto"></i> -->
                    <!-- Search bar end -->                </div>
                <p class="">Thursday, 4 July, 2022</p>
            </div>
            <!-- Center Logo -->
            <div class="center d-flex">
                @foreach ($items as $item)
                <a href="/">
                    <img class="main-logo" src="{{ asset($item->logo_image) }}" alt="">
                </a>
                @endforeach
            </div>
            <!-- Right Section -->
            <div class="right">
                <div class="d-flex">
                    <i class="fa-solid fa-bell fs-2 d-block px-4 m-auto"></i>
                    <button class="btn btn-outline-dark">Login</button>
                </div>
                <div class="text-end">

                    <p class="px-2"><strong>
                        <a href="#">Bangla</a>
                    </strong> Edition</p>
                </div>

            </div>
        </div>
        <hr  style="position: relative; z-index: -1">
        <!-- Main Navigation -->
        <div class="main-navigation text-center">
            @php
                $categories = App\Models\Category::where('status',1)->orderBy('name','ASC')->get();
            @endphp
            @foreach($categories as $category)
            <a class="text-decoration-none main-nav-link fs-5 px-2 text-dark bangla" href="{{ url('category/article/'.$category->id) }}">{{ $category->name }}</a>
            @endforeach
            <!-- <a class="text-decoration-none main-nav-link fs-5 px-2 text-dark bangla" href="#">Lifestyle</a> -->

        </div>
        <hr  style="position: relative; z-index: -1">
    </header>

    <!-- Header Section End -->

    <main>
        <div class="category-section">

            <h1 class="category-heading bangla"></h1>



            <hr>

            <div class="category-post row">
                @foreach($article as $post)
                <article class="row col-12">
                    <article class="col-7">
                        <a class="text-dark text-decoration-none news-heading" href="{{ url('article/details/'.$post->id)}}">
                            <h4 class="bangla news-heading fw-bold">
                                {{ $post->title }}</h4>
                        </a>
                            <div class="bangla news-desc">
                                <!-- {!! Str::limit($post->long_description, 50) !!} -->
                            </div>
                            <div class="time bangla">{{  $post->created_at->diffForHumans() }}</div>
                    </article>
                    <figure class="col-5">
                        <img style = "height: 200px" class="img-fluid" src="{{ asset($post->image) }}" alt="">
                    </figure>
                    <hr>
                </article>
                @endforeach


            </div>
        </div>

    </main>



    <!-- Footer Section Start -->
    <footer class="p-3">
        <img class="footer-logo" src="./images/logo.png" alt="">
        <div class="row d-none d-lg-flex py-5 footer-tags">
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">চাকরি</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">গোলটেবিল</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">বিশেষ সংখ্যা</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">একটু থামুন</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">অন্য আলো</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">কিশোর আলো</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">চিরন্তন ১৯৭১</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">বিজ্ঞান চিন্তা</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">প্রতি চিন্তা</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">প্রথমা</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">বন্ধু সভা</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">ট্রাস্ট</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">মোবাইল ভ্যাস</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">নাগরিক সংবাদ</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">এবিসি রেডিও</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">ই-পেপার</a>
            <a href="#" class="col-2 px-3 bangla fs-5 text-decoration-none text-dark">English Edition</a>
        </div>
        <div class="footer-tags d-lg-none py-5 d-md-block text-center">
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">চাকরি</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">গোলটেবিল</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">বিশেষ সংখ্যা</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">একটু থামুন</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">অন্য আলো</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">কিশোর আলো</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">চিরন্তন ১৯৭১</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">বিজ্ঞান চিন্তা</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">প্রতি চিন্তা</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">প্রথমা</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">বন্ধু সভা</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">ট্রাস্ট</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">মোবাইল ভ্যাস</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">নাগরিক সংবাদ</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">এবিসি রেডিও</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">ই-পেপার</a>
            <a href="#" class="px-3 bangla mx-auto fs-5 text-decoration-none text-dark">English Edition</a>
        </div>
        <hr>

        <div class="social-section row">
            <div class="col-lg-6 row">
                <div class="col-lg-6 text-center">
                    <p class="bangla"> অনুসরণ করুন </p>

                        <i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-facebook">

                            <a href="#"></a>
                        </i>


                        <i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-instagram">
                            <a href="#"></a>
                        </i>


                        <i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-twitter">
                            <a href="#"></a>
                        </i>


                        <i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-youtube">
                            <a href="#"></a>
                        </i>

                </div>


            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
                <div class="col-6"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-block mx-auto">
                    <p class="bangla text-center">
                        মোবাইল অ্যাপস ডাউনলোড করুন

                    </p>
                    <img class="img-fluid mx-auto" src="./images/download-app.jpg" alt="">
                </div>

            </div>

        </div>
        <hr>

        <div class="footer-links text-center">
            <a href="#" class="bangla text-dark text-decoration-none px-3">স্কুইরাল নিউজ</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">বিজ্ঞাপন</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">সার্কুলেশন</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">নীতিমালা</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">মন্তব্যের নীতিমালা</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">গোপনীয়তার নীতি</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">যোগাযোগ</a>
        </div>

        <hr>

        <p class="bangla text-center"> স্বত্ব © ২০২২ স্কুইরাল নিউজ || সম্পাদক ও প্রকাশক: আরিফুল ইসলাম</p>


    </footer>


    <!-- Footer Section End -->

</body>
</html>

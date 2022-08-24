<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $articles->title }}</title>

         <!-- Bootstrap CDN -->
       <!-- CSS only -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

       <!-- Font Awesome CDN -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

       <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
       <link rel="stylesheet" href="{{ asset('frontend/css/latest.css') }}">
       <link rel="stylesheet" href="{{ asset('frontend/css/single-post.css') }}">

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
                    <!-- Search bar end -->
                </div>
                <h5 class=""><?php
                    echo date("l, d F, Y");
                     ?></h5>
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
        <hr style="position: relative; z-index: -1">
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
        <hr style="position: relative; z-index: -1">
    </header>

    <!-- Header Section End -->

    <!-- Main Post Section Start -->
    <main class="single-post mx-auto row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <a href="#"><h3 class="category-name lh-lg bangla text-decoration-underline text-primary"></h3></a>
            <h1 class="bangla fw-bold">{{ $articles->title }}
            </h1>
            <div class="share-section row">


                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <p class="bangla">
                    </p>
                    <div class="time bangla">{{ $articles->created_at->diffForHumans() }}
                    </div>
                </div>


                <!-- Social Share Section -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 d-flex justify-content-end align-items-center  col-md-12 col-sm-12 col-12">
                    <a href="">
                        <i class="text-primary fs-4 p-2 fa-brands fa-facebook">
                        </i>
                    </a>



                    <i class="text-primary fs-4 p-2 fa-brands fa-twitter">
                        <a href="#"></a>
                    </i>

                    <i class="text-primary fs-4 p-2 fa-solid fa-bookmark">
                        <a href="#"></a>
                    </i>

                    <i class="text-primary fs-4 p-2 fa-solid fa-print">
                        <a href="#"></a>
                    </i>
                </div>

            </div>
            <hr>
            <div class="news-details">
                <figure>
                    <img class="w-100" src="{{asset($articles->image ) }}" alt="">
                    <figcaption class="bangla time">{{ $articles->title }}
                        <hr>
                    </figcaption>

                </figure>

                <div class="bangla lh-lg">
                    {!! $articles->long_description !!}
                </div>
                <br><br>

                <h5 class="bangla"> <span class="text-decoration-underline text-primary">ইউরোপ</span> থেকে আরো পড়ুন</h5>
                <div class="text-center">
                    <button class="btn btn-light mx-2 text-primary bangla">মৃত্যু</button>
                    <button class="btn btn-light mx-2 text-primary bangla">আবহাওয়া</button>
                    <button class="btn btn-light mx-2 text-primary bangla">পরিবেশ</button>
                    <button class="btn btn-light mx-2 text-primary bangla">ইউরোপ</button>
                    <button class="btn btn-light mx-2 text-primary bangla">স্পেন</button>
                    <button class="btn btn-light mx-2 text-primary bangla">তাপমাত্রা</button>
                </div>
                <br><br>
                <hr>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="share-section align-items-center row">


                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <h5 class="bangla news-heading">মন্তব্য করুন</h5>
                            </div>


                            <!-- Comment Section -->
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12 d-flex justify-content-end align-items-center  col-md-12 col-sm-12 col-12">
                                <i class="text-primary fs-4 p-2 fa-brands fa-facebook">
                                    <a href="#"></a>
                                </i>

                                <i class="text-primary fs-4 p-2 fa-brands fa-twitter">
                                    <a href="#"></a>
                                </i>

                                <i class="text-primary fs-4 p-2 fa-solid fa-bookmark">
                                    <a href="#"></a>
                                </i>

                                <i class="text-primary fs-4 p-2 fa-solid fa-print">
                                    <a href="#"></a>
                                </i>

                            </div>

                            <hr>


                        </div>
                        <div class="row col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="col-2 col-sm-2 col-md-1 col-lg-1 border rounded-circle bg-light">
                                <i class="text-center mx-auto d-block fs-5 lh-lg fa-solid fa-user"></i>
                            </div>
                            <div class="col-10 col-sm-10 col-md-11 col-lg-11">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea ">Share your thoughts</label>
                                  </div>
                            </div>
                            <button class="btn btn-secondary ms-auto mt-3" style="width: 100px;"> <i class="fa-solid fa-paper-plane"></i> POST</button>
                            <p class="text-center" style="font-size: 12px;">This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a> apply.</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>











        <!-- Sidebar -->
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 row">

            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <h5 class="bangla news-heading text-decoration-underline">Related Article</h5>
                @foreach ($related_articles as $related_article)
                <article class="row">
                    <a class="news-heading text-decoration-none text-dark" href="{{ url('article/details/'.$related_article->id)}}">
                        <h3 class="news-heading bangla" >{{ $related_article->title }}</h3>
                    </a>
                    <p class="col-6 col-lg-6 col-md-6 col-sm-6 bangla time mb-0">{!! Str::limit($related_article->long_description, 50) !!}</p>
                    <figure class="col-6 col-lg-6 col-md-6 col-sm-6">
                        <img class="w-100" src="./images/news/24.webp" alt="">
                    </figure>
                    <p class="time bangla">{{ $related_article->created_at->diffForHumans() }}</p>
                    <hr>
                </article>
                @endforeach


            </div>

        </div>

        <hr>

        <!-- Down Section Related News -->
        <div class="down-related-news bangla">
            <h5 class="bangla">ইউক্রেন নিয়ে আরও পড়ুন
            </h5>
            <div class="row">
                <article class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <figure>
                        <img class="w-100" src="./images/news/25.webp" alt="">

                    </figure>
                     <h5 class="bangla news-heading">ইউক্রেনের নিরাপত্তাপ্রধানসহ শীর্ষ দুই কর্মকর্তাকে বরখাস্ত করলেন জেলেনস্কি</h5>
                     <p class="time">১০ ঘন্টা আগে</p>

                </article>
                <article class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <figure>
                        <img class="w-100" src="./images/news/26.webp" alt="">

                    </figure>
                     <h5 class="bangla news-heading">পরবর্তী ধাপের হামলার প্রস্তুতি রুশ সেনাদের</h5>
                     <p class="time">১০ ঘন্টা আগে</p>

                </article>
                <article class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <figure>
                        <img class="w-100" src="./images/news/27.webp" alt="">

                    </figure>
                     <h5 class="bangla news-heading">৫ হাজার শিশুসহ ৩০ হাজার ইউক্রেনীয়কে রাশিয়ায় স্থানান্তর</h5>
                     <p class="time">১০ ঘন্টা আগে</p>

                </article>
                <article class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <figure>
                        <img class="w-100" src="./images/news/28.webp" alt="">

                    </figure>
                     <h5 class="bangla news-heading">ড্রোন দেখতে ইরানে গিয়েছিলেন রুশ কর্মকর্তারা: যুক্তরাষ্ট্র</h5>
                     <p class="time">১০ ঘন্টা আগে</p>

                </article>
            </div>
        </div>




    </main>




    <!-- Single Post Section End -->










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
                    <img class="w-100 mx-auto" src="./images/download-app.jpg" alt="">
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

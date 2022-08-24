<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $items = App\Models\GeneralSettings::where('status',1)->limit(1)->get();
    @endphp
    @foreach ($items as $item)
    <title>{{ $item->title }}</title>
    @endforeach

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Bootstrap CDN -->
   <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    <a class="btn btn-outline-dark" href="{{ route('login') }}">Login</a>
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

    <!-- Main Section Start -->
    <main>
        <!-- Feature Section Start -->
        @php
            $articles = App\Models\Article::latest()->where('status',1)->limit(5)->get();
        @endphp
        <div class="featured-news">
            <section class="col-12 col-lg-9 col-md-12 col-sm-12 row p-3">
                @foreach ($articles as $article)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <article class="first-featured-news border-end row">
                            <article class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <a class="news-heading text-decoration-none text-dark" href="{{ url('article/details/'.$article->id)}}">
                                    <h3 class="news-heading bangla" >{{ $article->title }}</h3>
                                </a>
                                <p class = "bangla">{!! Str::limit($article->long_description, 50) !!}</p>
                                <p class = "time bangla">{{ $article->created_at->diffForHumans() }}</p>
                            </article>
                            <figure class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <img class="img-fluid" src="{{ $article->image }}" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </article>
                    </div>
                @endforeach

                {{-- <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                    <article class="">
                        <a class="news-heading text-decoration-none text-dark" href="/single-post.html">

                            <h4 class="news-heading bangla" >যুক্তরাষ্ট্রে শপিং মলে ৩ জনকে হত্যার পর গুলিতে বন্দুকধারী নিহত</h4>
                        </a>
                        <p class = "bangla">গুলির শব্দ শুনে ক্রেতা ও শপিং মলের কর্মীরা দিগ্‌বিদিক ছুটতে থাকেন এবং লুকিয়ে পড়েন। হতাহত ব্যক্তিদের, বন্দুকধারী কিংবা ওই পথচারীর নাম প্রকাশ করেনি পুলিশ।</p>
                        <p class = "time bangla">২ ঘণ্টা আগে</p>
                    </article>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-12>
                    <article class="article-desc">
                        <h4 class="news-heading bangla" >শ্রীলঙ্কায় আজ থেকে জরুরি অবস্থা</h4>
                        <p class = "bangla">চলতি ২০২২–২৩ অর্থবছর থেকে স্ট্যাম্প ডিউটিতে মানুষকে পুড়তে হবে। কারণ, গত ১ জুলাই থেকে সব ধরনের স্ট্যাম্প ডিউটি পাঁচ গুণ পর্যন্ত বাড়ানো</p>
                        <p class = "time bangla">১ ঘণ্টা আগে</p>
                    </article>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-12>
                    <article class="article-desc">
                        <h4 class="news-heading bangla" >এনবিআর–বহির্ভূত কর পদে পদে স্ট্যাম্প ডিউটি বাড়ল</h4>
                        <p class = "bangla">গুলির শব্দ শুনে ক্রেতা ও শপিং মলের কর্মীরা দিগ্‌বিদিক ছুটতে থাকেন এবং লুকিয়ে পড়েন। হতাহত ব্যক্তিদের, বন্দুকধারী কিংবা ওই পথচারীর নাম প্রকাশ করেনি পুলিশ।</p>
                        <p class = "time bangla">২ ঘণ্টা আগে</p>
                    </article>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-12>
                    <article class="article-desc">
                        <h4 class="news-heading bangla" >মতামত বিদ্যুৎ-সংকট এবং ‘দায়মুক্তি’ আইনের দায়</h4>
                        <p class="bangla">এ আইন থেকে স্পষ্ট যে বিদ্যুতের জন্য জ্বালানি আমদানি অথবা বিদ্যুৎকেন্দ্র স্থাপন অথবা বিদ্যুৎ ও জ্বালানি খাতে অন্য কোনো কার্যক্রম, গৃহীত</p>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </article>
                </div> --}}



                {{-- <article class="col-12 col-lg-4 col-md-6 col-sm-12 d-flex pe-3 border-end">
                    <div class="border-0">
                        <h5 class="news-heading bangla" >প্যাসিফিক জিনস গ্রুপ জিনস রপ্তানির পথ দেখিয়েছিল যে প্রতিষ্ঠান</h5>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </div>
                    <figure class="">
                        <img src="./images/news/3.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                </article>
                <article class="col-12 col-lg-4 col-md-6 col-sm-12 d-flex pe-3 border-end">
                    <div class="border-0">
                        <h5 class="news-heading bangla" >প্যাসিফিক জিনস গ্রুপ জিনস রপ্তানির পথ দেখিয়েছিল যে প্রতিষ্ঠান</h5>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </div>
                    <figure class="">
                        <img src="./images/news/3.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                </article>
                <article class="col-12 col-lg-4 col-md-6 col-sm-12 d-flex pe-3">
                    <div class="border-0">
                        <h5 class="news-heading bangla" >প্যাসিফিক জিনস গ্রুপ জিনস রপ্তানির পথ দেখিয়েছিল যে প্রতিষ্ঠান</h5>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </div>
                    <figure class="">
                        <img src="./images/news/3.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                </article> --}}



            </section>


            <!-- Right Sidebar -->
            <aside class="col-12 col-lg-3 col-md-12 col-sm-12 border-start row">
                <article class="col-12 col-lg-12 col-md-6 col-sm-12">
                    <figure>
                        <img src="./images/news/2.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                    <div class="article-desc-right">
                        <h4 class="news-heading bangla" >তিন জেলায় মন্দির-মণ্ডপে হামলা ৯ মাসেও তদন্ত শেষ হয়নি</h4>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </div>
                    <hr>
                </article>
                <article class="col-12 col-lg-12 col-md-6 col-sm-12 d-flex">
                    <div class="article-desc-right">
                        <h5 class="news-heading bangla" >প্যাসিফিক জিনস গ্রুপ জিনস রপ্তানির পথ দেখিয়েছিল যে প্রতিষ্ঠান</h5>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </div>
                    <figure>
                        <img src="./images/news/3.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                </article>
                <article class="col-12 col-lg-12 col-md-6 col-sm-12 d-flex">
                    <div class="article-desc-right">
                        <h5 class="news-heading bangla" >প্যাসিফিক জিনস গ্রুপ জিনস রপ্তানির পথ দেখিয়েছিল যে প্রতিষ্ঠান</h5>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </div>
                    <figure>
                        <img src="./images/news/3.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                </article>
                <article class="col-12 col-lg-12 col-md-6 col-sm-12 d-flex">
                    <div class="article-desc-right">
                        <h5 class="news-heading bangla" >প্যাসিফিক জিনস গ্রুপ জিনস রপ্তানির পথ দেখিয়েছিল যে প্রতিষ্ঠান</h5>
                        <p class="time bangla">৪ ঘণ্টা আগে</p>
                    </div>
                    <figure>
                        <img src="./images/news/3.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                </article>

            </aside>
        </div>

        <!-- Sidebar Post Section End -->



        <!-- Category Post Section Start -->
@php
    $sports = App\Models\Article::where('status',1)->where('sports',1)->limit(3)->orderBy('id','DESC')->get();
@endphp
        <div class="category-news p-3">
            <h3 class="bangla">Sports
                <i class="fa-solid fa-angle-right"></i>
            </h3><br>
            <div class="row">
                @foreach ($sports as $sport)
                <article class="col-12 col-lg-3 col-md-6 col-sm-12 p-3 border-end">
                    <figure>
                        <img class="img-fluid mx-auto d-block" src="{{ $sport->image }}" alt="">
                        <figcaption></figcaption>
                    </figure>
                    <article>
                        <a class="news-heading text-decoration-none text-dark" href="{{ url('article/details/'.$sport->id)}}"><h4 class="bangla news-heading">{{ $sport->title }}</h4></a>
                        <p class="bangla">
                            {!! Str::limit($sport->long_description, 50) !!}
                        </p>
                        <p class="time bangla">
                            {{ $sport->created_at->diffForHumans() }}
                        </p>
                    </article>
                </article>
                @endforeach

                {{-- <article class="col-12 col-lg-3 col-md-6 col-sm-12 p-3 border-end">
                    <figure>
                        <img class="img-fluid mx-auto d-block" src="./images/news/5.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                    <article>
                        <h4 class="bangla news-heading">ঢাকায় ইউরোপীয় পার্লামেন্টের প্রতিনিধিদল শ্রম অধিকার ও ব্যবসা পরিস্থিতি নিয়ে মতবিনিময়</h4>
                        <p class="bangla">
                            ইউরোপীয় পার্লামেন্টের বাণিজ্য কমিটির সফররত প্রতিনিধিদলের অন্যতম সদস্য এগনেস ইয়নজেরিউস শ্রমিকনেতাদের সঙ্গে মতবিনিময়ে
                        </p>
                        <p class="time bangla">
                            ৮ ঘণ্টা আগে
                        </p>
                    </article>
                </article>
                <article class="col-12 col-lg-3 col-md-6 col-sm-12 p-3 border-end">
                    <figure>
                        <img class="img-fluid mx-auto d-block" src="./images/news/6.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                    <article>
                        <h4 class="bangla news-heading">হাজারীবাগের ধারালো অস্ত্রের আঘাতে যুবক খুন</h4>
                        <p class="bangla">
                            হাজারীবাগ থানার উপপরিদর্শক (এসআই) শাওন বিশ্বাস জানান, খবর পেয়ে আলী হোসেন গার্লস স্কুল গলির খুশবুহ রেস্টুরেন্টের সামনে থেকে র
                        </p>
                        <p class="time bangla">
                            ৮ ঘণ্টা আগে
                        </p>
                    </article>
                </article>
                <article class="col-12 col-lg-3 col-md-6 col-sm-12 p-3">
                    <figure>
                        <img class="img-fluid mx-auto d-block" src="./images/news/4.webp" alt="">
                        <figcaption></figcaption>
                    </figure>
                    <article>
                        <h4 class="bangla news-heading">ইন্টারকন্টিনেন্টালে প্রকৌশলীর মৃত্যু অর্থ আত্মসাতের জন্য পরিকল্পিতভাবে হত্যা, দাবি পরিবারের</h4>
                        <p class="bangla">
                            বাজেটের বেঁচে যাওয়া টাকা অতিরিক্ত খরচ দেখিয়ে আত্মসাৎ করতে চেয়েছিলেন হোটেলটির কয়েকজন কর্মকর্তা। এ জন্য প্রকৌশলী সুব্রত সাহাকে চাপ দিচ্ছিলেন তাঁরা। কিন্তু তাঁদের প্রস্তাবে
                        </p>
                        <p class="time bangla">
                            ৮ ঘণ্টা আগে
                        </p>
                    </article>
                </article> --}}
            </div>
            <hr>

            @php
            $latest_news = App\Models\Article::where('status',1)->where('latest_news',1)->limit(4)->orderBy('id','DESC')->get();
        @endphp
            <h3 class="bangla">Latest News
                <i class="fa-solid fa-angle-right"></i>
            </h3><br>
            <div class="row">
                @foreach ($latest_news as $news)
                    <article class="col-12 col-lg-3 col-md-6 col-sm-12 p-3 border-end">
                        <figure>
                            <img class="img-fluid mx-auto d-block" src="{{ $news->image }}" alt="">
                            <figcaption></figcaption>
                        </figure>
                        <article>
                            <a class="news-heading text-decoration-none text-dark" href="{{ url('article/details/'.$news->id)}}"><h4 class="bangla news-heading">{{ $news->title }}</h4></a>
                            <p class="bangla">
                                {!! Str::limit($news->long_description, 50) !!}
                            </p>
                            <p class="time bangla">
                                {{ $news->created_at->diffForHumans() }}
                            </p>
                        </article>
                    </article>
                @endforeach


            </div>
            <hr>
        </div>
    </main>

    <!-- Main Section End -->


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
@php
    $social_media = App\Models\FooterSettings::latest()->limit(1)->get();
@endphp
        <div class="social-section row">
            <div class="col-lg-6 row">
                @foreach ($social_media as $data )
                <div class="col-lg-6 text-center">
                    <p class="bangla"> অনুসরণ করুন </p>

                    <a href="{{ $data->fb_url }}"><i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-facebook">


                    </i></a>


                    <a href="{{ $data->linkedin_url }}"><i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-linkedin">

                    </i></a>


                    <a href="{{ $data->twitter_url }}"><i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-twitter">

                    </i></a>


                        <i class="text-primary p-2 fs-4 rounded-circle fa-brands fa-youtube">
                            <a href="#"></a>
                        </i>

                </div>
                @endforeach



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
            <a href="" class="bangla text-dark text-decoration-none px-3">বিজ্ঞাপন</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">সার্কুলেশন</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">নীতিমালা</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">মন্তব্যের নীতিমালা</a>
            <a href="#" class="bangla text-dark text-decoration-none px-3">গোপনীয়তার নীতি</a>
            <a href="{{ url('address') }}" class="bangla text-dark text-decoration-none px-3">যোগাযোগ</a>
        </div>

        <hr>

        <p class="bangla text-center"> স্বত্ব © ২০২২ স্কুইরাল নিউজ
            সম্পাদক ও প্রকাশক: আরিফুল ইসলাম</p>


    </footer>


    <!-- Footer Section End -->





    <!-- Bootstrap JavaScript CDN -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

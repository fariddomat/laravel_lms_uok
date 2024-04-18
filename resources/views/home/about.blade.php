<x-site-layout>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('home')}}/img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>About</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                            <span>About</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about-section about-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-pic">
                        <img src="{{asset('home')}}/img/about-pic.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>Story About Us</h2>
                        <p class="first-para">Lorem ipsum proin gravida nibh vel velit auctor aliquet. Aenean pretium
                            sollicitudin, nascetur auci elit consequat ipsutissem niuis sed odio sit amet nibh vulputate
                            cursus a amet.</p>
                        <p class="second-para">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, gravida
                            quam semper libero sit amet.</p>
                        <img src="{{asset('home')}}/img/about-signature.png" alt="">
                        <div class="at-author">
                            <h4>Lettie Chavez</h4>
                            <span>CEO - Founder</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- About Counter Section Begin -->
    <div class="about-counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-counter-text">
                        <div class="single-counter">
                            <h1 class="counter-num count">{{ App\Models\Category::count() }}</h1>
                            <p>Categories</p>
                        </div>
                        <div class="single-counter">
                            <h1 class="counter-num count">{{ App\Models\Train::count() }}</h1>
                            <p>Traines</p>
                        </div>
                        <div class="single-counter">
                            <h1 class="counter-num count">{{ App\Models\User::role('trainee')->count() }}</h1>
                            <p>Members</p>
                        </div>
                        <div class="single-counter">
                            <h1 class="counter-num count">{{ $coaches->count() }}</h1>
                            <p>Coaches</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Counter Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="{{asset('home')}}/img/banner-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-text">
                        <h2>Get training today</h2>
                        <p>Gimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry’s standard.</p>
                        <a href="{{ route('contact') }}" class="primary-btn banner-btn">Contact Now</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{asset('home')}}/img/banner-person.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

  <!-- Trainer Section Begin-->
  <section class="trainer-section  about-trainer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>EXPERT COACHES</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($coaches as $user)
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">
                        <img src="{{ asset($user->image) }}" alt="">
                        <div class="trainer-text">
                            <h5>{{ $user->name }}</h5>
                            <span>{{ $user->email }}</span>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Trainer Section End -->

</x-site-layout>



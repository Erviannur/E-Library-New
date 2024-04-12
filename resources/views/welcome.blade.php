
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Library</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo2.png')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Roboto:400,400i,700&display=swap" rel="stylesheet">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/theme.css')}}">

</head>

<body>
    <header class="header">
        <div class="branding">
            <div class="container-fluid position-relative py-3">
                <div class="logo-wrapper">
	                <div class="site-logo"><a class="navbar-brand" href="{{ route('home')}}"><img class="logo-icon me-2" src="{{ asset('assets/img/icon.png')}}" width="10%" alt="logo" ></a></div>
                </div><!--//docs-logo-wrapper-->

            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->

    <section class="hero-section">
	    <div class="container">
		    <div class="row">
			    <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
				    <div class="promo pe-md-3 pe-lg-5">
					    <h1 class="headline mb-3">
						    E-Library
					    </h1><!--//headline-->
					    <div class="subheadline mb-4">
						    E-library merupakan sebuah website Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat natus eligendi nulla doloribus optio itaque amet atque exercitationem nemo veniam!
					    </div><!--//subheading-->

					    <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
						    <div class="col-12 col-md-auto">
						        <a class="btn btn-secondary w-100" href="{{ route('auth')}}">Login</a>
						    </div>
					    </div><!--//cta-holder-->
				    </div><!--//promo-->
			    </div><!--col-->
			    <div class="col-12 col-md-5 mb-5 align-self-center">
				    <div class="book-cover-holder">
					    <img class="img-fluid book-cover" src="{{ asset('assets/img/book.png')}}" width="80%" alt="book cover" >
				    </div><!--//book-cover-holder-->
			    </div><!--col-->
		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//hero-section-->

    <section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
	    <div class="container py-5">
		    <h2 class="section-heading text-center mb-3">What Will You Get From This Book?</h2>
		    <div class="section-intro single-col-max mx-auto text-center mb-5">Section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer blandit consequat consequat. Orci varius natoque penatibus et magnis. </div>
		    <div class="row text-center">
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-laptop-code"></i></div>
						    <h3 class="item-heading">Build Lorem Ipsum lobortis nec mauris habitant morbi</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    List one of your book's benefits here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer blandit consequat consequat.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fab fa-js-square"></i></div>
						    <h3 class="item-heading">Learn from lorem ipsum dolor sit amet consectetur</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    List one of your book's benefits here. Orci varius natoque penatibus et magnis dis parturient montes.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fab fa-rocketchat"></i></div>
						    <h3 class="item-heading">Discover phasellus id egestas tellus maximus</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    List one of your book's benefits here. Orci varius natoque penatibus et magnis dis parturient montes.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fab fa-angular"></i></div>
						    <h3 class="item-heading">Master aliquet augue ac ipsum lobortis interdum</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    List one of your book's benefits here. Orci varius natoque penatibus et magnis dis parturient montes.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-code-branch"></i></div>
						    <h3 class="item-heading">Deploy elementum mauris tincidunt tempus sagittis</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    List one of your book's benefits here. Orci varius natoque penatibus et magnis dis parturient montes.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-hand-holding-usd"></i></div>
						    <h3 class="item-heading">Become mattis est et mauris tempus non imperdiet</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    List one of your book's benefits here. Orci varius natoque penatibus et magnis dis parturient montes.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//benefits-section-->

    <section id="content-section" class="content-section">
	    <div class="container">
		    <div class="single-col-max mx-auto">
		    <h2 class="section-heading text-center mb-5">Apa yang didapatkan?</h2>
			    <div class="row">
				    <div class="col-12 col-md-6">
					    <div class="figure-holder mb-5">
						    <img class="img-fluid" src="{{ asset('assets/img/book.png')}}" width="70%" alt="image" >
					    </div><!--//figure-holder-->
				    </div><!--//col-->
				    <div class="col-12 col-md-6 mb-5">
					    <div class="key-points mb-4 text-center">
						    <ul class="key-points-list list-unstyled mb-4 mx-auto d-inline-block text-start">
							    <li><i class="fas fa-check-circle me-2"></i>Koleksi buku yang lengkap.</li>
							    <li><i class="fas fa-check-circle me-2"></i>Diperbarui setiap 1 minggu.</li>
							    <li><i class="fas fa-check-circle me-2"></i>Bisa didownload.</li>
							    <li><i class="fas fa-check-circle me-2"></i>Dibaca dimana saja.</li>
							    <li><i class="fas fa-check-circle me-2"></i>Hemat penyimpanan.</li>
							    <li><i class="fas fa-check-circle me-2"></i>Mudah diakses dimana saja.</li>
						    </ul>
					    </div><!--//key-points-->
				    </div><!--//col-12-->
			    </div><!--//row-->
		    </div><!--//single-col-max-->
	    </div><!--//container-->
    </section><!--//content-section-->


    <section id="reviews-section" class="reviews-section py-5">
	    <div class="container">
		    <h2 class="section-heading text-center">Review</h2>
		    <div class="section-intro text-center single-col-max mx-auto mb-5">Apa komentar pengunjung mengenai e-library ini?. </div>
		    <div class="row justify-content-center">

                @foreach ($comments as $item)
			    <div class="item col-12 col-lg-4 p-3 mb-4">
				    <div class="item-inner theme-bg-light rounded p-4">
					    <blockquote class="quote">
					        "{{ Str::limit($item->comment, 200) }}"
				        </blockquote><!--//item-->
				        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
					        <div class="col-12 col-md-auto text-center text-md-start">
					            <img class="source-profile" src="{{ asset('storage/images/users/' . $item->user->image)}}" alt="image" >
					        </div><!--//col-->
					        <div class="col source-info text-center text-md-start">
						        <div class="source-name">{{ $item->user->name }}</div>
						    </div><!--//col-->
				        </div><!--//source-->
				        <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
				    </div><!--//inner-->
			    </div><!--//item-->
                @endforeach

		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//reviews-section-->

    <section id="author-section" class="author-section section theme-bg-primary py-5">
	    <div class="container py-3">
		    <div class="author-profile text-center mb-5">
			    <img class="author-pic" src="{{ asset('assets/img/author-profile.png')}}" alt="image" >
		    </div><!--//author-profile-->
		    <h2 class="section-heading text-center text-white mb-3">About The Author</h2>
		    <div class="author-bio single-col-max mx-auto">
			    <p>This book landing page template is made by product designer <a class="theme-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers. You can use this template to self-publish and promote your book/ebook. You can easily use platforms such as <a class="theme-link" href="https://gumroad.com/" target="_blank">Gumroad</a> to handle your book payment and delivery.</p>
			    <p> This template is 100% FREE as long as you <strong>keep the footer attribution link</strong>. You do not have the rights to resell, sublicense or redistribute (even for free) the template on its own or as a separate attachment from any of your work. If you’d like to use this template without the footer attribution link, you can buy the <a class="theme-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devbook-free-bootstrap-5-book-ebook-landing-page-template-for-developers/" target="_blank"><strong>commercial license</strong></a>.</p>
			    <div class="author-links text-center pt-4">
			        <h5 class="text-white mb-4">Follow Author</h5>
				    <ul class="social-list list-unstyled">
					    <li class="list-inline-item"><a href="https://twitter.com/3rdwave_themes"><i class="fab fa-twitter"></i></a></li>
					    <li class="list-inline-item"><a href="https://github.com/xriley"><i class="fab fa-github-alt"></i></a></li>
			            <li class="list-inline-item"><a href="https://medium.com/@3rdwave_themes"><i class="fab fa-medium-m"></i></a></li>

			            <li class="list-inline-item"><a href="https://themes.3rdwavemedia.com/"><i class="fas fa-globe-europe"></i></a></li>
			        </ul><!--//social-list-->
			    </div><!--//author-links-->

		    </div><!--//author-bio-->

	    </div><!--//container-->
    </section><!--//author-section-->



    <footer class="footer">

	    <div class="footer-bottom text-center py-5">

	        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="theme-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

	    </div>

    </footer>

    <!-- Javascript -->
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/smoothscroll.min.js')}}"></script>

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/js/all.min.js')}}"></script>

    <script src="{{ asset('assets/js/main.js')}}"></script>

</body>
</html>


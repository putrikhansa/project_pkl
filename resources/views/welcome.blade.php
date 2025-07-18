@extends('layouts.frontend')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

        <img src="{{ asset('assets/frontend/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container position-relative">

            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2>SELAMAT DATANG </h2>
                <p>DI WEBSITE SISEHAT</p>
            </div><!-- End Welcome -->

            <div class="content row gy-4">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                        <h3>Why Choose SiSehat?</h3>
                        <p>
                            Karena sistem kamu bernama SiSehat, kamu bisa isi dengan poin-poin keunggulan UKS digital ini.
                        </p>
                        <div class="text-center">
                            <a href="#about" class="more-btn"><span>Learn More</span> <i
                                    class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box -->

                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="row gy-4">

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                    <i class="bi bi-bar-chart"></i>
                                    <h4>Laporan Kesehatan Otomatis</h4>
                                    <p>Semua riwayat kunjungan siswa tercatat rapi dan bisa dilihat kapan saja.
                                    </p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                    <i class="bi bi-person-vcard"></i>
                                    <h4>Data Siswa Terintegrasi </h4>
                                    <p>Petugas bisa melihat info kesehatan setiap siswa dengan mudah.
                                    </p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                    <i class="bi bi-lightbulb"></i>
                                    <h4>Mudah Digunakan</h4>
                                    <p>Tampilan sederhana dan ramah digunakan oleh petugas</p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>
                </div>
            </div><!-- End  Content-->

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4 gx-5">

                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/frontend/img/WhatsApp Image 2025-07-08 at 20.22.56_949ce290.jpg') }}"
                        class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h3>About Us</h3>
                    <p>
                        Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit
                        quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt
                        reiciendis veritatis asperiores placeat.
                    </p>
                    <ul>
                        <li>
                            <i class="fa-solid fa-vial-circle-check"></i>
                            <div>
                                <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                                <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-pump-medical"></i>
                            <div>
                                <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                                <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi
                                </p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-heart-circle-xmark"></i>
                            <div>
                                <h5>Voluptatem et qui exercitationem</h5>
                                <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">


                <!-- Tambahan: Kunjungan -->
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fas fa-notes-medical"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahKunjungan }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Total Kunjungan</p>
                    </div>
                </div>

                <!-- Tambahan: Obat -->
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fas fa-capsules"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahObat }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Obat</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Pemeriksaan Kesehatan</h3>
                        </a>
                        <p>Pemeriksaan tekanan darah, suhu tubuh, dan kondisi umum siswa secara rutin.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-capsule"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Pemberian Obat </h3>
                        </a>
                        <p>Pemberian obat ringan sesuai keluhan, dengan pengawasan petugas.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Catatan Rekam Medis </h3>
                        </a>
                        <p>Semua kunjungan siswa dicatat agar riwayat kesehatan bisa dipantau.</p>
                    </div>
                </div><!-- End Service Item -->
            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Appointment Section -->
    {{-- <section id="appointment" class="appointment section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Appointment</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <form action="forms/appointment.php" method="post" role="form" class="php-email-form">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Your Name" required="">
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Your Email" required="">
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control" name="phone" id="phone"
                            placeholder="Your Phone" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="datetime-local" name="date" class="form-control datepicker" id="date"
                            placeholder="Appointment Date" required="">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="department" id="department" class="form-select" required="">
                            <option value="">Select Department</option>
                            <option value="Department 1">Department 1</option>
                            <option value="Department 2">Department 2</option>
                            <option value="Department 3">Department 3</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="doctor" id="doctor" class="form-select" required="">
                            <option value="">Select Doctor</option>
                            <option value="Doctor 1">Doctor 1</option>
                            <option value="Doctor 2">Doctor 2</option>
                            <option value="Doctor 3">Doctor 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                </div>
                <div class="mt-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                    <div class="text-center"><button type="submit">Make an Appointment</button></div>
                </div>
            </form>

        </div>

    </section><!-- /Appointment Section --> --}}

    <!-- Departments Section -->
    <section id="departments" class="departments section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Departments</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Cardiology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Neurology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Hepatology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Pediatrics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Eye Care</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="departments-tab-1">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Cardiology</h3>
                                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde
                                        sonata raqer a videna mareta paulona marka</p>
                                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos
                                        ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima
                                        eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique
                                        accusamus nostrum rem vero</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/frontend/img/departments-1.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-2">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde
                                        sonata raqer a videna mareta paulona marka</p>
                                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis
                                        sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa
                                        voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle
                                        de nideran pal</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/frontend/img/departments-2.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-3">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim
                                        fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut
                                    </p>
                                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam.
                                        Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed
                                        laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum
                                        voluptatem optio quae</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/frontend/img/departments-3.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-4">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure
                                        porro quis delectus</p>
                                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam
                                        necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur
                                        corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum
                                        inventore</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/frontend/img/departments-4.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-5">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut
                                        non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati
                                        sed est sint aut vitae molestiae voluptate vel</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/frontend/img/departments-5.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Departments Section -->

    <!-- Doctors Section -->
    <section id="doctors" class="doctors section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Petugas</h2>
            <p>Petugas UKS yang siap melayani kebutuhan kesehatan siswa di sekolah.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">

                @forelse ($users as $index => $user)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="team-member d-flex align-items-start">
                            {{-- <div class="pic">
                                <img src="{{ asset('assets/frontend/img/doctors/default.png') }}" class="img-fluid"
                                    alt="Petugas">
                            </div> --}}
                            <div class="member-info">
                                <h4>{{ $user->name }}</h4>
                                <span>Petugas UKS</span>
                                <p>Email: {{ $user->email }}</p>
                                {{-- <div class="social">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada petugas yang terdaftar.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    {{-- !-- /Doctors Section --> --}}

    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                                    curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus
                                    non.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                                    laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                    pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus
                                    turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                    tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna
                                    molestie at elementum eu facilisis sed odio morbi quis</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                                    laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                    pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus
                                    turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                                    ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit
                                    adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in
                                    suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3>Testimonials</h3>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/frontend/img/testimonials/testimonials-1.jpg') }}"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Saul Goodman</h3>
                                            <h4>Ceo &amp; Founder</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                            Maecen aliquam, risus at semper.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/frontend/img/testimonials/testimonials-2.jpg') }}"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Sara Wilsson</h3>
                                            <h4>Designer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
                                            quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat
                                            irure amet legam anim culpa.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/frontend/img/testimonials/testimonials-3.jpg') }}"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Jena Karlis</h3>
                                            <h4>Store Owner</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                            quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                            quis sint minim.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/frontend/img/testimonials/testimonials-4.jpg') }}"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Matt Brandon</h3>
                                            <h4>Freelancer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                            fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore
                                            quem dolore labore illum veniam.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/frontend/img/testimonials/testimonials-5.jpg') }}"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>John Larson</h3>
                                            <h4>Entrepreneur</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam
                                            esse veniam culpa fore nisi cillum quid.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-1.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-1.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-2.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-2.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-3.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-3.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-4.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-4.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-5.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-5.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-6.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-6.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-7.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-7.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/frontend/img/gallery/gallery-8.jpg') }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('assets/frontend/img/gallery/gallery-8.jpg') }}" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

            </div>

        </div>

    </section><!-- /Gallery Section -->
@endsection

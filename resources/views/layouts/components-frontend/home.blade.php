<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="hero-bg-wrapper">
        <img src="{{ asset('assets\frontend\img\uksassalaam.jpeg') }}" alt="" data-aos="fade-in">
        <div class="hero-overlay"></div>
    </div>

    <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
            <h2 class="display-4 fw-bold text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">SELAMAT DATANG
            </h2>
            <p class="fs-4 italic-sub text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">Di Sistem Informasi
                Kesehatan (UKS) Sekolah</p>
        </div>
        <div class="content row gy-4 mt-2">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="why-box custom-why-box shadow-lg" data-aos="zoom-out" data-aos-delay="200">
                    <h3>Kenapa SchoolCare?</h3>
                    <p>
                        Kami mendigitalkan pelayanan UKS untuk memantau kesehatan siswa secara
                        real-time, akurat, dan mengedukasi seluruh warga sekolah.
                    </p>
                    <div class="text-center">
                        <a href="#about" class="more-btn">
                            <span>Eksplorasi Sekarang</span>
                            <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="d-flex flex-column justify-content-center">
                    <div class="row gy-4">

                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box-modern shadow-sm" data-aos="zoom-out" data-aos-delay="300">
                                <div class="icon-circle bg-light-blue">
                                    <i class="bi bi-bar-chart-line"></i>
                                </div>
                                <h4>Laporan Otomatis</h4>
                                <p>Riwayat kesehatan siswa tercatat rapi dan mudah dianalisis.</p>
                            </div>
                        </div>

                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box-modern shadow-sm" data-aos="zoom-out" data-aos-delay="400">
                                <div class="icon-circle bg-light-green">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <h4>Data Terintegrasi</h4>
                                <p>Akses cepat ke profil medis siswa untuk tindakan medis tepat.</p>
                            </div>
                        </div>

                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box-modern shadow-sm" data-aos="zoom-out" data-aos-delay="500">
                                <div class="icon-circle bg-light-orange">
                                    <i class="bi bi-stars"></i>
                                </div>
                                <h4>User Friendly</h4>
                                <p>Navigasi intuitif yang mudah digunakan oleh siapa saja.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section py-5">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4 align-items-center">

            <div class="col-lg-5 text-center" data-aos="fade-right">
                <div class="about-img-container shadow-sm p-4 bg-white rounded-4">
                    <img src="{{ asset('assets/frontend/img/WhatsApp Image 2025-07-08 at 20.22.56_949ce290.jpg') }}"
                        class="img-fluid" style="max-height: 300px;" alt="Logo UKS">
                    <div class="mt-3">
                        <h4 class="text-primary fw-bold mb-0">SchoolCare</h4>
                        <p class="text-muted small">DIGITAL HEALTHCARE</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 content" data-aos="fade-left">
                <h3 class="fw-bold text-dark">Tentang UKS</h3>
                <p class="text-muted mb-4">
                    Unit Kesehatan Sekolah (UKS) adalah layanan kesehatan strategis yang bertujuan membantu siswa
                    menjaga kesehatan fisik dan mental. Melalui <strong>SchoolCare</strong>, semua proses kini lebih
                    modern dan terstruktur.
                </p>

                <div class="about-features">
                    <div class="d-flex align-items-center mb-3 p-3 rounded-3 bg-light-blue shadow-sm">
                        <div class="feature-icon-small me-3">
                            <i class="fa-solid fa-vial-circle-check text-primary"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Pemeriksaan Berkala</h6>
                            <small class="text-muted">Deteksi dini kesehatan fisik dasar siswa secara rutin.</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3 p-3 rounded-3 bg-light-green shadow-sm">
                        <div class="feature-icon-small me-3">
                            <i class="fa-solid fa-pump-medical text-success"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Riwayat Digital</h6>
                            <small class="text-muted">Transformasi data manual ke digital untuk pemantauan
                                mudah.</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center p-3 rounded-3 bg-light-red shadow-sm">
                        <div class="feature-icon-small me-3">
                            <i class="fa-solid fa-heart-circle-check text-danger"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Edukasi Hidup Sehat</h6>
                            <small class="text-muted">Membangun budaya bersih dan sehat melalui konten
                                interaktif.</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- /About Section -->

<!-- Stats Section -->
<!-- <section id="stats" class="stats section light-background">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">


                    <!-- Tambahan: Kunjungan -->
<!-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fas fa-notes-medical"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahKunjungan }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Total Kunjungan</p>
                        </div>
                    </div> -->

<!-- Tambahan: Obat -->
<!-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fas fa-capsules"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahObat }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jumlah Obat</p>
                        </div>
                    </div> -->

<!-- </div>
            </div>
        </section> -->
<!-- /Stats Section -->

<!-- Services Section -->
<section id="jadwal" class="section py-5 light-background">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-5">
            <h2>Jadwal Pemeriksaan Kesehatan</h2>
            <p>Pastikan kamu hadir sesuai jadwal untuk menjaga kesehatan bersama.</p>
        </div>

        <div class="table-container shadow-sm border-0 rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table custom-table m-0">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col" class="text-center py-3">No</th>
                            <th scope="col" class="py-3">Tanggal Pemeriksaan</th>
                            <th scope="col" class="py-3">Kelas</th>
                            <th scope="col" class="py-3">Petugas / Pemeriksa</th>
                            <th scope="col" class="py-3">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwal as $item)
                            @php
                                $tanggal = \Carbon\Carbon::parse($item->tanggal);
                                $isToday = $tanggal->isToday();
                                // Jadwal dianggap "lewat" jika tanggalnya sebelum hari ini
                                $isPast = $tanggal->isPast() && !$isToday;
                            @endphp

                            {{-- Baris akan berwarna kuning jika hari ini, dan abu-abu pudar jika sudah lewat --}}
                            <tr class="{{ $isToday ? 'table-warning' : ($isPast ? 'bg-light opacity-75' : '') }}">
                                <td class="text-center fw-bold {{ $isPast ? 'text-muted' : 'text-primary' }}">
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar3 me-2 {{ $isPast ? 'text-muted' : 'text-info' }}"></i>
                                        <span
                                            class="{{ $isPast ? 'text-muted text-decoration-line-through' : 'fw-medium' }}">
                                            {{ $tanggal->translatedFormat('d F Y') }}
                                        </span>

                                        @if ($isToday)
                                            <span class="badge rounded-pill bg-danger ms-2 pulse-animation">Hari
                                                Ini</span>
                                        @elseif ($isPast)
                                            <span class="badge rounded-pill bg-secondary ms-2">Selesai</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $isPast ? 'bg-white text-muted border' : 'bg-light text-primary border border-primary' }} px-3 py-2">
                                        {{ $item->kelas->nama_kelas ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold {{ $isPast ? 'text-muted' : 'text-dark' }}">
                                        {{ $item->user->name ?? '-' }}
                                    </div>
                                    <small class="text-muted">Tim Medis SchoolCare</small>
                                </td>
                                <td>
                                    <span class="{{ $isPast ? 'text-muted' : 'text-muted' }} small">
                                        {{ $item->keterangan ?? 'Pemeriksaan Rutin' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-4">
                                        <img src="https://illustrations.popsy.co/blue/waiting-list.svg" alt="Empty"
                                            style="width: 180px;" class="mb-3 opacity-75">
                                        <h5 class="text-dark">Tidak Ada Jadwal Terdekat</h5>
                                        <p class="text-muted">Semua pemeriksaan telah selesai atau belum dijadwalkan
                                            kembali.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- Tambahkan CSS sedikit biar ada efek kedip di badge "Hari Ini" --}}
<style>
    .pulse-animation {
        animation: pulse-red 2s infinite;
    }

    @keyframes pulse-red {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
        }

        70% {
            transform: scale(1);
            box-shadow: 0 0 0 10px rgba(220, 53, 69, 0);
        }

        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
        }
    }

    .custom-table thead {
        background-color: #1977cc;
        /* Warna utama SchoolCare */
    }
</style>
<!-- /Services Section -->

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

</section> --}}
<!-- /Appointment Section -->

<!-- Departments Section -->
<section id="kegiatan" class="departments section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kegiatan UKS</h2>
        <p>Kegiatan Unit Kesehatan Sekolah dalam mendukung kesehatan dan kebersihan siswa.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#kegiatan-tab-1">Pemeriksaan
                            Kesehatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kegiatan-tab-2">Penyuluhan Kesehatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kegiatan-tab-3">Pemberian Obat Ringan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kegiatan-tab-4">Lomba Kebersihan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kegiatan-tab-5">UKS Siaga</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">

                    <div class="tab-pane active show" id="kegiatan-tab-1">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Pemeriksaan Kesehatan Berkala</h3>
                                <p class="fst-italic">Melakukan pemeriksaan dasar kepada siswa secara rutin.</p>
                                <p>Kegiatan ini meliputi pengecekan tinggi badan, berat badan, tekanan darah,
                                    kebersihan diri, dan keluhan kesehatan ringan. Tujuannya untuk memantau kondisi
                                    kesehatan siswa sejak dini.
                                </p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="{{ asset('assets/frontend/img/ukaes.jpeg') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="kegiatan-tab-2">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Penyuluhan Kesehatan</h3>
                                <p class="fst-italic">Edukasi kesehatan untuk siswa secara berkala.</p>
                                <p>Kegiatan ini dapat berupa penyuluhan kesehatan gigi, pentingnya olahraga,
                                    gizi seimbang, kebersihan diri, hingga kesehatan mental siswa.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="https://via.placeholder.com/300x250" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="kegiatan-tab-3">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Pemberian Obat Ringan</h3>
                                <p class="fst-italic">Pelayanan obat sederhana untuk siswa yang sakit ringan.</p>
                                <p>Kegiatan ini untuk membantu siswa yang mengalami sakit kepala,
                                    pusing, mual, luka gores, atau kelelahan ringan selama berada di sekolah.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="https://via.placeholder.com/300x250" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="kegiatan-tab-4">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Lomba Kebersihan Kelas</h3>
                                <p class="fst-italic">Upaya meningkatkan kebersihan lingkungan sekolah.</p>
                                <p>Lomba kebersihan kelas diadakan rutin untuk menumbuhkan
                                    kedisiplinan, tanggung jawab, dan kesadaran menjaga lingkungan bersih dan sehat.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="https://via.placeholder.com/300x250" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="kegiatan-tab-5">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>UKS Siaga</h3>
                                <p class="fst-italic">UKS siap siaga membantu siswa kapanpun dibutuhkan.</p>
                                <p>UKS Siaga adalah kegiatan piket atau petugas yang siap mengatasi
                                    gangguan kesehatan ringan dan mendampingi siswa jika harus dirujuk.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="https://via.placeholder.com/300x250" class="img-fluid">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>
<!-- /Departments Section -->

<!-- Doctors Section -->
<section id="doctors" class="doctors section">
    <!-- Section Title -->
    {{-- <div class="container section-title" data-aos="fade-up">
        <h2>Petugas</h2>
        <p>Petugas UKS yang siap melayani kebutuhan kesehatan siswa di sekolah.</p>
    </div>End Section Title --> --}}

    <div class="container">
        {{-- <div class="row gy-4">

            @forelse ($users as $index => $user)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic">
                            <img src="{{ asset('assets/frontend/img/doctors/default.png') }}" class="img-fluid"
                                alt="Petugas">
                        </div>
                        <div class="member-info">
                            <h4>{{ $user->name }}</h4>
                            <span>Petugas UKS</span>
                            <p>Email: {{ $user->email }}</p>
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div> 
                        </div>
                    </div>
                </div><!-- End Team Member -->
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Belum ada petugas yang terdaftar.</p>
                </div>
            @endforelse

        </div> --}}
        <!-- </div> -->
        <!-- </section> -->
        {{-- !-- /Doctors Section --> --}} -->

        <!-- Faq Section -->
        <section id="edukasi" class="edukasi section light-background" style="padding: 60px 0;">

            <div class="container section-title" data-aos="fade-up">
                <h2>Edukasi Kesehatan</h2>
                <p>Informasi kesehatan untuk membantu siswa menjaga kebersihan dan kesehatan sehari-hari.</p>
            </div>

            <div class="container">
                <div class="row gy-4">
                    @forelse ($edukasi as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="edukasi-card h-100 shadow-sm border-0">
                                <div class="edukasi-icon">
                                    <i class="bi bi-heart-pulse-fill"></i>
                                </div>
                                <div class="edukasi-body">
                                    <h3>{{ $item->judul }}</h3>
                                    <span
                                        class="badge bg-info mb-2">{{ $item->kategori->nama_kategori ?? 'Umum' }}</span>
                                    <div class="edukasi-text">
                                        {!! nl2br(e(Str::limit($item->isi, 150))) !!}
                                    </div>
                                    <a href="#" class="read-more mt-3 d-inline-block" data-bs-toggle="modal"
                                        data-bs-target="#modalEdukasi{{ $item->id }}">
                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalEdukasi{{ $item->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header bg-primary text-white p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box-modal me-3">
                                                <i class="bi bi-file-earmark-medical-fill"></i>
                                            </div>
                                            <h5 class="modal-title fw-bold" id="exampleModalLabel">
                                                {{ $item->judul }}</h5>
                                        </div>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-5">
                                        <div class="mb-4 d-flex align-items-center text-muted small">
                                            <span
                                                class="badge bg-light text-primary border me-2">{{ $item->kategori->nama_kategori ?? 'Umum' }}</span>
                                            <span class="me-2">|</span>
                                            <i class="bi bi-calendar-event me-1"></i>
                                            {{ $item->tanggal_publish ? \Carbon\Carbon::parse($item->tanggal_publish)->format('d M Y') : '-' }}
                                        </div>

                                        <div class="content-edukasi"
                                            style="font-size: 16px; line-height: 1.8; color: #444;">
                                            {!! nl2br(e($item->isi)) !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 p-4">
                                        <button type="button" class="btn btn-secondary px-4 shadow-sm"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-info">Belum ada edukasi kesehatan tersedia.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- /Faq Section -->

        <!-- Testimonials Section -->
        {{-- <section id="testimonials" class="testimonials section">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                        <h3>Testimonials</h3>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in
                            voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident.
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
                                            <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora
                                                entum
                                                suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh
                                                et.
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
                                            <span>Export tempor illum tamen malis malis eram quae irure esse labore quem
                                                cillum
                                                quid cillum eram malis quorum velit fore eram velit sunt aliqua noster
                                                fugiat
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
                                            <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum
                                                nulla
                                                quem veniam duis minim tempor labore quem eram duis noster aute amet
                                                eram fore
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
                                            <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos
                                                export minim
                                                fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt
                                                elit fore
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
                                            <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam
                                                tempor
                                                noster veniam enim culpa labore duis sunt culpa nulla illum cillum
                                                fugiat legam
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

        </section><!-- /Testimonials Section --> --}}

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

        </section>
        <style>
            /* Hero Styles */
            .hero-bg-wrapper {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1;
                /* Coba ganti jadi 1 atau -1 tergantung layer lain */
                overflow: hidden;
            }

            .hero-bg-wrapper img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                z-index: 1;
            }

            /* Pastikan container di atasnya punya z-index lebih tinggi */
            .hero .container {
                position: relative;
                z-index: 10;
                /* Biar tulisan ada di depan gambar */
            }

            #hero {
                padding: 100px 0 60px 0;
                min-height: 80vh;
                display: flex;
                align-items: center;
            }

            .hero-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.4));
            }

            .welcome h2 {
                color: #2c4964;
                letter-spacing: 2px;
            }

            .italic-sub {
                color: #1977cc;
                font-weight: 500;
            }

            /* Custom Why Box */
            .custom-why-box {
                background: #1977cc !important;
                padding: 40px !important;
                border-radius: 20px !important;
            }

            /* Modern Icon Box */
            .icon-box-modern {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                padding: 30px;
                border-radius: 15px;
                border: 1px solid rgba(255, 255, 255, 0.3);
                transition: 0.4s;
                text-align: center;
                width: 100%;
            }

            .icon-box-modern:hover {
                transform: translateY(-10px);
                background: #fff;
            }

            .icon-circle {
                width: 60px;
                height: 60px;
                margin: 0 auto 20px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
            }

            .bg-light-blue {
                background: #e7f1ff;
                color: #1977cc;
            }

            .bg-light-green {
                background: #e8f7f0;
                color: #28a745;
            }

            .bg-light-orange {
                background: #fff5e9;
                color: #fd7e14;
            }

            .icon-box-modern h4 {
                font-size: 18px;
                font-weight: 700;
                margin-bottom: 15px;
                color: #2c4964;
            }

            .icon-box-modern p {
                font-size: 14px;
                color: #6c757d;
            }

            /* About Section Improvements */
            .about .ls-1 {
                letter-spacing: 2px;
            }

            .header-line {
                width: 60px;
                height: 4px;
                background: #1977cc;
                margin-top: 10px;
                border-radius: 2px;
            }

            .description {
                font-size: 16px;
                line-height: 1.8;
                color: #5f6f7d;
            }

            /* Gambar Style */
            .about-img-experience {
                position: relative;
                padding: 20px;
            }

            .experience-badge {
                position: absolute;
                bottom: -10px;
                right: 30px;
                background: white;
                padding: 15px 25px;
                border-radius: 12px;
                text-align: center;
            }

            /* Feature Icon Boxes */
            /* Warna Background Lembut untuk Fitur */
            .bg-light-blue {
                background-color: #f0f7ff;
                border-left: 4px solid #1977cc;
            }

            .bg-light-green {
                background-color: #f0fdf4;
                border-left: 4px solid #28a745;
            }

            .bg-light-red {
                background-color: #fef2f2;
                border-left: 4px solid #dc3545;
            }

            /* Ukuran Ikon Kecil yang Terkontrol */
            .feature-icon-small {
                width: 45px;
                height: 45px;
                background: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 10px;
                font-size: 20px;
                flex-shrink: 0;
                /* Biar ikon nggak gepeng kalau teks panjang */
            }

            /* Container Gambar */
            .about-img-container {
                transition: 0.3s;
                border: 1px solid #eee;
            }

            .about-img-container:hover {
                transform: translateY(-5px);
            }

            .bg-blue-soft {
                background: #e7f1ff;
            }

            .bg-green-soft {
                background: #e8f7f0;
            }

            .bg-red-soft {
                background: #feecef;
            }

            .feature-item:hover .feature-icon {
                transform: scale(1.1);
            }

            .feature-item h5 {
                color: #2c4964;
                font-size: 18px;
            }

            /* AOS Fix */
            [data-aos] {
                pointer-events: none;
            }

            .aos-animate {
                pointer-events: auto;
            }

            /* Container Tabel agar melayang */
            .table-container {
                background: #fff;
                border-radius: 15px;
                padding: 10px;
                border: 1px solid #eef2f7;
            }


            /* Menghilangkan border default bootstrap yang kaku */
            .custom-table {
                margin-bottom: 0;
                border-collapse: separate;
                border-spacing: 0 8px;
                /* Memberi jarak antar baris */
            }

            /* Header Tabel Modern */
            .custom-table thead th {
                background-color: #1977cc !important;
                /* Warna biru Medilab */
                color: #fff !important;
                border: none;
                padding: 15px;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 13px;
                letter-spacing: 1px;
            }

            .custom-table thead th:first-child {
                border-radius: 10px 0 0 10px;
            }

            .custom-table thead th:last-child {
                border-radius: 0 10px 10px 0;
            }

            /* Baris Body */
            .custom-table tbody tr {
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
                transition: all 0.3s ease;
            }

            .custom-table tbody tr td {
                background: #fff;
                padding: 15px;
                vertical-align: middle;
                border-top: 1px solid #f8f9fa;
                border-bottom: 1px solid #f8f9fa;
            }

            .custom-table tbody tr:hover td {
                background-color: #f1f7fd !important;
                /* Warna hover biru muda */
                transform: scale(1.002);
            }

            /* Badge Kelas */
            .badge-kelas {
                background-color: #e1effe;
                color: #1e429f;
                padding: 8px 12px;
                border-radius: 8px;
                font-weight: 600;
            }

            /* Ikon Kalender */
            .bi-calendar3 {
                font-size: 1.1rem;
            }

            .edukasi-card {
                background: #fff;
                padding: 30px;
                border-radius: 15px;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                border: none;
            }

            .edukasi-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
            }

            .edukasi-icon {
                width: 50px;
                height: 50px;
                background: #1977cc;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 10px;
                font-size: 24px;
                margin-bottom: 20px;
            }

            .edukasi-card h3 {
                font-size: 20px;
                font-weight: 700;
                margin-bottom: 10px;
                color: #2c4964;
            }

            .edukasi-text {
                color: #777;
                font-size: 14px;
                line-height: 1.6;
            }

            .read-more {
                font-weight: 600;
                color: #1977cc;
                text-decoration: none;
                font-size: 14px;
            }

            .edukasi-text {
                font-size: 14px;
                line-height: 1.8;
                /* Memberi ruang antar baris agar tidak sesak */
                color: #555;
                text-align: left;
                /* Rata kiri agar mudah dibaca */
                margin-bottom: 15px;
            }

            /* Membuat judul lebih menonjol */
            .edukasi-card h3 {
                color: #1977cc;
                font-size: 20px;
                margin-bottom: 12px;
                line-height: 1.3;
            }

            .read-more {
                font-weight: bold;
                color: #1977cc;
                transition: 0.3s;
            }

            .read-more:hover {
                color: #0d589b;
                text-decoration: underline;
            }

            /* Styling Khusus Modal Edukasi */
            .modal-content {
                border-radius: 20px !important;
                overflow: hidden;
            }

            .icon-box-modal {
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.2);
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 10px;
                font-size: 20px;
            }

            .content-edukasi {
                text-align: justify;
                /* Agar teks rapi rata kanan-kiri */
            }

            /* Mempercantik tampilan list jika ada di dalam teks */
            .content-edukasi br+br {
                display: block;
                margin-top: 10px;
                content: "";
            }

            .modal-header .btn-close {
                opacity: 0.8;
                transition: 0.3s;
            }

            .modal-header .btn-close:hover {
                transform: rotate(90deg);
                opacity: 1;
            }
        </style><!-- /Gallery Section -->

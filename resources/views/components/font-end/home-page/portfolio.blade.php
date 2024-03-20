<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
             Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
      </div>

      <div class="row" data-aos="fade-up">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="{{ asset('img/portfolio/portfolio-10.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="{{ asset('img/portfolio/portfolio-10.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="/portfolio-details-1" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="{{ asset('img/portfolio/portfolio-11.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="{{ asset('img/portfolio/portfolio-11.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="/portfolio-details-2" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="{{ asset('img/portfolio/portfolio-12.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="{{ asset('img/portfolio/portfolio-12.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="/portfolio-details-3" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('img/portfolio/portfolio-12.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="{{ asset('img/portfolio/portfolio-12.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="/portfolio-details-3" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('img/portfolio/portfolio-12.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="{{ asset('img/portfolio/portfolio-12.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="/portfolio-details-3" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('img/portfolio/portfolio-12.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="{{ asset('img/portfolio/portfolio-12.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="/portfolio-details-3" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>




      </div>

    </div>
  </section><!-- End Portfolio Section -->

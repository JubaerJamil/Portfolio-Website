<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Testimonials</h2>
        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
            Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div id="imagelist" class="swiper-wrapper">



        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->


<script>
            getCertificateList();
    async function getCertificateList(){
        showLoader();
            let res = await axios.get('/certificate-list');
        hideLoader();
        res.data.forEach(function(item){
        document.getElementById('imagelist').innerHTML += (
            `
            <div class="swiper-slide">
            <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
            <img src="${item['img_url']}" class="testimonial-img" alt="">
            </div>
        </div>
            `
            )
        });
    }
</script>


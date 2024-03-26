<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Testimonials</h2>
        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
            Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
      </div>

      <div id="imagelist" class="autoplay">
        {{-- <div class=""><img class="img-thumbnail  w-50" src={{ asset('img/testimonials/Jubaer Jamil-certificate1.jpg') }}></div> --}}
        {{-- <div class=""><img class="img-thumbnail w-100 p-1" src="{{ asset('img/testimonials/Jubaer Jamil-certificate1.jpg') }}"></div> --}}
        {{-- <div class=""><img class="img-thumbnail w-100 p-1" src="{{ asset('img/testimonials/Jubaer Jamil-certificate1.jpg') }}"></div> --}}
        {{-- <div class=""><img class="img-thumbnail w-100 p-1" src="{{ asset('img/testimonials/Jubaer Jamil-certificate1.jpg') }}"></div> --}}
    </div>

    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('.autoplay').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        });
        </script> --}}

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
            <div class=""><img class="img-thumbnail w-100" src="${item['img_url']}"></div>
            `
            )
        });
    }


    $(document).ready(function(){
            $('.autoplay').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        });
</script>

{{-- <div class="swiper-slide">
    <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
    <img src="${item['img_url']}" class="testimonial-img" alt="">
    </div>
</div> --}}

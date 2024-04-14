<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Certificate of completion</h2>
            <p>My professional journey is fortified by a collection of esteemed certificates, validating my expertise in
                various domains. These credentials reflect my commitment to continuous learning and mastery of
                industry-relevant skills. Explore the testament to my capabilities and professionalism through my
                showcased certificates.</p>
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
    async function getCertificateList() {
        showLoader();
        let res = await axios.get('/certificate-list');
        hideLoader();
        res.data.forEach(function(item) {
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

<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">
        <div id="aboutList">

        </div>


    </div>
  </section><!-- End About Section -->

<script>
            getAbout();
    async function getAbout(){

        let res = await axios.get('/about_list');

        let item = res.data;

        document.getElementById('aboutList').innerHTML += (
            `
            <div class="section-title">
        <h2>About</h2>
        <p><span class="fs-4 text-success fw-bold">${item['about_info']}</p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="${item['img_url']}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>${item['about_title']}</h3>
          <p class="fst-italic">${item['about_details']}</p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>${item['birthday']}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>${item['phone_number']}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>${item['current_city_name']}</span></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>E-mail:</strong> <span>${item['email']}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>${item['freelancer']}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Birth place:</strong> <span>${item['birth_place']}</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
            `
        )
    }

</script>

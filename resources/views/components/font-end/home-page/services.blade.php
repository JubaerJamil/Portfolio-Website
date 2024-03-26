<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">
        <div id="">
            <div class="section-title">
                <h2>Services</h2>
                <p id="summary">Welcome to My website, where I'm committed to delivering exceptional solutions meticulously
                    crafted to cater to your unique needs. My extensive range of services guarantees that we can fulfill all your
                     requirements, regardless of the scale or complexity of your project.</p>
              </div>
              <div id="serviceItem" class="row">

              </div>
        </div>

    </div>
  </section><!-- End Services Section -->

  <script>
            getServiceItem();
    async function getServiceItem(){
        showLoader();
                let res = await axios.get('/service-list');
        hideLoader();

        res.data.forEach(function(item){

            document.getElementById('serviceItem').innerHTML += (
                    `
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                    <div class="icon"><i class='bi bi-calendar4-week' ></i></div>
                    <h4 class="title"><a href="" id="title">${item['service_title']}</a></h4>
                    <p class="description" id="details">${item['service_details']}</p>
                    </div>
                    `
            )

        });

    }
  </script>

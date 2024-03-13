<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">
        <div id="serviceItem">

            <div class="section-title">
                <h2>Services</h2>
                <p id="summary">summary</p>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                  <div class="icon"><i class='bx bx-code-curly' ></i></div>
                  <h4 class="title"><a href="" id="title">web development</a></h4>
                  <p class="description" id="details">web development details</p>
                </div>

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

        if (res.status===200){
            let data = res.data['data'];
            document.getElementById('summary').value = data['service_summary'];
            document.getElementById('title').value = data['service_title'];
            document.getElementById('details').value = data['service_details'];
        }
        else {
                alert('something went wrong');
               // return console.log(res);
        }

    }








    //     res.data.forEach(function(item){

    //     let services = `<div class="section-title">
    //     <h2>Services</h2>
    //     <p></p>
    //   </div>

    //   <div class="row">
    //     <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
    //       <div class="icon"><i class='bx bx-code-curly' ></i></div>
    //       <h4 class="title"><a href=""></a></h4>
    //       <p class="description"></p>
    //     </div>

    //   </div>`
    //   serviceItem.append(services)
    // });


    // }

  </script>

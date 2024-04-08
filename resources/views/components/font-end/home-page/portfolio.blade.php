<section id="portfolio" class="portfolio section-bg py-5">
    <div class="container">
        <div class="section-title">
            <h2>Project</h2>
            <p>Discover some of the remarkable projects we've undertaken below. At our core, we're dedicated to delivering outstanding
                results that exceed our clients' expectations. With each project, we aim to showcase our creativity,
                expertise, and unwavering commitment to excellence.</p>
        </div>
        <div id="showProjectItem" class="row">


        </div>
    </div>
</section>

<script>
    showAllProjectItem();
    async function showAllProjectItem() {
        showLoader();
        let res = await axios.get('/project-list');
        hideLoader();

        res.data.forEach(function(item) {
            document.getElementById('showProjectItem').innerHTML += (
                `
                <div  class="col-lg-6">
                    <div  class="card">
                        <img src="${item['img_url']}" class="card-img-top" alt="Project 1">
                        <div class="card-body">
                            <h5 class="card-title">${item['project_title']}</h5>
                            <p class="card-text">Client Name: <span>${item['client_name']}</span></p>
                            <p class="card-text-2">Client From: <span>${item['client_from']}</span></p>
                            <a target="target_blang" href="${item['preview_link']}" class="btn btn-primary">Visit Project</a>
                        </div>
                    </div>
                </div>
                `
            )
        });
    }
</script>

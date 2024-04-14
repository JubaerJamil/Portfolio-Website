<!-- ======= Resume Section ======= -->
<section id="resume" class="resume">
    <div class="container">

        <div class="section-title">
            <h2>Resume</h2>
            <p>Passionate about web development, I specialize in PHP and Laravel. With experience in various projects,
                I deliver impactful results in diverse settings. Equipped with my skills, I'm poised to contribute
                effectively to your team.</p>
        </div>

        <div class="row">
            <div class="col-lg-6" data-aos="fade-up">
                <h3 class="resume-title">Summary</h3>
                <div id="summaryItem" class="resume-item pb-0">

                </div>

                <h3 class="resume-title">Education</h3>
                <div id="resumeList" class="resume-item">

                </div>
            </div>


            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="resume-title">Professional Education</h3>
                <div id="resumeProList" class="resume-item">

                </div>
            </div>
        </div>
    </div>
</section><!-- End Resume Section -->

<script>
    getResumeSummary();
    async function getResumeSummary() {
        showLoader();
        let res = await axios.get('/resume-education-list');
        hideLoader();
        let summary = res.data[0].summary;
        document.getElementById('summaryItem').innerHTML =
            `
            <h4 >Jubaer Jamil</h4>
            <p><em>${summary}</em></p>
        `
    }
</script>

<script>
    getResumeItems();
    async function getResumeItems() {
        showLoader();
        let res = await axios.get('/resume-education-list');
        hideLoader();
        res.data.forEach(function(item) {
            document.getElementById('resumeList').innerHTML += (
                `
                    <h4>${item['course_name']}</h4>
                    <h5>${item['passing_year']}</h5>
                    <ul>
                        <li>${item['institute_name']}</li>
                        <li>${item['gpa']}</li>
                    </ul>
                `
            )
        });
    }
</script>

<script>
    getResumeProItems();
    async function getResumeProItems() {
        showLoader();
        let res = await axios.get('/resume-pro-education-list');
        hideLoader();
        res.data.forEach(function(item) {
            document.getElementById('resumeProList').innerHTML += (
                `
                    <h4>${item['course_name']}</h4>
                    <h5>${item['passing_year']}</h5>
                    <p><em>${item['institute_name']}</em></p>
                    <h5>Course Mentor</h5>
                    <ul>
                        <li>${item['mentor_name1']}</li>
                        ${item['mentor_name2'] !== null ? `<li>${item['mentor_name2']}</li>` : ''}
                    </ul>
                `
            )
        });
    }
</script>

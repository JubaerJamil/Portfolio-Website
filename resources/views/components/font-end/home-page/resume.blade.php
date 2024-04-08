<!-- ======= Resume Section ======= -->
<section id="resume" class="resume">
    <div class="container">

        <div class="section-title">
            <h2>Resume</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            <div class="col-lg-6" data-aos="fade-up">
                <h3 class="resume-title">Summary</h3>
                <div class="resume-item pb-0">
                    <h4 id="resumeLlist">Jubaer Jamil</h4>
                    {{-- <p><em>With a robust background spanning over 06+ years in the non-tech sector, I am now eager to
                            channel my skills and
                            enthusiasm into the dynamic realm of the technology sector. Throughout my career, I have
                            developed a strong foundation,
                            which I am confident will seamlessly translate into the tech industry.<br><br>

                            My journey in the non-tech sector has equipped me with a solid understanding of service,
                            honing my ability to adapt to
                            rapidly changing landscapes and drive successful outcomes. Recognizing the pivotal role of
                            technology in shaping the future,
                            I have proactively acquired to align my expertise with the demands of the technology
                            sector.</em></p>
                </div>

                <h3 class="resume-title">Education</h3>
                <div class="resume-item">
                    <h4>Diploma In Civil Engineering</h4>
                    <h5>2011 - 2015</h5>
                    <ul>
                        <li>BCI Engineering Institute</li>
                        <li>2.96 out of 4.00</li>
                    </ul>
                </div> --}}

                {{-- <div class="resume-item">
                    <h4>secondary school certificate</h4>
                    <h5>2009-2011</h5>
                    <ul>
                        <li>darul islam technical institute</li>
                        <li>4.66 out of 5.00</li>
                    </ul>
                </div> --}}
            </div>


            {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="resume-title">Professional Education</h3>
                <div class="resume-item">
                    <h4>Web Develpoment with PhP, Laravel</h4>
                    <h5>Feb - Oct 2023 </h5>
                    <p><em>Ostad.app </em></p>
                    <h5>Course Mentor</h5>
                    <ul>
                        <li>Hasin Hyder</li>
                        <li>Rabbil Hasan Rupom</li>
                    </ul>
                </div>
                <div class="resume-item">
                    <h4>Web Develpoment with PhP, Laravel</h4>
                    <h5>Jul - Dec 2022 </h5>
                    <p><em>People N tech </em></p>
                    <h5>Course Mentor</h5>
                    <ul>
                        <li>Imtiaj ahmed Milon</li>
                    </ul>
                </div>
                <div class="resume-item">
                    <h4>full stack web developer</h4>
                    <h5>Jan - April 2022 </h5>
                    <p><em>e-shikhon </em></p>
                    <h5>Course Mentor</h5>
                    <ul>
                        <li>Raihan Islam</li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</section><!-- End Resume Section -->

<script>
    getResumeItems();
async function getResumeItems(){
showLoader();
        let res = await axios.get('/resume-education-list');
hideLoader();

res.data.forEach(function(item){

    document.getElementById('resumeLlist').innerHTML += (
            `
            <p><em>${item['summary']}</em></p>

                </div>
                <h3 class="resume-title">Education</h3>
                <div class="resume-item">
                    <h4>${item['course_name']}</h4>
                    <h5>${item['passing_year']}</h5>
                    <ul>
                        <li>${item['institute_name']}</li>
                        <li>${item['gpa']}</li>
                    </ul>
                </div>
            `
    )

});

}
</script>

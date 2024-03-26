<!-- ======= Skills Section ======= -->
<section id="skills" class="skills section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Skills</h2>
        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit.
            Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
             Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
      </div>

      <div id="skillList" class="row skills-content">

      </div>

    </div>
  </section><!-- End Skills Section -->

<script>
    getSkillItem();
async function getSkillItem(){
showLoader();
        let res = await axios.get('/skill-list');
hideLoader();

res.data.forEach(function(item){

    document.getElementById('skillList').innerHTML += (
            `
                <div class="progress">
                    <div class="col-lg-12" data-aos="fade-up">
            <span class="skill">${item['skill_name']}<i class="val">${item['show_percentage']}</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="${item['skill_percentage']}" aria-valuemin="0" aria-valuemax="95"></div>
            </div>
          </div>
        </div>
            `
    )

});

}
</script>

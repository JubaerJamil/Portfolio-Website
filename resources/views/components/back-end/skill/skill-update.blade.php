<div class="modal animated zoomIn" id="skill-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Skill Item?</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Update skill name</label>
                                <input type="text" class="form-control" id="skillName">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label"> Update skill percentate</label>
                                <input type="text" class="form-control" id="skillPercentage">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Update skill value</label>
                                <input type="text" class="form-control" id="skillValue">
                            </div>

                            <input class="d-none" id="skillItemId">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="SkillUpdate()" id="update-btn" class="btn btn-sm  btn-success">Update</button>
                </div>
            </div>
    </div>
</div>

<script>
    async function fillupskill(id) {
        document.getElementById('skillItemId').value = id;
        showLoader();
        try {
            let res = await axios.get("/skill-update-by-id", {id: id });
            document.getElementById('skillName').value = res.data['skill_name'];
            document.getElementById('skillPercentage').value = res.data['show_percentage'];
            document.getElementById('skillValue').value = res.data['skill_percentage'];
        } catch (error) {
            console.error("Error fetching service details:", error);
            // Handle error (show message, log, etc.)
        } finally {
            hideLoader();
        }
    }


    async function SkillUpdate() {

        let skillItemId = document.getElementById('skillItemId').value;
        let updateSkillName = document.getElementById('skillName').value;
        let updateSkillPercentage = document.getElementById('skillPercentage').value;
        let updateSkillValue = document.getElementById('skillValue').value;

        if (updateSkillName == 0){
            errorToast('Skill name must be required')
        }
        else if (updateSkillPercentage == 0){
            errorToast('Skill percentage must be required')
        }
        else if (updateSkillValue == 0){
            errorToast('Skill value must be required')
        }
        else {
            document.getElementById('update-modal-close').click();
            showLoader();
                let res = await axios.post('/skill-update', {
                    id:skillItemId,
                    skill_name:updateSkillName,
                    show_percentage:updateSkillPercentage,
                    skill_percentage:updateSkillValue
                });
            hideLoader();
            if (res.status === 200 && res.data['status']=== 'success'){
                successToast('Update successfully');
                document.getElementById('save-form').reset();
                await getSkillList();
            }
            else{
                errorToast('Request failed')
            }
        }

    }

</script>


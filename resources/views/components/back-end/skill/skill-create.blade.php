<div class="modal animated zoomIn" id="Skill-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create New Skill Item</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Skill Name</label>
                                <input type="text" class="form-control" id="skillName">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Skill Percentage</label>
                                <input type="text" class="form-control" id="SkillPercentage">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Skill Value</label>
                                <input type="text" class="form-control" id="SkillValue">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="SkillCreate()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>

    async function SkillCreate(){

        let skillName = document.getElementById('skillName').value;
        let SkillPercentage = document.getElementById('SkillPercentage').value;
        let SkillValue = document.getElementById('SkillValue').value;

        if (!skillName){
            errorToast('Skill name must be required')
        }
        else if (!SkillPercentage){
            errorToast('Skill percentage must be required')
        }
        else if (!SkillValue){
            errorToast('Skill value must be required')
        }
        else {
            document.getElementById('modal-close').click();

            showLoader();
                let res = await axios.post('/skill-input', {

                    skill_name:skillName,
                    show_percentage:SkillPercentage,
                    skill_percentage:SkillValue
                });
            hideLoader();

            if (res.status === 200 && res.data['status']=== 'success'){
                successToast('Added successfully');
                document.getElementById('save-form').reset();
                await getSkillList();
            }
            else{
                errorToast('Request failed')
            }

        }


    }





</script>

<div class="modal animated zoomIn" id="proEdu-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Education Item</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Course Title</label>
                                <input type="text" class="form-control" id="updateProEduTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Institute Name</label>
                                <input class="form-control" id="updateProEduInstituteName">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">course Duration</label>
                                <input class="form-control" id="updatePoEduSession">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Mentor's Name-1</label>
                                <input class="form-control" id="updateProEduMentor1">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Mentor's Name-2</label>
                                <input class="form-control"  id="updateProEduMentor2">
                            </div>

                            <input class="d-none" id="proEduItemId">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="proEdu-update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"aria-label="Close">Close</button>
                <button onclick="ProEduItemUpdate()" id="save-btn" class="btn btn-sm  btn-success">Update</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function fillUpProEduItem(id) {
        document.getElementById('proEduItemId').value = id;
        showLoader();
        try {

            let res = await axios.get('resume-pro-education-update-by-id', {
                params: {
                    id: id
                }
            });
            hideLoader();

            document.getElementById('updateProEduTitle').value = res.data['course_name'];
            document.getElementById('updateProEduInstituteName').value = res.data['institute_name'];
            document.getElementById('updatePoEduSession').value = res.data['passing_year'];
            document.getElementById('updateProEduMentor1').value = res.data['mentor_name1'];
            document.getElementById('updateProEduMentor2').value = res.data['mentor_name2'];
        } catch (error) {
            console.error('error', error);
        }
    }


    async function ProEduItemUpdate() {
        let proEduItemId = document.getElementById('proEduItemId').value;
        let updateProEduTitle = document.getElementById('updateProEduTitle').value;
        let updateProEduInstituteName = document.getElementById('updateProEduInstituteName').value;
        let updatePoEduSession = document.getElementById('updatePoEduSession').value;
        let updateProEduMentor1 = document.getElementById('updateProEduMentor1').value;
        let updateProEduMentor2 = document.getElementById('updateProEduMentor2').value;

        if (!updateProEduTitle) {
            errorToast('Pro education title must be required')
        } else if (!updateProEduInstituteName) {
            errorToast('Pro institute name must be required')
        } else if (!updatePoEduSession) {
            errorToast('Pro session must be required')
        } else if (!updateProEduMentor1) {
            errorToast('Mentor-1 name must be required')
        } else {
            document.getElementById('proEdu-update-modal-close').click();

            showLoader();
            try {
                let res = await axios.post('/update-pro-education', {
                    id: proEduItemId,
                    course_name: updateProEduTitle,
                    passing_year: updatePoEduSession,
                    institute_name: updateProEduInstituteName,
                    mentor_name1: updateProEduMentor1,
                    mentor_name2: updateProEduMentor2,
                });
                hideLoader();

                if (res.status === 200 && res.data['status'] === 'success') {
                    successToast('Professional education item updated successfully');
                    document.getElementById('save-form').reset();
                    await getProEduList();
                } else {
                    errorToast('Request failed')
                }
            } catch (error) {
                console.error('error', error);
            }
        }
    }
</script>

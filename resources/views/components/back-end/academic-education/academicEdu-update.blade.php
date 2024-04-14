<div class="modal animated zoomIn" id="edu-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <label class="form-label">Career Summary</label>
                                <textarea id="updateCareerSummary" class="form-control" rows="5" cols="50"> </textarea>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Education Title</label>
                                <input type="text" class="form-control" id="updateEducationTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Institute Name</label>
                                <input id="updateInstituteName" class="form-control" rows="3" cols="50">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Session</label>
                                <input id="updateSession" class="form-control" rows="3" cols="50">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">GPA</label>
                                <input id="updateGpa" class="form-control" rows="3" cols="50">
                            </div>

                            <input class="d-none" id="eduItemId">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="edu-update-modal-close" class="btn btn-sm btn-danger"
                    data-bs-dismiss="modal"aria-label="Close">Close</button>
                <button onclick="eduItemUpdate()" id="save-btn" class="btn btn-sm  btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function fillUpEduItem(id) {
        document.getElementById('eduItemId').value = id;
        showLoader();
        try {

            let res = await axios.get('resume-edu-update-by-id', {
                params: {
                    id: id
                }
            });
            hideLoader();

            document.getElementById('updateCareerSummary').value = res.data['summary'];
            document.getElementById('updateEducationTitle').value = res.data['course_name'];
            document.getElementById('updateInstituteName').value = res.data['institute_name'];
            document.getElementById('updateSession').value = res.data['passing_year'];
            document.getElementById('updateGpa').value = res.data['gpa'];
        } catch (error) {
            console.error('error', error);
        }
    }


    async function eduItemUpdate() {
        let eduItemId = document.getElementById('eduItemId').value;
        let updateCareerSummary = document.getElementById('updateCareerSummary').value;
        let updateEducationTitle = document.getElementById('updateEducationTitle').value;
        let updateInstituteName = document.getElementById('updateInstituteName').value;
        let updateSession = document.getElementById('updateSession').value;
        let updateGpa = document.getElementById('updateGpa').value;

        if (!updateEducationTitle) {
            errorToast('Education title must be required')
        } else if (!updateInstituteName) {
            errorToast('Institute name must be required')
        } else if (!updateSession) {
            errorToast('Session must be required')
        } else if (!updateGpa) {
            errorToast('GPA must be required')
        } else {
            document.getElementById('edu-update-modal-close').click();

            showLoader();
            try {
                let res = await axios.post('/update-education', {
                    id: eduItemId,
                    summary: updateCareerSummary,
                    course_name: updateEducationTitle,
                    passing_year: updateSession,
                    institute_name: updateInstituteName,
                    gpa: updateGpa
                });
                hideLoader();

                if (res.status === 200 && res.data['status'] === 'success') {
                    successToast('Education item updated successfully');
                    document.getElementById('save-form').reset();
                    await getAcademicEduList();
                } else {
                    errorToast('Request failed')
                }
            } catch (error) {
                console.error('error', error);
            }
        }
    }
</script>

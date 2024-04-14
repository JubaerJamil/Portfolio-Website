<div class="modal animated zoomIn" id="proEdu-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create New Education Item</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Course Title</label>
                                <input type="text" class="form-control" id="proEduTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Institute Name</label>
                                <input id="proEduInstituteName" class="form-control">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">course Duration</label>
                                <input id="proEduSession" class="form-control">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Mentor's Name-1</label>
                                <input id="proEduMentor1" class="form-control">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Mentor's Name-2</label>
                                <input id="proEduMentor2" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="proEdu-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="proEduItemCreate()" id="save-btn" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function proEduItemCreate() {

        let proEduTitle = document.getElementById('proEduTitle').value;
        let proEduInstituteName = document.getElementById('proEduInstituteName').value;
        let proEduSession = document.getElementById('proEduSession').value;
        let proEduMentor1 = document.getElementById('proEduMentor1').value;
        let proEduMentor2 = document.getElementById('proEduMentor2').value;


        if (!proEduTitle) {
            errorToast('Education title must be required')
        } else if (!proEduInstituteName) {
            errorToast('Institute name must be required')
        } else if (!proEduSession) {
            errorToast('Session must be required')
        } else if (!proEduMentor1) {
            errorToast('Mentor 1 field must be required')
        } else {
            document.getElementById('proEdu-modal-close').click();

            showLoader();
            try {
                let res = await axios.post('/input-pro-education', {

                    course_name: proEduTitle,
                    passing_year: proEduSession,
                    institute_name: proEduInstituteName,
                    mentor_name1: proEduMentor1,
                    mentor_name2: proEduMentor2

                });
                hideLoader();

                if (res.status === 200 && res.data['status'] === 'success') {
                    successToast('Professional Education item Added successfully');
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

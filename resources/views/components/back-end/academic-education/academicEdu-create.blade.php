<div class="modal animated zoomIn" id="edu-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <label class="form-label">Career Summary</label>
                                <textarea id="careerSummary" class="form-control" rows="5" cols="50"> </textarea>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Education Title</label>
                                <input type="text" class="form-control" id="educationTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Institute Name</label>
                                <input id="instituteName" class="form-control" rows="3" cols="50">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Session</label>
                                <input id="session" class="form-control" rows="3" cols="50">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">GPA</label>
                                <input id="gpa" class="form-control" rows="3" cols="50">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="edu-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="eduItemCreate()" id="save-btn" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function eduItemCreate() {
        let careerSummary = document.getElementById('careerSummary').value;
        let educationTitle = document.getElementById('educationTitle').value;
        let instituteName = document.getElementById('instituteName').value;
        let session = document.getElementById('session').value;
        let gpa = document.getElementById('gpa').value;

        if (!educationTitle) {
            errorToast('Education title must be required')
        } else if (!instituteName) {
            errorToast('Institute name must be required')
        } else if (!session) {
            errorToast('Session must be required')
        } else if (!gpa) {
            errorToast('GPA must be required')
        } else {
            document.getElementById('edu-modal-close').click();

            showLoader();
            try {
                let res = await axios.post('/input-education', {

                    summary: careerSummary,
                    course_name: educationTitle,
                    passing_year: session,
                    institute_name: instituteName,
                    gpa: gpa
                });
                hideLoader();

                if (res.status === 200 && res.data['status'] === 'success') {
                    successToast('Education item Added successfully');
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

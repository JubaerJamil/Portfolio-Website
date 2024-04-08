<div class="modal animated zoomIn" id="project-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Project Item</h6>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Project Title</label>
                                <input type="text" class="form-control" id="updateProjectTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="updateClientName">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Client From</label>
                                <input type="text" class="form-control" id="updateClientFrom">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Preview Link</label>
                                <input type="text" class="form-control" id="UpdatePreviewLink">
                            </div>


                            <div class="col-12 p-1">
                                <label class="form-label"></label>
                                <img id="projectOldImg" src="" class="img-thumbnail" alt="">
                                <input oninput="projectOldImg.src=window.URL.createObjectURL(this.files[0])",
                                    id="updateNew_img" type="file" class="ms-0">
                            </div>

                            <input class="d-none" id="projectItemId">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="pjt-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="updateProjectItem()" id="save-btn" class="btn btn-sm  btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function fillUpProjectItem(id) {
        document.getElementById('projectItemId').value = id;
        showLoader();
        try {
            let res = await axios.get("/project-update-by-id", {
                params: {
                    id: id
                }
            });
            document.getElementById('updateProjectTitle').value = res.data['project_title'];
            document.getElementById('updateClientName').value = res.data['client_name'];
            document.getElementById('updateClientFrom').value = res.data['client_from'];
            document.getElementById('UpdatePreviewLink').value = res.data['preview_link'];
            document.getElementById('projectOldImg').src = res.data['img_url'];
        } catch (error) {
            console.error("Error fetching service details:", error);
        } finally {
            hideLoader();
        }
    }

    async function updateProjectItem() {

        let projectItemId = document.getElementById('projectItemId').value;
        let updateProjectTitle = document.getElementById('updateProjectTitle').value;
        let updateClientName = document.getElementById('updateClientName').value;
        let updateClientFrom = document.getElementById('updateClientFrom').value;
        let UpdatePreviewLink = document.getElementById('UpdatePreviewLink').value;
        let updateNew_img = document.getElementById('updateNew_img').files[0];

        if (!updateProjectTitle) {
            errorToast('Please fill up all input field');
        } else if (!updateClientName) {
            errorToast('Please fill up all input field');
        } else if (!updateClientFrom) {
            errorToast('Please fill up all input field');
        } else if (!UpdatePreviewLink) {
            errorToast('Please fill up all input field');
        } else {

            document.getElementById('pjt-modal-close').click();

            let formData = new FormData();

            formData.append('id', projectItemId)
            formData.append('img_url', updateNew_img)
            formData.append('project_title', updateProjectTitle)
            formData.append('client_name', updateClientName)
            formData.append('client_from', updateClientFrom)
            formData.append('preview_link', UpdatePreviewLink)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post('/update-project', formData, config);
            hideLoader();

            if (res.status === 200) {
                successToast('Successfully update project item')
                document.getElementById("update-form").reset();
                await getProjectList();
            } else {
                errorToast('Request Failed')
            }
        }



    }
</script>

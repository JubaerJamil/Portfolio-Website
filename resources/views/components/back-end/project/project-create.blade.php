<div class="modal animated zoomIn" id="project-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Upload A New Project Item</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">


                            <div class="col-12 p-1">
                                <label class="form-label">Project Title</label>
                                <input type="text" class="form-control" id="projectTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="clientName">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Client From</label>
                                <input type="text" class="form-control" id="clientFrom">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Preview Link</label>
                                <input type="text" class="form-control" id="previewLink">
                            </div>


                            <div class="col-12 p-1">
                                <label class="form-label"></label>
                                <img id="oldimg" src="" class="img-thumbnail" alt="">
                                <input oninput="oldimg.src=window.URL.createObjectURL(this.files[0])",  id="new_img" type="file" class="ms-0">
                            </div>


                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="uploadProjectItem()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function uploadProjectItem(){

            let new_img = document.getElementById('new_img').files[0];
            let projectTitle = document.getElementById('projectTitle').value;
            let clientName = document.getElementById('clientName').value;
            let clientFrom = document.getElementById('clientFrom').value;
            let previewLink = document.getElementById('previewLink').value;

            if (!new_img){
                errorToast('Please select an image');
            }
            else if(!projectTitle){
                errorToast('Please input project title');
            }
            else if(!clientName){
                errorToast('Please input client name');
            }
            else if(!clientFrom){
                errorToast('Please input client from');
            }else if(!previewLink){
                errorToast('Please input project preview link');
            }
            else{
                document.getElementById('modal-close').click();

                let formData = new FormData();

                formData.append('img_url', new_img)
                formData.append('project_title', projectTitle)
                formData.append('client_name', clientName)
                formData.append('client_from', clientFrom)
                formData.append('preview_link', previewLink)

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                showLoader();
                    let res = await axios.post('/create-project', formData, config);
                hideLoader();

                if (res.status === 200 && res.data['status']=== 'success'){
                    successToast('Successfully new project item insert')
                        await getProjectList();
                }
                else{
                    errorToast('Request Failed')
                }


            }


    }




</script>

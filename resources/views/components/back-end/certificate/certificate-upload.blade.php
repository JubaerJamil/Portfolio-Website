<div class="modal animated zoomIn" id="upload-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Upload A New Item</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label"></label>
                                <img id="oldimg" src="" class="img-thumbnail" alt="">
                                <input oninput="oldimg.src=window.URL.createObjectURL(this.files[0])",  id="new_img" type="file" class="ms-1">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="uploadCertificate()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function uploadCertificate(){

            let new_img = document.getElementById('new_img').files[0];

            if (!new_img){
                errorToast('Please select an image');
            }
            else{
                document.getElementById('modal-close').click();

                let formData = new FormData();

                formData.append('img_url', new_img)

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                showLoader();
                    let res = await axios.post('/certificate-upload', formData, config);
                hideLoader();

                if (res.status === 200 && res.data['status']=== 'success'){
                    successToast('Certificate Successfully Uploaded')
                        await getCertificate();
                }
                else{
                    errorToast('Request Failed')
                }


            }


    }




</script>

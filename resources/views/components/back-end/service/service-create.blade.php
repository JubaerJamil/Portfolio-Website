<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create New Service Item</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Service Summary</label>
                                <textarea id="ServiceSummary" class="form-control" rows="3" cols="50"> </textarea>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Service Title</label>
                                <input type="text" class="form-control" id="ServiceTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Service Details</label>
                                <textarea id="ServiceDetails" class="form-control" rows="3" cols="50"> </textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="ServiceCreate()" id="save-btn" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function ServiceCreate() {

        let ServiceSummary = document.getElementById('ServiceSummary').value;
        let ServiceTitle = document.getElementById('ServiceTitle').value;
        let ServiceDetails = document.getElementById('ServiceDetails').value;

        if (ServiceTitle == 0) {
            errorToast('Service title must be required')
        } else if (ServiceDetails == 0) {
            errorToast('Service details must be required')
        } else {
            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post('/service-create', {

                service_summary: ServiceSummary,
                service_title: ServiceTitle,
                service_details: ServiceDetails
            });
            hideLoader();

            if (res.status === 201) {
                successToast('Added successfully');
                document.getElementById('save-form').reset();
                await getservicelist();
            } else {
                errorToast('Request failed')
            }

        }


    }
</script>

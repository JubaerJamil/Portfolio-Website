<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Service Item?</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Update Service Summary</label>
                                <textarea id="updateServiceSummary" class="form-control" rows="3" cols="50"> </textarea>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label"> Update Service Title</label>
                                <input type="text" class="form-control" id="updateServiceTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Update Service Details</label>
                                <textarea id="updateServiceDetails" class="form-control" rows="3" cols="50"> </textarea>
                            </div>

                            <input class="d-none" id="serviceItemId">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="ServiceUpdate()" id="update-btn" class="btn btn-sm  btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function fillupservice(id) {
        document.getElementById('serviceItemId').value = id;
        showLoader();
        try {
            let res = await axios.get("/service-update-by-id", {
                params: {
                    id: id
                }
            });
            document.getElementById('updateServiceSummary').value = res.data['service_summary'];
            document.getElementById('updateServiceTitle').value = res.data['service_title'];
            document.getElementById('updateServiceDetails').value = res.data['service_details'];
        } catch (error) {
            console.error("Error fetching service details:", error);
        } finally {
            hideLoader();
        }
    }


    async function ServiceUpdate() {

        let serviceItemId = document.getElementById('serviceItemId').value;
        let updateServiceSummary = document.getElementById('updateServiceSummary').value;
        let updateServiceTitle = document.getElementById('updateServiceTitle').value;
        let updateServiceDetails = document.getElementById('updateServiceDetails').value;

        if (updateServiceTitle == 0) {
            errorToast('Service title must be required')
        } else if (updateServiceDetails == 0) {
            errorToast('Service details must be required')
        } else {
            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post('/service-update', {
                id: serviceItemId,
                service_summary: updateServiceSummary,
                service_title: updateServiceTitle,
                service_details: updateServiceDetails
            });
            hideLoader();
            if (res.status === 200) {
                successToast('Update successfully');
                document.getElementById('save-form').reset();
                await getservicelist();
            } else {
                errorToast('Request failed')
            }
        }

    }
</script>








{{-- <div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Service Item?</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Update Service Summary</label>

                                <textarea id="updateServiceSummary" class="form-control" rows="3" cols="50"> </textarea>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label"> Update Service Title</label>
                                <input type="text" class="form-control" id="updateServiceTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Update Service Details</label>

                                <textarea id="updateServiceDetails" class="form-control" rows="3" cols="50"> </textarea>
                            </div>

                                <input id="serviceItemId">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="ServiceUpdate()" id="update-btn" class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function fillupservice(id) {
        document.getElementById('serviceItemId').value = id;

        showLoader();
            let res = await axios.get("/service-update-by-id",{id:id});
        hideLoader();

        document.getElementById('updateServiceSummary').value = res.data['service_summary'];
        document.getElementById('updateServiceTitle').value = res.data['service_title'];
        document.getElementById('updateServiceDetails').value = res.data['service_details'];
    }


</script> --}}

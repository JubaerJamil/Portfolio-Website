<div class="container-fluid mt-5">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between">
                <div class="align-items-center col">
                    <h6 class="fs-3">Service List</h6>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-success">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-info">
                    <th>No</th>
                    <th>Service Summary</th>
                    <th>Service Title</th>
                    <th>Service Details</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
            getservicelist();
    async function getservicelist(){

        showLoader();
                let res = await axios.get('/service-list');
        hideLoader();

        let tableList = $('#tableList');
        let tableData = $('#tableData');

        tableData.DataTable().destroy();
        tableList.empty();


        res.data.forEach(function(item, index){

            let row = `
                <tr>
                    <td class="">${ index +1 }</td>
                    <td><textarea readonly class="form-control" rows="3" cols="30">${ item['service_summary'] }</textarea></td>
                    <td><textarea readonly class="form-control" rows="3" cols="50">${ item['service_title'] }</textarea></td>
                    <td><textarea readonly class="form-control" rows="3" cols="50">${ item['service_details'] }</textarea></td>
                    <td>
                        <button data-id ="${item['id']}" class= "Editbtn btn btn-outline-success text-sm px-3 py-1  m-0 mt-4">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        <button data-id ="${item['id']}" class= "Deletebtn btn btn-outline-danger text-sm px-3 py-1 m-0 mt-4">
                            <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                </tr>`
            tableList.append(row)
        });

            $('.Editbtn').on('click', async function() {
                let id = $(this).data('id');
                    await fillupservice(id);
                $('#update-modal').modal('show');
                // $('#serviceItemId').val(id);
            });

            $('.Deletebtn').on('click', function() {
                let id = $(this).data('id');
                $('#delete-modal').modal('show');
                $('#deleteID').val(id);
            });

            new DataTable('#tableData', {
            order: [[0, 'desc']],
            lengthMenu: [10, 25, 50, 100]
        });

    }




</script>




<div class="container-fluid mt-5">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between">
                <div class="align-items-center col">
                    <h6 class="fs-3">Certificate List</h6>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#upload-modal" class="float-end btn m-0 btn-sm bg-gradient-success">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-info">
                    <th>No</th>
                    <th>Certificate Image</th>
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
        getCertificate();
    async function getCertificate(){
        showLoader();
            let res = await axios.get('/certificate-list');
        hideLoader();

        let tableData = $('#tableData');
        let tableList = $('#tableList');

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function (item, index){

            let cfList = `<tr>
                    <td class="">${ index +1 }</td>
                    <td class="ms-6"><img src="${ item['img_url']}" class="img-thumbnail w-80 h-auto" alt="certificate image"></td>
                    <td class="me-6">
                        <button data-id ="${item['id']}" class= "Deletebtn btn btn-outline-danger text-sm px-3 py-1 m-0 mt-2">
                            <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                </tr>`
            tableList.append(cfList)
        });


        $('.Deletebtn').on('click', function() {
                let id = $(this).data('id');
                $('#cf-delete-modal').modal('show');
                $('#deleteID').val(id);
            });


        new DataTable('#tableData',{
            order: [[0, 'desc']],
            lengthMenu: [5, 10, 20, 50]
        })
    }






</script>

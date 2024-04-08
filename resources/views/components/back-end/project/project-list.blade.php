<div class="container-fluid mt-5">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between">
                <div class="align-items-center col">
                    <h6 class="fs-3">Project List</h6>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#project-create-modal" class="float-end btn m-0 btn-sm bg-gradient-success">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-info">
                    <th>No</th>
                    <th>Project Title</th>
                    <th>Client Name</th>
                    <th>Client From</th>
                    <th>Preview Link</th>
                    <th>Project Image</th>
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
    getProjectList();
async function getProjectList(){

showLoader();
        let res = await axios.get('/project-list');
hideLoader();

let tableList = $('#tableList');
let tableData = $('#tableData');

tableData.DataTable().destroy();
tableList.empty();


res.data.forEach(function(item, index){

    let row = `
        <tr>
            <td class="">${ index +1 }</td>
            <td>${item['project_title']}</td>
            <td>${item['client_name']}</td>
            <td>${item['client_from']}</td>
            <td>${item['preview_link']}</td>
            <td><img src="${ item['img_url']}" class="img-thumbnail w-80 h-auto" alt="certificate image"></td>
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
            await fillUpProjectItem(id);
        $('#project-update-modal').modal('show');
        $('#projectItemId').val(id);
    });

    $('.Deletebtn').on('click', function() {
        let id = $(this).data('id');
        $('#project-delete-modal').modal('show');
        $('#projectDeleteID').val(id);
    });

    new DataTable('#tableData', {
    order: [[0, 'desc']],
    lengthMenu: [10, 25, 50, 100]
});

}

</script>

<div class="container-fluid mt-5">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between">
                <div class="align-items-center col">
                    <h6 class="fs-3">Professional Education List</h6>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#proEdu-create-modal" class="float-end btn m-0 btn-sm bg-gradient-success">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-info">
                    <th>No</th>
                    <th>Education Title</th>
                    <th>Institute Name</th>
                    <th>Course Duration</th>
                    <th>Mentor's Name-1</th>
                    <th>Mentor's Name-2</th>
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
    getProEduList();
async function getProEduList(){

showLoader();
        let res = await axios.get('/resume-pro-education-list');
hideLoader();

let tableList = $('#tableList');
let tableData = $('#tableData');

tableData.DataTable().destroy();
tableList.empty();


res.data.forEach(function(item, index){

    let row = `
        <tr>
            <td class="">${ index +1 }</td>
            <td>${item['course_name']}</td>
            <td>${item['institute_name']}</td>
            <td>${item['passing_year']}</td>
            <td>${item['mentor_name1']}</td>
            <td>${item['mentor_name2']}</td>
            <td>
                <button data-id ="${item['id']}" class= "Editbtn btn btn-outline-success text-sm px-3 py-1  m-0">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                <button data-id ="${item['id']}" class= "Deletebtn btn btn-outline-danger text-sm px-3 py-1 m-0">
                    <i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </td>
        </tr>`
    tableList.append(row)
});

    $('.Editbtn').on('click', async function() {
        let id = $(this).data('id');
            await fillUpProEduItem(id);
        $('#proEdu-update-modal').modal('show');
        $('#proEduItemId').val(id);
    });

    $('.Deletebtn').on('click', function() {
        let id = $(this).data('id');
        $('#ProEdu-delete-modal').modal('show');
        $('#proEduDeleteID').val(id);
    });

    new DataTable('#tableData', {
    order: [[0, 'desc']],
    lengthMenu: [10, 25, 50, 100]
});

}




</script>


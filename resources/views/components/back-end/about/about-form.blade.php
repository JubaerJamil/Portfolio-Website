<div class="container ms-4">
    <div class="row mt-3">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>About Section</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="col-lg-2" data-aos="fade-right">
                            <img id="oldimg" src="" class="img-thumbnail" alt="profile image">
                            <input oninput="oldimg", id="new_img" type="file" class="ms-1">
                        </div>
                        <div class="row m-0 p-0">

                            <div class="col-md-4 p-2">
                                <label>About Information</label>
                                <td><textarea id="about_info" class="form-control" rows="5" cols="50"></textarea></td>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>About Title</label>
                                <td><textarea id="about_title" class="form-control" rows="5" cols="50"></textarea></td>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>About Details</label>
                                <td><textarea id="about_details" class="form-control" rows="5" cols="50"></textarea></td>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>Birthday</label>
                                <input id="birthday" class="form-control" type="text"/>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>Phone Number</label>
                                <input id="phone" class="form-control" type="text"/>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>Current City</label>
                                <input id="current_city" class="form-control" type="text"/>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>E-mail</label>
                                <input id="email" class="form-control" type="email"/>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>Available for freelancing</label>
                                <input id="freelancer" class="form-control" type="text"/>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>Where are your birth place</label>
                                <input id="birth_place" class="form-control" type="text"/>
                            </div>

                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onUpdate()" class="btn mt-3 w-100  bg-gradient-primary">Update About</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
            getAboutListdata();
    async function getAboutListdata(){

        showLoader();
                let res = await axios.get('/about_list');
        hideLoader();

        if(res.status === 200){
            let data = res.data;
            document.getElementById('about_info').value=data['about_info'];
            document.getElementById('about_title').value=data['about_title'];
            document.getElementById('about_details').value=data['about_details'];
            document.getElementById('birthday').value=data['birthday'];
            document.getElementById('phone').value=data['phone_number'];
            document.getElementById('current_city').value=data['current_city_name'];
            document.getElementById('email').value=data['email'];
            document.getElementById('freelancer').value=data['freelancer'];
            document.getElementById('birth_place').value=data['birth_place'];
            document.getElementById('oldimg').src=data['img_url'];
        }
        else{
            errorToast('Request Faild');
        }
    }


            async function onUpdate(){


                let about_info = document.getElementById('about_info').value;
                let about_title = document.getElementById('about_title').value;
                let about_details = document.getElementById('about_details').value;
                let birthday = document.getElementById('birthday').value;
                let phone = document.getElementById('phone').value;
                let current_city = document.getElementById('current_city').value;
                let email = document.getElementById('email').value;
                let freelancer = document.getElementById('freelancer').value;
                let birth_place = document.getElementById('birth_place').value;
                let new_img = document.getElementById('new_img').files[0];

                if (!about_info.trim()){
                    errorToast('About information required');
                }
                else if (!about_title.trim()){
                    errorToast('About title required');
                }
                else if (!about_details.trim()){
                    errorToast('About details required');
                }
                else if (!birthday.trim()){
                    errorToast('Birthday required');
                }
                else if (!phone.trim()){
                    errorToast('Phone number required');
                }
                else if (!current_city.trim()){
                    errorToast('Current city required');
                }
                else if (!email.trim()){
                    errorToast('Email required');
                }
                else if (!freelancer.trim()){
                    errorToast('Freelancing information required');
                }
                else if (!birth_place.trim()){
                    errorToast('Birth place required');
                }
                else {
                    let formData = new FormData();

                    formData.append('img_url', new_img)
                    formData.append('about_info', about_info)
                    formData.append('about_title', about_title)
                    formData.append('about_details', about_details)
                    formData.append('birthday', birthday)
                    formData.append('phone_number', phone)
                    formData.append('current_city_name', current_city)
                    formData.append('email', email)
                    formData.append('freelancer', freelancer)
                    formData.append('birth_place', birth_place)

                    const config = {
                        headers : {
                            'content-type': 'multipart/form-data'
                        }
                    }

                    try{
                        showLoader();
                        let res = await axios.post('/update_about', formData, config);
                        hideLoader();

                    if (res.status === 200 && res.data === 1){
                        successToast('Update Successfully Done');
                            await getAboutListdata();
                    }
                    else{
                        errorToast('Request failed');
                    }
                    }
                    catch(error){
                        errorToast('Update request failed');
                        // console.log(error)
                    }
                }
            }







</script>








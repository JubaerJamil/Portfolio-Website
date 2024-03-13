<div class="container ms-4">
    <div class="row mt-3">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>User Profile</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="col-lg-2" data-aos="fade-right">
                            <img id="img_url" src="" class="img-thumbnail" alt="profile image">
                            <input oninput="img_url", id="user_img" type="file" class="ms-1">
                        </div>
                        <div class="row m-0 p-0">

                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input readonly id="email" placeholder="User Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>First Name</label>
                                <input id="firstName" placeholder="First Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Last Name</label>
                                <input id="lastName" placeholder="Last Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onUpdate()" class="btn mt-3 w-100  bg-gradient-primary">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        getprofile();
    async function getprofile(){
        showLoader();
        let res = await axios.get('/user-info');
        hideLoader();

        if(res.status === 200 && res.data['status'] === 'success'){
            let data = res.data['data'];
            document.getElementById('firstName').value=data['first_name'];
            document.getElementById('lastName').value=data['last_name'];
            document.getElementById('email').value=data['email'];
            document.getElementById('password').value=data['password'];
            document.getElementById('mobile').value=data['phone'];
            document.getElementById('img_url').src=data['img_url'];
        }
        else{
            errorToast(res.data['message']);
        }
    }

    async function onUpdate(){
        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;
        let user_img = document.getElementById('user_img').files[0];

        // if (firstName === 0){
        //     errorToast('First name is required');
        // }
        // else if (lastName === 0) {
        //     errorToast('Last name is required');
        // }
        // else if (mobile === 0){
        //     errorToast('Phone number is required');
        // }
        // else if (password === 0){
        //     errorToast('Password is required');
        // }

        if(!firstName || !lastName || !mobile || !password){
            errorToast('No fields can be left blank');
        }

        else{
            let formData = new FormData();

            formData.append('first_name', firstName)
            formData.append('last_name', lastName)
            formData.append('phone', mobile)
            formData.append('password', password)
            formData.append('img_url', user_img)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();

                let res = await axios.post('/user-info-update', formData, config);

            hideLoader();

            if (res.status === 200 && res.data['status'] === 'success'){
                successToast('Update Successfully Done');
                   await getprofile();
            }else{
                errorToast('Request failed');
            }

        }


    }





</script>

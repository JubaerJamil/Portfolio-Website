<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 m-3 border-radius-lg" style="background-image: url('https://images.unsplash.com/photo-1497996541515-6549b145cd90?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="container mb-4">
      <div class="row mt-lg-n12 mt-md-n12 mt-n12 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card mt-8">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-warning shadow-warning border-radius-lg py-3 pe-1 text-center py-4">
                <h3 class="font-weight-bolder text-white">Reset Your Password ?</h3>
                <p class="mb-0 text-sm text-white">Please input your register e-mail address</p>
              </div>
            </div>
            <div class="card-body py-4">
              <form role="form">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email</label>
                    <input id="email" type="email" class="form-control">
                  </div>
                <div class="text-center">
                  <button onclick="sendotp()" type="button" class="btn bg-gradient-warning w-100 mt-4 mb-0">Send OTP</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<script>

    async function sendotp() {
        let email = document.getElementById('email').value;

        if (!email) {
            errorToast('Please enter a valid email address');
        } else {

            try {
                showLoader();
                let res = await axios.post('/send-otp', { email: email });

                if (res.status === 200 && res.data['status'] === 'success') {
                    successToast('OTP send successfully');
                    window.location.href = '/verify-otp-code';
                    sessionStorage.setItem('email', email);
                } else {
                    errorToast('Email verification failed');
                }
            } catch (error) {
                console.error('Error:', error);
                errorToast('Email verification failed');
                hideLoader();
            }

        }
    }
</script>

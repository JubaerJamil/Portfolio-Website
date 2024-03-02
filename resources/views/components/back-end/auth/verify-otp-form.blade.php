<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 m-3 border-radius-lg" style="background-image: url('https://images.unsplash.com/photo-1556290160-d006087340ac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="container mb-4">
      <div class="row mt-lg-n12 mt-md-n12 mt-n12 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card mt-8">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-warning shadow-warning border-radius-lg py-3 pe-1 text-center py-4">
                <h3 class="font-weight-bolder text-white mb-0">Input OTP </h3>
              </div>
            </div>
            <div class="card-body py-4">
              <form role="form">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">OTP</label>
                    <input id="otp" type="text" class="form-control">
                  </div>
                {{-- <div class="row gx-2 gx-sm-3 mt-3 mb-3">
                  <div class="input-group mb-3">
                    <input id="otp" type="text" placeholder="Code" class="form-control">
                  </div>
                </div> --}}
              </form>
              <div class="text-center">
                <button onclick="verifyotp()" type="button" class="btn bg-gradient-dark w-100">Verify OTP</button>
                <span class="text-muted text-sm">Haven't received it?<a href="javascript:;"> Resend a new code</a>.</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<script>
    async function verifyotp() {
        let otp = document.getElementById('otp').value;

        // Validate OTP
        if (otp.length !== 4) {
            errorToast('Invalid OTP Code');
        } else {

            try {
                showLoader();
                let res = await axios.post('/verify-otp', {
                    otp: otp,
                    email: sessionStorage.getItem('email')
                });

                if (res.status === 200 && res.data['status'] === 'OTP Verification Success') {
                    successToast('Verification successful');
                    sessionStorage.clear();
                        window.location.href = '/password-reset';
                } else {
                    errorToast('Verification failed');
                }
            } catch (error) {
                console.error('Error:', error);
                errorToast('An error occurred during OTP verification');
                hideLoader();
            }
        }
    }
</script>


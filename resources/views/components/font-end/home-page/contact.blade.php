<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Contact</h2>
            <p>If you have any questions, feedback, or inquiries, don't hesitate to reach out to us. We're here to
                assist you in any way we can.
                Whether you have a query about our services, want to collaborate with us, or just want to drop us a
                line,
                we'd love to hear from you.</p>
        </div>

        <div class="row" data-aos="fade-in">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Dhaka, Bangladesh</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>md.jamil1952@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p>+880 1516105208</p>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d894610.5007744925!2d89.90080350865244!3d23.672943856664503!2m
            3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v17056912472
            20!5m2!1sen!2sbd"
                        width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form id="contactForm" role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Your Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea class="form-control" name="message" rows="10" id="message"></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class=""><button type="submit">Submit</button></div>
                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->


<script>
    let contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit', async function(event) {
        event.preventDefault();

        let name = document.getElementById('name').value;
        let phone = document.getElementById('phone').value;
        let email = document.getElementById('email').value;
        let message = document.getElementById('message').value;

        if (name.length === 0) {
            alert('Please enter a name');
        } else if (phone.length === 0) {
            alert('Please enter a phone number');
        } else if (email.length === 0) {
            alert('Please enter an email');
        } else {
            try {
                showLoader();

                let response = await fetch('/contact-message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        full_name: name,
                        phone_number: phone,
                        email: email,
                        message: message
                    })
                });

                let responseData = await response.json();

                hideLoader();

                if (response.ok && responseData.status === 'success') {
                    successToast('Thanks for your message. We will contact you very soon!');
                    // alert('Thanks for your message. We will contact you very soon!');
                    contactForm.reset();
                } else {
                    errorToast('Something went wrong');
                    // alert('Something went wrong');
                }
            } catch (error) {
                console.error('Error:', error);
                errorToast('Something went wrong');
                // alert('Something went wrong');
            }
        }
    });
</script>

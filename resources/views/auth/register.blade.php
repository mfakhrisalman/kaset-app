<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

@include('partials.head')

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page sign-up">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <div class="login-box">
                        <div>
                            <h3>Create your account</h3>
                            <div class="body-text">Enter your personal details to create account</div>
                        </div>
                        <form id="registerForm" action="{{ route('register.store') }}" method="post" class="form-login flex flex-column gap24">
                            @csrf
                            <fieldset class="name">
                                <div class="body-title mb-10">Your Name <span class="tf-color-1">*</span></div>
                                <div class="flex gap10">
                                    <input class="flex-grow" type="text" placeholder="Enter your name" name="name" tabindex="0" value="" aria-required="true" required>
                                </div>
                            </fieldset>
                            <fieldset class="email">
                                <div class="body-title mb-10">Email address <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="email" placeholder="Enter your email address" name="email" tabindex="0" value="" aria-required="true" required>
                            </fieldset>                            
                            <fieldset class="name">
                                <div class="body-title mb-10">Phone Number<span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Enter your phone number" name="nohp" tabindex="0" value="" aria-required="true" required>
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                                <input id="password" class="password-input" type="password" placeholder="Enter your password" name="password" tabindex="0" value="" aria-required="true" required>
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Confirm password <span class="tf-color-1">*</span></div>
                                <input id="confirmPassword" class="password-input" type="password" placeholder="Confirm your password" name="confirmPassword" tabindex="0" value="" aria-required="true" required>
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <input type="hidden" name="is_pelanggan" value="1">
                            <div class="flex justify-between items-center">
                                <div class="flex gap10">
                                    <input class="" type="checkbox" id="signed" required>
                                    <label class="body-text" for="signed">Agree with Privacy Policy</label>
                                </div>
                            </div>
                            <button id="submitButton" class="tf-button w-full" type="submit">Register</button>
                        </form>
                        <div class="body-text text-center">
                            You have an account?
                            <a href="/login" class="body-text tf-color">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="text-tiny">Copyright © 2024, All rights reserved.</div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    @include('partials.javascript')

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            if (password !== confirmPassword) {
                alert('Passwords do not match.');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>

</body>

</html>

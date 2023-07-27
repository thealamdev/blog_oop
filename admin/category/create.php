<?php

// include_once('../../lib/Session.php');
include('../components/header.php');
include('../components/sidebar.php');

 ?>


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Validation type</h4>
        <p class="card-title-desc">Parsley is a javascript form validation
            library. It helps you provide your users with feedback on their form
            submission before sending it to your server.</p>

        <form class="custom-validation" action="#" novalidate="">
            <div class="mb-3">
                <label class="form-label">Required</label>
                <input type="text" class="form-control" required="" placeholder="Type something">
            </div>

            <div class="mb-3">
                <label class="form-label">Equal To</label>
                <div>
                    <input type="password" id="pass2" class="form-control" required="" placeholder="Password">
                </div>
                <div class="mt-2">
                    <input type="password" class="form-control" required="" data-parsley-equalto="#pass2"
                        placeholder="Re-Type Password">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">E-Mail</label>
                <div>
                    <input type="email" class="form-control" required="" parsley-type="email"
                        placeholder="Enter a valid e-mail">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">URL</label>
                <div>
                    <input parsley-type="url" type="url" class="form-control" required="" placeholder="URL">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Digits</label>
                <div>
                    <input data-parsley-type="digits" type="text" class="form-control" required=""
                        placeholder="Enter only digits">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Number</label>
                <div>
                    <input data-parsley-type="number" type="text" class="form-control" required=""
                        placeholder="Enter only numbers">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Alphanumeric</label>
                <div>
                    <input data-parsley-type="alphanum" type="text" class="form-control" required=""
                        placeholder="Enter alphanumeric value">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Textarea</label>
                <div>
                    <textarea required="" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect">
                        Cancel
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>


<?php
 include_once('../components/footer.php');
 ?>
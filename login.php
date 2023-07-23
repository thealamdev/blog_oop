<?php

include_once('Controllers/Register.php');
$register = new Register();
if(isset($_POST['register'])){
    $users = $register->addUser($_POST);
}
 



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>




    <div class="row d-flex align-items-center" style="margin-top: 100px;">


        <div class="col-lg-5 m-auto">
            <?php if(isset($users)){ ?>
             
            <div class="alert alert-primary" role="alert">
                <?=$users?>
            </div>
            <?php   
           } ?>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Login</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane"
                        aria-selected="false">Registration</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="card">





                        <div class="card-body">
                            <form action=" " method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                <a href="#" class="float-end">Forget password ?</a>
                            </form>
                        </div>

                        <div class="card-footer">
                            <a href="#" class="btn btn-info">Send Mail</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="card">


                        <div class="card-body">
                            <form action=" " method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control">

                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control">

                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="c_pass" class="form-label">Confirm Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="c_pass" class="form-control">
                                </div>

                                <button type="submit" name="register" class="btn btn-primary">Register</button>
                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
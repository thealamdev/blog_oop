  <?php
    include_once '../components/header.php';
    include_once '../components/sidebar.php';
    include_file('Category.php', array(__DIR__ . '/admin/AdminControllers'));
    $ct = new Category();
    if(isset($_POST['submit'])){
        $category = $ct->store($_POST);
    }
      
    ?>

  <div class="card">
      <div class="card-header">
          <h4>Category Add</h4>
      </div>
      <div class="card-body">

          <div class="col-lg-4">
              <form class="custom-validation" action="#" method="POST">
                  <div class="mb-3">
                      <label class="form-label">Category Name</label>
                      <input type="text" name="category_name" class="form-control" placeholder="Type something">
                      <p class="text-danger">
                        <?php 
                      if(isset($category)){
                        echo $category;
                      }
                      ?></p>
                  </div>

                  <div>
                      <div>
                          <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light me-1">
                              Submit
                          </button>

                      </div>
                  </div>
              </form>
          </div>


      </div>
  </div>

  <?php
    include_file('footer.php', array(__DIR__ . '/admin/components'));
    ?>
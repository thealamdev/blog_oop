  <?php
    include_once '../components/header.php';
    include_once '../components/sidebar.php';
    include_file('Category.php', array(__DIR__ . '/admin/AdminControllers'));
    $category = new Category();
     print_r($category->store($_POST));
    ?>

  <div class="card">
      <div class="card-body">
          <h4 class="card-title">Category Add</h4>


          <div class="col-lg-4">
              <form class="custom-validation" action="#" method="POST">
                  <div class="mb-3">
                      <label class="form-label">Category Name</label>
                      <input type="text" name="category_name" class="form-control" required="" placeholder="Type something">
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
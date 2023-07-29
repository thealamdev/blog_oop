<?php
    include_once '../components/header.php';
    include_once '../components/sidebar.php';
    include_file('Category.php', array(__DIR__ . '/admin/AdminControllers'));
    $ct = new Category();
    $categories = $ct->show();

    ?>


<div class="card">
    <div class="card-header">
        <h4>All Category</h4>
    </div>
    <div class="card-body">

        <div class="row">

            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php foreach($categories as $category){?>
                        <tr>
                            <td><?=$category['id']?></td>
                            <td><?=$category['name']?></td>
                            <?php $date = strtotime($category['created_at']) ?>
                            <td><?=date('y-m-d',$date) ?></td>
                            <td>
                                <a href="<?=$base. 'admin/AdminControllers/Category.php?id='.base64_encode($category['id'])?>" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>





    </div>
</div>

<?php
    include_file('footer.php', array(__DIR__ . '/admin/components'));
    ?>
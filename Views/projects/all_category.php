
<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        Categories
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center" id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#categoriesModal" id="btnAddTask">Add New Category</button>
            </span>
        </h1>

    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">All categories</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col">
        <!-- Card -->
        <div class="card border-0 flex-fill w-100" id="users">
            <div class="card-header border-0 card-header-space-between">

                <!-- Title -->
                <h2 class="card-header-title h4 text-uppercase">
                    Categories
                </h2>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-middle table-edge table-hover table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th> # </th>
                            <th> Name category </th>
                            <th> Description </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td class="id"><?= $category->id ?></td>
                                <td class="id"><?= $category->name ?></td>
                                <td class="email"><?= substr($category->description, 0 , 80) . ' ...' ?></td>
                                <td class="date" data-signed="1627858800">
                                    <a class="p-3" href="/projects/edit_category/<?= $category->id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="p-3" href=""data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>           
        </div>
    </div>
</div>

<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="/projects/create_category" method="POST">
                <!-- Header -->
                <div class="modal-header pb-0">
                    <h3 id="taskModalTitle" class="modal-title">Create New Category</h3>

                    <!-- Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">Please add a  name</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" required name="description" rows="5"></textarea>
                        <div class="invalid-feedback">Please add a  description</div>
                    </div>
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer pt-0">
                    <div class="d-flex justify-content-end mt-5">
                        <!-- Button -->
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    </div>

                    <div class="d-flex justify-content-end mt-5">
                        <!-- Button -->
                        <button type="submit" class="btn btn-primary">Save category</button>
                    </div>
                    
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-7" id="exampleModalToggleLabel">Delete the category <?= $category->name ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body my-3">
        <span>you are about to delete the category <?= $category->name ?> this may lead to the deletion of projects linked to this category.</span><br>
        <span>what do you want to do?</span>
      </div>
      <div class="modal-footer pt-0">
        <div class="row mb-4 py-3">
            <div class="col-lg-4">
                <div class="d-flex justify-content-end my-5">
                    <!-- Button -->
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-content-end my-5">
                    <!-- Button -->
                    <a href="/projects/delete_category/<?= $material->id?>" class="btn btn-danger">Deleted everything</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-content-end my-5">
                    <button class="btn btn-primary" data-bs-target="#staticBackdrop2" data-bs-toggle="modal">Assign to another</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade"id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Delete the category <?= $category->name ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="needs-validation" novalidate action="/projects/change_category/<?= $category->id ?>" method="POST">
        <div class="modal-body">
            <span>assign projects related to this category to another.</span><br><br>
            <div class="row">
                <div class="col-lg-6">
                    <label for="category" class="col-form-label">New category for these projects</label>
                </div>
                <div class="col-lg-6">
                    <select class="form-select" id="category" name="new_category" required>
                        <option > </option>
                        <?php foreach ($categories as $categ) : ?>
                            <option value="<?=$categ->id ?>" ><?= $categ->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">Please select a  category</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="d-flex justify-content-end mt-5">
                <!-- Button -->
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <!-- Button -->
                <button type="submit" class="btn btn-primary">change category</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

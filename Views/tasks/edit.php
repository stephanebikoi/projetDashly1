<div class="d-flex align-items-baseline justify-content-between">
    <!-- Title -->
    <h1 class="h2">
        Edit task
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">tasks</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit task</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-4 col-xxl-3">

        <!-- Card -->
        <div class="card border-0 sticky-md-top top-10px">
            <div class="card-body">
                
                <hr class="mb-0">
            </div>

            <ul class="scrollspy mb-5" id="account" data-scrollspy='{"offset": "30"}'>
                <li class="active">
                    <a href="#basicInformationSection" class="d-flex align-items-center py-3">
                        <svg viewBox="0 0 24 24" height="14" width="14" class="me-3" xmlns="http://www.w3.org/2000/svg"><path d="M6.750 6.000 A5.250 5.250 0 1 0 17.250 6.000 A5.250 5.250 0 1 0 6.750 6.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M2.25,23.25a9.75,9.75,0,0,1,19.5,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                        Basic information
                    </a>
                </li>
                
                <li>
                    <a href="#durationSection" class="d-flex align-items-center py-3">
                        <i class="fa fa-calendar me-3" aria-hidden="true"></i>
                        Duration
                    </a>
                </li>
                                
                <li>
                    <a href="#additionalSection" class="d-flex align-items-center py-3">
                        <i class="fa fa-plus-circle me-3" aria-hidden="true"></i>
                        Additional information
                    </a>
                </li>
                
            </ul>

        </div>
    </div>

    <div class="col">
        <form action="/tasks/save_edit/<?= $task->id ?> " method="POST" id="form" enctype="multipart/form-data">

            <!-- Card -->
            <div class="card border-0 scroll-mt-3" id="basicInformationSection">
                <div class="card-header">
                    <h2 class="h3 mb-0">Basic information</h2>
                </div>

                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="priority" class="col-form-label">Priority</label>
                        </div>

                        <div class="col-lg">
                            
                            <select class="form-select" id="priority" name="priority" required>
                                <option value="<?= $task->priority ?>"> <?= $task->priority ?></option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="assign" class="col-form-label">Assign to</label>
                        </div>

                        <div class="col-lg">
                            
                            <select class="form-select" id="assign" name="assign" required>
                                <?php
                                    $staffModel = new App\Models\StaffsModel;
                                    $onstaff = $staffModel->find( $task->executor);

                                ?>
                                <option  value="<?=$onstaff->id ?>" ><?= $onstaff->firstname . ' ' . $onstaff->lastname ?></option>
                                <?php foreach ($staffs as $staf) : ?>
                                    <option value="<?=$staf->id ?>" ><?= $staf->firstname . ' ' . $staf->lastname ?></option>
                                <?php endforeach ?>
                            </select>
                            
                        </div>
                    </div> <!-- / .row -->

                </div>
            </div>

            <div class="card border-0 scroll-mt-3" id="durationSection">
                <div class="card-header">
                    <h2 class="h3 mb-0">duration</h2>
                </div>

                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="start" class="col-form-label">Start of the task</label>
                        </div>

                        <div class="col-lg">
                            <input type="date" class="form-control" id="start" value="<?= $task->start ?>" name="start" required>
                            <div class="invalid-feedback">Please add date start </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="timestart" class="col-form-label">Time start of the task</label>
                        </div>

                        <div class="col-lg">
                            <input type="time" class="form-control" id="timestart" value="<?= $task->timeStart ?>" name="timestart" required>
                            <div class="invalid-feedback">Please add the time start </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="end" class="col-form-label">End of the task</label>
                        </div>

                        <div class="col-lg">
                            <input type="date" class="form-control" id="end" value="<?= $task->end ?>" name="end" required>
                            <div class="invalid-feedback">Please add the date end </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="timeend" class="col-form-label">Time end of the task</label>
                        </div>

                        <div class="col-lg">
                            <input type="time" class="form-control" id="timeend" value="<?= $task->timeEnd ?>" name="timeend" required>
                            <div class="invalid-feedback">Please add the time end </div>
                        </div>
                    </div> <!-- / .row -->

                </div>
            </div>

            <!-- Card -->
            <div class="card border-0 scroll-mt-3" id="additionalSection">
                <div class="card-header">
                    <h2 class="h3 mb-0">additional information</h2>
                </div>

                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="attachement" class="col-form-label">Attachement</label>
                        </div>

                        <div class="col-lg">
                            <input type="file" class="form-control" id="attachement" name="attachement">
                        </div>
                       
                    </div> <!-- / .row -->

                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <!-- Button -->
                <button type="submit" class="btn btn-primary">Save task</button>
            </div>
            <br><br><br>
        </form>
    </div>
</div>


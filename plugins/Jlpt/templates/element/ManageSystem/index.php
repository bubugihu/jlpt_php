<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
        <div class="form-title mx-3">
            <?= __("List Customers") ?>
        </div>
        <div class="card m-3 rounded-0">
            <div class="card-header p-1">
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="btn btn-success rounded-0" href="/manage-system/create" id="btn-add-form">
                                        <i class="fa-solid fa-plus"></i>
                                        <?= __("New") ?>
                                    </a>
                                </li>

                                <li class="nav-item px-1">
                                    <a id="exportExcelBtn" class="btn btn-outline-secondary rounded-0" href="/jlpt/manage-system/export">
                                        <i class="fa-solid fa-file-export"></i>
                                        <?= __("Export EXCEL") ?>
                                    </a>
                                </li>
                                <li class="nav-item px-1">
                                    <label class="btn btn-outline-secondary rounded-0" for="importCustomers">
                                        <i class="fa-solid fa-plus"></i>
                                        <?= __('Import EXCEL') ?>
                                    </label>
                                    <?= $this->Form->create(null, [
                                        'url' => '/jlpt/manage-system/import',
                                        'method' => 'post',
                                        'id' => 'uploadFile',
                                        'class' => ['d-none'],
                                        'enctype' => 'multipart/form-data'
                                    ]); ?>
                                    <input type="file" id="importCustomers" name="file_import">
                                    <?= $this->Form->end(); ?>
                                </li>

                                <li class="nav-item px-1">
                                    <label class="btn btn-outline-secondary rounded-0" for="updateCustomers">
                                        <i class="fa-solid fa-plus"></i>
                                        <?= __('Update EXCEL') ?>
                                    </label>
                                    <?= $this->Form->create(null, [
                                        'url' => '/jlpt/manage-system/updateUniversity',
                                        'method' => 'post',
                                        'id' => 'updateFile',
                                        'class' => ['d-none'],
                                        'enctype' => 'multipart/form-data'
                                    ]); ?>
                                    <input type="file" id="updateCustomers" name="file_import">
                                    <?= $this->Form->end(); ?>
                                </li>

                        </ul>

                        <div class="nav-end">
                            <div class="nav-end">
                                <form class="form-filter" action="/jlpt/manage-system/" method="get">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <select name="key_write" class="form-select" id="key_write" >
                                                <option value="" >Write ALL</option>
                                                <option value="0" <?= (isset($_GET['key_write']) && $_GET['key_write'] == "0") ? "selected" : "" ?> >Write Not yet</option>
                                                <option value="1" <?= (isset($_GET['key_write']) && $_GET['key_write'] == "1") ? "selected" : "" ?> >Write Done</option>
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <select name="key_payment" class="form-select" id="key_payment" >
                                                <option value="" >Payment ALL</option>
                                                <option value="0" <?= (isset($_GET['key_payment']) && $_GET['key_payment'] == "0") ? "selected" : "" ?> >Payment Not yet</option>
                                                <option value="1" <?= (isset($_GET['key_payment']) && $_GET['key_payment'] == "1") ? "selected" : "" ?> >Payment Done</option>
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <select name="key_picture" class="form-select" id="key_picture" >
                                                <option value="" >Picture ALL</option>
                                                <option value="0" <?= (isset($_GET['key_picture']) && $_GET['key_picture'] == "0") ? "selected" : "" ?> >Picture Not yet</option>
                                                <option value="1" <?= (isset($_GET['key_picture']) && $_GET['key_picture'] == "1") ? "selected" : "" ?> >Picture Done</option>
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <select name="key_exam" class="form-select" id="key_exam" >
                                                <option value="" >Picture ALL</option>
                                                <option value="2024/07" <?= (isset($_GET['key_exam']) && $_GET['key_exam'] == "2024/07") ? "selected" : "" ?> >2024/07</option>
                                                <option value="2024/12" <?= (isset($_GET['key_exam']) && $_GET['key_exam'] == "2024/12") ? "selected" : "" ?> >2024/12</option>
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <div class="bb-search">
                                                <i class="fa fa-search"></i>
                                                <input type="text" class="form-control" placeholder="<?= __("type") ?> ..." name="key_search" value="<?= isset($key_search) ? $key_search : ''; ?>" />
                                                <button class="btn btn-primary" type="submit"><?= __("Search") ?></button>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>

                    </div>
                </nav>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" style="background-color: #c5c5c5;">
                        <div class="table-responsive">
                            <div class="css-table action-dropdown">
                                <div class="css-table-header">
                                    <div style="width: 2%"><br><?= __("Action") ?></div>
                                    <div style="width: 5%"><br><?= __("Write") ?></div>
                                    <div style="width: 5%"><br><?= __("Payment") ?></div>
                                    <div style="width: 5%"><br><?= __("Picture") ?></div>
                                    <div style="width: 5%"><br><?= __("Code") ?></div>
                                    <div style="width: 25%"><br><?= __("Full Name") ?></div>
                                    <div style="width: 5%"><br><?= __("BirthDay") ?></div>
                                    <div style="width: 5%"><br><?= __("Gender") ?></div>
                                    <div style="width: 10%"><br><?= __("CCCD") ?></div>
                                    <div style="width: 7%"><br><?= __("Phone") ?></div>
                                    <div style="width: 5%"><br><?= __("Level") ?></div>
                                    <div style="width: 5%"><br><?= __("From") ?></div>
                                    <div style="width: 5%"><br><?= __("Exam") ?></div>
                                </div>

                                <?php if (!empty($list_customers)) : ?>
                                    <div class="css-table-body">
                                        <?php foreach ($list_customers as $key => $value) : ?>
                                            <div class="css-table-row-input table-striped">
                                                <div class="action-col">
                                                    <div class="d-flex justify-content-center">
                                                            <a href="/jlpt/manage-system/view/<?= $value->id . $this->Format->renderParameterURL() ?>" class="view" title="View">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        <a href="/jlpt/manage-system/delete/<?= $value->id . $this->Format->renderParameterURL() ?>" onclick="return confirm('Are you sure?');" class="delete" title="View">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                                <div>
                                                    <?= $value->is_write_display ?? '' ?>
                                                </div>
                                                <div>
                                                    <?= $value->is_payment_display ?? '' ?>
                                                </div>
                                                <div>
                                                    <?= $value->is_picture_display ?? '' ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->code ?? '') ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->full_name_display ?? '') ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->birthday_display ?? '') ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->gender_display ?? '') ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->cccd ?? '') ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->phone ?? '') ?>
                                                </div>
                                                <div>
                                                    <?= strtoupper(htmlspecialchars($value->level ?? '')) ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->where_from ?? '') ?>
                                                </div>
                                                <div>
                                                    <?= htmlspecialchars($value->exam ?? '') ?>
                                                </div>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="caption-footer">
                                        No Data Available
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-bottom">
                <div class="d-flex flex-row justify-content-between align-items-center px-4 py-0">
                    <?php echo (isset($paginate)) ? $paginate : ''; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#importCustomers').on("change", function () {
            $('#uploadFile').submit();
        });
        $('#updateCustomers').on("change", function () {
            $('#updateFile').submit();
        });
    })

</script>

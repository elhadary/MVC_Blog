
    <!-- Dynamic Table Responsive -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                All Users
            </h3>
        </div>


        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            {{alert}}
            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">ID</th>
                    <th>Email</th>
                    <th class="d-none d-sm-table-cell" data-searchable="false" style="width: 15%;">Rank</th>
                    <th data-orderable="false" data-searchable="false">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) {?>
                <tr>
                    <td class="text-center"><?= $user['id'] ?></td>
                    <td class="fw-semibold"><?= $user['email'] ?></td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge bg-<?= $user['rank'] == 1 ? 'success' : 'primary' ?>"><?= $user['rank'] == 1 ? 'Admin' : 'User' ?></span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info "><i class="fa-solid fa-pen"></i> Edit</button>
                        <?= $user['rank'] == 1 ? '<button type="button" class="btn btn-sm btn-warning"><i class="fa-solid fa-caret-down"></i> Demote to user</button>' : '<button type="button" class="btn btn-sm btn-success"> <i class="fa fa-fw fa-star me-1"></i>Promote to Admin</button>' ?>
                        <a href="/dashboard/DeleteUser?id=<?=$user['id']?>"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-times me-1"></i> Delete</button></a>
                    </td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Dynamic Table Responsive -->

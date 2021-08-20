<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Detail Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tbody>
                    <tr>
                        <td scope="row">Name Role</td>
                        <td>:</td>
                        <td>{{ $name_role }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Created at</td>
                        <td>:</td>
                        <td>{{ $created_at }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Updated at</td>
                        <td>:</td>
                        <td>{{ $updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
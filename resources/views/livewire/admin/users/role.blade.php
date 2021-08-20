<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-sm-12">
            {{ alertbs_form() }}
            <div class="clearfix"></div>
            @include('livewire.admin.helpers.tables.search-bootstrap',[
                    'arraySearch'   => $arraySearch,
                    'url'           => 'users/role',
                    'action'        => 'active',
                    'modal_active'  => 'active',
                    'url_create'    => '',
                    'html_button'   => '',
                    'name_active'   => 'Roles',
                    'view_modal_create' => 'livewire.admin.users.role.create-modal'
                ])
            <div class="clearfix"></div>
            @include('livewire.admin.helpers.tables.tables-bootstrap',[
                    'tables'        => $tables,
                    'url'           => 'users/role',
                    'arrayColumn'   => $arrayColumn,
                    'action'        => 'active',
                    'modal_active'  => 'active',
                    'view_modal_detail' => 'livewire.admin.users.role.detail-modal',
                    'view_modal_update' => 'livewire.admin.users.role.update-modal'
                ])

        </div>
    </div>
</div>

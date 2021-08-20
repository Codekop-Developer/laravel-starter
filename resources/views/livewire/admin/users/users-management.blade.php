<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-sm-12">
            {{ alertbs_form() }}
            <div class="clearfix"></div>
            @include('livewire.admin.helpers.tables.search-bootstrap',[
                    'arraySearch'       => $arraySearch,
                    'url'               => 'users',
                    'action'            => 'active',
                    'modal_active'      => 'active',
                    'url_create'        => 'users/create',
                    'html_button'       => '',
                    'name_active'       => 'Users',
                    'view_modal_create' => 'livewire.admin.users.management.create-modal'
                ])
            <div class="clearfix"></div>
            {{-- do you can custom tables with tables custom --}}
            @include('livewire.admin.helpers.tables.tables-custom',[
                    'tables'            => $tables,
                    'url'               => 'users/management',
                    'arrayColumn'       => $arrayColumn,
                    'loc_view'          => 'livewire.admin.users.management.tables',
                    'action'            => 'active',
                    'view_modal_detail' => '',
                    'view_modal_update' => ''
                ])
        </div>
    </div>
    @include('livewire.admin.helpers.modals.update',[
        'view_modal_update' => 'livewire.admin.users.management.update-modal'
    ])
    @include('livewire.admin.helpers.modals.detail',[
        'view_modal_detail' => 'livewire.admin.users.management.detail-modal'
    ])
    @include('livewire.admin.helpers.modals.delete')
</div>
<div>
    <div class="row py-lg-2">
            <a href="/roles/create" class="btn btn-outline-success btn-rounded  float-md-right" data-toggle="modal" data-target="#add" aria-pressed="true">{{__('messages.btn.add')}}</a>
    </div>
    @include('livewire.admin.roles.add')
    @if ($info)
        @include('livewire.admin.roles.show')
    @endif

    @if($form['id'])
        @include('livewire.admin.roles.edit')
    @endif

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>{{__('messages.form.role')}}</th>
                <th>{{__('messages.form.slug')}}</th>
                <th>{{__('messages.form.permission')}}</th>
                <th>{{__('messages.form.tools')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role['name'] }}</td>
                        <td>{{ $role['slug'] }}</td>
                        <td>
                            @if ($role->permissions != null)

                                @foreach ($role->permissions as $permission)
                                <span class="badge badge-secondary btn-rounded">
                                    {{ $permission->name }}
                                </span>
                                @endforeach

                            @endif
                        </td>
                        <td>
                            <div class="popover-icon">
                                <button class="btn btn-success rounded-circle btn-circle font-12"
                                     title="{{__('messages.btn.info')}}" data-toggle="modal" data-target="#info" aria-pressed="true" wire:click="show({{$role['id']}})"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning rounded-circle btn-circle font-12 popover-item"
                                    title="{{__('messages.btn.edit')}}" data-toggle="modal" data-target="#edit" aria-pressed="true" wire:click="edit({{$role['id']}})"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger rounded-circle btn-circle font-12 popover-item" title="{{__('messages.btn.delete')}}"
                                    wire:click="delete({{$role['id']}})"><i class="fas fa-trash-alt"></i></button>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
</div>

@section('js')
    <script>

        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);

            });
        });

        window.addEventListener('roleAdded', event =>{
            $('#add').modal('hide');

            toastr.succes('{{__('messages.alert.add')}}', '{{__('messages.sidebar.role')}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('roleUpdated', event =>{
            $('#edit').modal('hide');

            toastr.succes('{{__('messages.alert.edit')}}', '{{__('messages.sidebar.role')}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('roleDeleted', event =>{
            toastr.warning('{{__('messages.alert.delete')}}', '{{__('messages.sidebar.role')}}', {positionClass: 'toast-bottom-right'});
        })

    </script>

@endsection

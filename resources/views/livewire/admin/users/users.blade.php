<div>


    @if ($etat === 'add')
        @include('livewire.admin.users.add')
    @elseif ($etat === 'show')
        @include('livewire.admin.users.show')
    @else
        <div class="row py-lg-2">
                <button class="btn btn-outline-success btn-rounded  float-md-right" wire:click.prevent="addNew" aria-pressed="true">{{__('messages.btn.add')}}</button>
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{__('messages.form.name')}} & {{__('messages.form.surname')}}</th>
                        <th>{{__('messages.form.username')}}</th>
                        <th>{{__('messages.form.role')}}</th>
                        <th>{{__('messages.form.permission')}}</th>
                        <th>{{__('messages.form.tools')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex no-block align-items-center">
                                        <div class="mr-3"><img
                                                src="storage/images/{{ $user['photo'] }}"
                                                alt="user" class="rounded-circle" width="45"
                                                height="45" /></div>
                                        <div class="">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">{{ $user['prenom'] }}
                                                {{ $user['nom'] }}
                                            </h5>
                                            <span class="text-muted font-14">{{ $user['email'] }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user['username'] }}</td>
                                <td>
                                    @if ($user->roles != null)

                                        @foreach ($user->roles as $role)
                                        <span class="badge badge-primary btn-rounded">
                                            {{ $role->name }}
                                        </span>
                                        @endforeach

                                    @endif
                                </td>
                                <td>
                                    @if ($user->permissions != null)

                                        @foreach ($user->permissions as $permission)
                                        <span class="badge badge-secondary btn-rounded">
                                            {{ $permission->name }}
                                        </span>
                                        @endforeach

                                    @endif
                                </td>
                                <td>
                                    <div class="popover-icon">
                                        <button class="btn btn-success rounded-circle btn-circle font-12"
                                            data-toggle="modal" data-target="#info" aria-pressed="true" title="{{__('messages.btn.info')}}" wire:click.prevent="show({{$user->id}})"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning rounded-circle btn-circle font-12 popover-item"
                                            data-toggle="modal" data-target="#edit" aria-pressed="true" title="{{__('messages.btn.edit')}}"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger rounded-circle btn-circle font-12 popover-item"  title="{{__('messages.btn.delete')}}"><i class="fas fa-trash-alt"></i></button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    @endif
</div>

@section('js')
    <script>

        window.addEventListener('userAdded', event =>{
            toastr.succes('{{__('messages.alert.add')}}', '{{__('messages.sidebar.users')}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('userUpdated', event =>{
            toastr.succes('{{__('messages.alert.edit')}}', '{{__('messages.sidebar.users')}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('userDeleted', event =>{
            toastr.warning('{{__('messages.alert.delete')}}', '{{__('messages.sidebar.users')}}', {positionClass: 'toast-bottom-right'});
        })

         window.addEventListener('noPermissions', event =>{
            toastr.error('{{__('messages.alert.permission')}}', '{{__('messages.form.permission')}}', {positionClass: 'toast-top-right'});
        })

    </script>

@endsection

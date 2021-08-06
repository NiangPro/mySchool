<div>
    @if ($etat === "edit")
        @include('livewire.admin.salles.edit')
    @else
        <div class="row py-lg-2">
                <button  class="btn btn-success btn-rounded  float-md-right" data-toggle="modal" data-target="#add" aria-pressed="true">{{__('messages.btn.add')}}</button>
        </div>
        @include('livewire.admin.salles.add')


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{__('messages.form.name')}}</th>
                        <th>{{__('messages.form.capacity')}}</th>
                        <th>{{__('messages.form.tools')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <td>{{ $classroom['name'] }}</td>
                                <td>{{ $classroom['capacity'] }}</td>
                                <td>
                                    <div class="popover-icon">
                                        <button class="btn btn-warning rounded-circle btn-circle font-12 popover-item"
                                            title="{{__('messages.btn.edit')}}" wire:click="edit({{$classroom['id']}})" ><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger rounded-circle btn-circle font-12 popover-item" title="{{__('messages.btn.delete')}}"><i class="fas fa-trash-alt"></i></button>

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
        window.addEventListener('classroomAdded', event =>{
            $('#add').modal('hide');

            toastr.success('Mis à jour avec succès!', 'Paramètres', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('classroomUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.setting")}}', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection

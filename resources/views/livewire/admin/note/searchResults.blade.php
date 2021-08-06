 <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('messages.form.surname')}} & {{__('messages.form.name')}}</th>
                                <th>{{__('messages.sidebar.subject')}}</th>
                                <th>{{__('messages.sidebar.rating')}}</th>
                                <th>{{__('messages.sidebar.appreciation')}}</th>
                                <th>{{__('messages.sidebar.period')}}</th>
                                <th>{{__('messages.sidebar.class')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>
                                        <div class="d-flex no-block align-items-center">
                                            <div class="mr-3"><img
                                                    src="storage/images/{{ $note->student['photo'] }}"
                                                    alt="user" class="rounded-circle" width="45"
                                                    height="45" /></div>
                                            <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">{{ $note->student['prenom'] }}
                                                    {{ $note->student['nom'] }}
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $note->matiere->name }}</td>
                                    <td><span class="@if ($note->valeur < 10)text-danger @else text-success @endif"> {{ $note->valeur }}</span> /<strong>20</strong> </td>
                                    <td>
                                    {{ $note->appreciation }}
                                    </td>
                                    <td>
                                    {{ $note->period->value }}
                                    </td>
                                    <td>
                                    {{ $note->classe->name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</div>

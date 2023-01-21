<div class="table-responsive">
    <table class="table" id="asignaCarreras-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Email </th>
                <th>Usuario </th>
                <th>Carrera </th>
                <th>Observaciones</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($asignaCarreras as $asignaCarrera)
            <tr>
             <td>{{ $loop->iteration }}</td>
             <td>{{ $asignaCarrera->email }}</td>
             <td>{{ $asignaCarrera->name }}</td>
             <td>{{ $asignaCarrera->car_nombre }}</td>
             <td>{{ $asignaCarrera->asc_observaciones }}</td>
             <td class=" text-center">
                 {!! Form::open(['route' => ['asignaCarreras.destroy', $asignaCarrera->asc_id], 'method' => 'delete']) !!}
                 <div class='btn-group'>
                     <a href="{!! route('asignaCarreras.edit', [$asignaCarrera->asc_id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                     {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                 </div>
                 {!! Form::close() !!}
             </td>
         </tr>
         @endforeach
        </tbody>
    </table>
</div>

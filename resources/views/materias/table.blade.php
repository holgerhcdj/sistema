<div class="table-responsive">
    <table class="table" id="materias-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripcion</th>
                <th>Area</th>
                <th>Estado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($materias as $materias)
            <tr>
             <td>{{ $loop->iteration }}</td>
             <td>{{ $materias->mat_descripcion }}</td>
             <td>{{ $materias->mat_area }}</td>
             <td>{{ $materias->mat_estado==0?'INACTIVO':'ACTIVO' }}</td>
             <td class=" text-center">
                 {!! Form::open(['route' => ['materias.destroy', $materias->mat_id], 'method' => 'delete']) !!}
                 <div class='btn-group'>
                     <a href="{!! route('materias.edit', [$materias->mat_id]) !!}" class='btn btn-info action-btn edit-btn'><i class="fa fa-edit"></i></a>
                     {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                 </div>
                 {!! Form::close() !!}
             </td>
         </tr>
         @endforeach
        </tbody>
    </table>
</div>

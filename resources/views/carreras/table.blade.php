<div class="table-responsive">
    <table class="table" id="carreras-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Siglas</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carreras as $carreras)
            <tr>
                <td>{{ $loop->iteration }}</td>
             <td>{{ $carreras->car_siglas }}</td>
             <td>{{ $carreras->car_nombre }}</td>
             <td>{{ $carreras->car_estado==0?'INACTIVO':'ACTIVO' }}</td>
             <td class=" text-center">
                 {!! Form::open(['route' => ['carreras.destroy', $carreras->car_id], 'method' => 'delete']) !!}
                 <div class='btn-group'>
                     <a href="{!! route('carreras.edit', [$carreras->car_id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                     {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                 </div>
                 {!! Form::close() !!}
             </td>
         </tr>
         @endforeach
        </tbody>
    </table>
</div>

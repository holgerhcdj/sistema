<div class="table-responsive">
    <table class="table" id="cursos-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Siglas</th>
                <th>Descripcion</th>
                <th>Numero</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursos as $cursos)
            <tr>
                <td>{{ $loop->iteration }}</td>
             <td>{{ $cursos->cur_siglas }}</td>
             <td>{{ $cursos->cur_descripcion }}</td>
             <td>{{ $cursos->cur_numero }}</td>
             <td class=" text-center">
                 {!! Form::open(['route' => ['cursos.destroy', $cursos->cur_id], 'method' => 'delete']) !!}
                 <div class='btn-group'>
                     <a href="{!! route('cursos.edit', [$cursos->cur_id]) !!}" class='btn btn-info action-btn edit-btn'><i class="fa fa-edit"></i></a>
                     {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                 </div>
                 {!! Form::close() !!}
             </td>
         </tr>
        @endforeach
        </tbody>
    </table>
</div>

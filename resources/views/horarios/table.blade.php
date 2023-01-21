<div class="table-responsive">
    <table class="table" id="horarios-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Docente</th>
                <th>Correo</th>
                <th colspan="3">Horario</th>
            </tr>
        </thead>
        <tbody>
        @foreach($docentes as $docente)
        <tr>
         <td>{{ $loop->iteration }}</td>
         <td>{{ $docente->name }}</td>
         <td>{{ $docente->email }}</td>
         <td class=" text-center">
             <div class='btn-group'>
                 <a href="{!! route('horarios.show', [$docente->id]) !!}" class='btn btn-light action-btn edit-btn' title="Imprimir horario"><i class="fa fa-print" ></i></a>
                 <a href="{!! route('horarios.edit', [$docente->id]) !!}" class='btn btn-info action-btn edit-btn' title="Horario del Docente"><i class="fa fa-list"></i></a>
             </div>
         </td>
     </tr>
     @endforeach
        </tbody>
    </table>
</div>

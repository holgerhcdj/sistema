<div class="table-responsive">
    <table class="table" id="usuarios-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Email</th>
        <th>Cedula</th>
        <th>Telefóno</th>
        <th>Status</th>
        <th>Perfil</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuarios)
        <?php 
        if($usuarios->perfil==0){
            $perfil='SuperAdministrador';
        }
        if($usuarios->perfil==1){
            $perfil='Administrador';
        }
        if($usuarios->perfil==2){
            $perfil='Docente';
        }

        ?>
            <tr>
                       <td>{{ $usuarios->name }}</td>
            <td>{{ $usuarios->email }}</td>
            <td>{{ $usuarios->cedula }}</td>
            <td>{{ $usuarios->phone }}</td>
            <td>{{ $usuarios->status==0?'Inactivo':'Activo' }}</td>
            <td>{{ $perfil }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['usuarios.destroy', $usuarios->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('usuarios.show', [$usuarios->id]) !!}" class='btn btn-warning action-btn '><i class="fa fa-key"></i></a>
                               <a href="{!! route('usuarios.edit', [$usuarios->id]) !!}" class='btn btn-info action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use App\Repositories\UsuariosRepository;
use App\Http\Controllers\Controller as AppBaseController;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Flash;
use Response;
use Validator;
use Illuminate\Validation\Rule;

class UsuariosController extends AppBaseController
{
    /** @var  UsuariosRepository */
    private $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepo)
    {
        $this->usuariosRepository = $usuariosRepo;
    }

    /**
     * Display a listing of the Usuarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dt=$request->all();

        if(isset($dt['btn_buscar'])){
            $perfil=$dt['perfil'];
            $tx_usuario=$dt['usuario'];

            if(empty($tx_usuario)){
                if($dt['perfil']==0){
                    $usuarios = $this->usuariosRepository->all();
                }else{
                    $usuarios = Usuarios::where('perfil', '=', $perfil)->get();;
                }
            }else{
                $usuarios =Usuarios::where('name', 'like', '%'.$tx_usuario.'%')->get();
            }

        }else{
            $usuarios = $this->usuariosRepository->all();
        }


        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new Usuarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created Usuarios in storage.
     *
     * @param CreateUsuariosRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuariosRequest $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email','unique:users'],
            'cedula' => ['required', 'string','unique:users']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }


        $input['password']=bcrypt('123456');
        $usuarios = $this->usuariosRepository->create($input);
        Flash::success('Usuarios saved successfully.');
        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuarios not found');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for editing the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuarios not found');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.edit')->with('usuarios', $usuarios);
    }

    /**
     * Update the specified Usuarios in storage.
     *
     * @param int $id
     * @param UpdateUsuariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuariosRequest $request)
    {

        $dt=$request->all();
        if(isset($dt['password'])){
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'min:8', 'max:255', 'confirmed'],
            ]);
            
            $dt['password']=bcrypt($dt['password']);
        }else{

            $usuarios = $this->usuariosRepository->find($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => ['required', 'email', Rule::unique('users')->ignore($usuarios->id)],
                'cedula' => ['required', 'string', Rule::unique('users')->ignore($usuarios->id)]
            ]);
        }
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

        $usuarios = $this->usuariosRepository->update($dt, $id);
        Flash::success('Usuarios updated successfully.');
        return redirect(route('usuarios.index'));


    }

    /**
     * Remove the specified Usuarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuarios not found');

            return redirect(route('usuarios.index'));
        }

        $this->usuariosRepository->delete($id);

        Flash::success('Usuarios deleted successfully.');

        return redirect(route('usuarios.index'));
    }
}

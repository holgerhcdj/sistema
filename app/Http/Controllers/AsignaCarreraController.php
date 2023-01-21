<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsignaCarreraRequest;
use App\Http\Requests\UpdateAsignaCarreraRequest;
use App\Repositories\AsignaCarreraRepository;
use App\Http\Controllers\Controller as AppBaseController;
use App\Models\Usuarios;
use App\Models\Carreras;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class AsignaCarreraController extends AppBaseController
{
    /** @var  AsignaCarreraRepository */
    private $asignaCarreraRepository;

    public function __construct(AsignaCarreraRepository $asignaCarreraRepo)
    {
        $this->asignaCarreraRepository = $asignaCarreraRepo;
    }

    /**
     * Display a listing of the AsignaCarrera.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $asignaCarreras = DB::select("SELECT * FROM asigna_carreras ac 
            JOIN users u on u.id=ac.usu_id 
            JOIN carreras c on c.car_id=ac.car_id ");
        return view('asigna_carreras.index')
            ->with('asignaCarreras', $asignaCarreras);
    }

    /**
     * Show the form for creating a new AsignaCarrera.
     *
     * @return Response
     */
    public function create()
    {
        $admins=Usuarios::Where('perfil',1)->OrderBy('name')->pluck('name','id');
        $carreras=Carreras::OrderBy('car_nombre')->pluck('car_nombre','car_id');
        return view('asigna_carreras.create')
        ->with('admins',$admins)
        ->with('carreras',$carreras)
        ;
    }

    /**
     * Store a newly created AsignaCarrera in storage.
     *
     * @param CreateAsignaCarreraRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignaCarreraRequest $request)
    {
        $input = $request->all();
        $usu_id=$input['usu_id'];
        $car_id=$input['car_id'];

        $asignacion=DB::select("SELECT * FROM asigna_carreras where usu_id=$usu_id and car_id=$car_id ");

        if(empty($asignacion)){
            $input['asc_fecha']=date('Y-m-d');
            $asignaCarrera = $this->asignaCarreraRepository->create($input);
            Flash::success('Asigna Carrera saved successfully.');
        }else{
            Flash::error('La carrera ya fue asignada.');

        }


        return redirect(route('asignaCarreras.index'));
    }

    /**
     * Display the specified AsignaCarrera.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignaCarrera = $this->asignaCarreraRepository->find($id);

        if (empty($asignaCarrera)) {
            Flash::error('Asigna Carrera not found');

            return redirect(route('asignaCarreras.index'));
        }

        return view('asigna_carreras.show')->with('asignaCarrera', $asignaCarrera);
    }

    /**
     * Show the form for editing the specified AsignaCarrera.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignaCarrera = $this->asignaCarreraRepository->find($id);
        $admins=Usuarios::Where('perfil',1)->OrderBy('name')->pluck('name','id');
        $carreras=Carreras::OrderBy('car_nombre')->pluck('car_nombre','car_id');


        if (empty($asignaCarrera)) {
            Flash::error('Asigna Carrera not found');
            return redirect(route('asignaCarreras.index'));
        }

        return view('asigna_carreras.edit')
        ->with('asignaCarrera', $asignaCarrera)
        ->with('admins',$admins)
        ->with('carreras',$carreras)     
        ;
    }

    /**
     * Update the specified AsignaCarrera in storage.
     *
     * @param int $id
     * @param UpdateAsignaCarreraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignaCarreraRequest $request)
    {
        $asignaCarrera = $this->asignaCarreraRepository->find($id);

        if (empty($asignaCarrera)) {
            Flash::error('Asigna Carrera not found');

            return redirect(route('asignaCarreras.index'));
        }

        $asignaCarrera = $this->asignaCarreraRepository->update($request->all(), $id);

        Flash::success('Asigna Carrera updated successfully.');

        return redirect(route('asignaCarreras.index'));
    }

    /**
     * Remove the specified AsignaCarrera from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asignaCarrera = $this->asignaCarreraRepository->find($id);

        if (empty($asignaCarrera)) {
            Flash::error('Asigna Carrera not found');

            return redirect(route('asignaCarreras.index'));
        }

        $this->asignaCarreraRepository->delete($id);

        Flash::success('Asigna Carrera deleted successfully.');

        return redirect(route('asignaCarreras.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMateriasRequest;
use App\Http\Requests\UpdateMateriasRequest;
use App\Repositories\MateriasRepository;
use App\Http\Controllers\Controller as AppBaseController;
use Illuminate\Http\Request;
use App\Models\Materias;
use Flash;
use Response;

class MateriasController extends AppBaseController
{
    /** @var  MateriasRepository */
    private $materiasRepository;

    public function __construct(MateriasRepository $materiasRepo)
    {
        $this->materiasRepository = $materiasRepo;
    }

    /**
     * Display a listing of the Materias.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $dt=$request->all();

        if(isset($dt['btn_buscar'])){

            $area=$dt['area'];
            $tx_materia=$dt['materia'];
            if(empty($tx_materia)){

                if($area==='0'){
                    $materias = $this->materiasRepository->all();
                }else{
                    $materias = Materias::where('mat_area', '=', $area)->get();;
                }
            }else{
                $materias =Materias::where('mat_descripcion', 'like', '%'.$tx_materia.'%')->get();
            }

        }else{
            $materias = $this->materiasRepository->all();
        }


        return view('materias.index')
            ->with('materias', $materias);
    }

    /**
     * Show the form for creating a new Materias.
     *
     * @return Response
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created Materias in storage.
     *
     * @param CreateMateriasRequest $request
     *
     * @return Response
     */
    public function store(CreateMateriasRequest $request)
    {
        $input = $request->all();

        $materias = $this->materiasRepository->create($input);

        Flash::success('Materias saved successfully.');

        return redirect(route('materias.index'));
    }

    /**
     * Display the specified Materias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materias = $this->materiasRepository->find($id);

        if (empty($materias)) {
            Flash::error('Materias not found');

            return redirect(route('materias.index'));
        }

        return view('materias.show')->with('materias', $materias);
    }

    /**
     * Show the form for editing the specified Materias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materias = $this->materiasRepository->find($id);

        if (empty($materias)) {
            Flash::error('Materias not found');

            return redirect(route('materias.index'));
        }

        return view('materias.edit')->with('materias', $materias);
    }

    /**
     * Update the specified Materias in storage.
     *
     * @param int $id
     * @param UpdateMateriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMateriasRequest $request)
    {
        $materias = $this->materiasRepository->find($id);

        if (empty($materias)) {
            Flash::error('Materias not found');

            return redirect(route('materias.index'));
        }

        $materias = $this->materiasRepository->update($request->all(), $id);

        Flash::success('Materias updated successfully.');

        return redirect(route('materias.index'));
    }

    /**
     * Remove the specified Materias from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materias = $this->materiasRepository->find($id);

        if (empty($materias)) {
            Flash::error('Materias not found');

            return redirect(route('materias.index'));
        }

        $this->materiasRepository->delete($id);

        Flash::success('Materias deleted successfully.');

        return redirect(route('materias.index'));
    }
}

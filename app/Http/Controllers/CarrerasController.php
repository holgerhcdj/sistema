<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarrerasRequest;
use App\Http\Requests\UpdateCarrerasRequest;
use App\Repositories\CarrerasRepository;
use App\Http\Controllers\Controller as AppBaseController;
use Illuminate\Http\Request;
use App\Models\Carreras;
use Flash;
use Response;

class CarrerasController extends AppBaseController
{
    /** @var  CarrerasRepository */
    private $carrerasRepository;

    public function __construct(CarrerasRepository $carrerasRepo)
    {
        $this->carrerasRepository = $carrerasRepo;
    }

    /**
     * Display a listing of the Carreras.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $dt=$request->all();

        if(isset($dt['btn_buscar'])){

            $carrera=$dt['carrera'];

            if(empty($carrera)){
                    $carreras = $this->carrerasRepository->all();
            }else{
                $carreras =Carreras::where('car_nombre', 'like', '%'.$carrera.'%')->get();
            }

        }else{
            $carreras = $this->carrerasRepository->all();
        }

        return view('carreras.index')
            ->with('carreras', $carreras);
    }

    /**
     * Show the form for creating a new Carreras.
     *
     * @return Response
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Store a newly created Carreras in storage.
     *
     * @param CreateCarrerasRequest $request
     *
     * @return Response
     */
    public function store(CreateCarrerasRequest $request)
    {
        $input = $request->all();

        $carreras = $this->carrerasRepository->create($input);

        Flash::success('Carreras saved successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Display the specified Carreras.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carreras = $this->carrerasRepository->find($id);

        if (empty($carreras)) {
            Flash::error('Carreras not found');

            return redirect(route('carreras.index'));
        }

        return view('carreras.show')->with('carreras', $carreras);
    }

    /**
     * Show the form for editing the specified Carreras.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carreras = $this->carrerasRepository->find($id);

        if (empty($carreras)) {
            Flash::error('Carreras not found');

            return redirect(route('carreras.index'));
        }

        return view('carreras.edit')->with('carreras', $carreras);
    }

    /**
     * Update the specified Carreras in storage.
     *
     * @param int $id
     * @param UpdateCarrerasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarrerasRequest $request)
    {
        $carreras = $this->carrerasRepository->find($id);

        if (empty($carreras)) {
            Flash::error('Carreras not found');

            return redirect(route('carreras.index'));
        }

        $carreras = $this->carrerasRepository->update($request->all(), $id);

        Flash::success('Carreras updated successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Remove the specified Carreras from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carreras = $this->carrerasRepository->find($id);

        if (empty($carreras)) {
            Flash::error('Carreras not found');

            return redirect(route('carreras.index'));
        }

        $this->carrerasRepository->delete($id);

        Flash::success('Carreras deleted successfully.');

        return redirect(route('carreras.index'));
    }
}

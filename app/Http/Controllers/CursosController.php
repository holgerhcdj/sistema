<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCursosRequest;
use App\Http\Requests\UpdateCursosRequest;
use App\Repositories\CursosRepository;
use App\Http\Controllers\Controller as AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CursosController extends AppBaseController
{
    /** @var  CursosRepository */
    private $cursosRepository;

    public function __construct(CursosRepository $cursosRepo)
    {
        $this->cursosRepository = $cursosRepo;
    }

    /**
     * Display a listing of the Cursos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cursos = $this->cursosRepository->all();

        return view('cursos.index')
            ->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new Cursos.
     *
     * @return Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created Cursos in storage.
     *
     * @param CreateCursosRequest $request
     *
     * @return Response
     */
    public function store(CreateCursosRequest $request)
    {
        $input = $request->all();

        $cursos = $this->cursosRepository->create($input);

        Flash::success('Cursos saved successfully.');

        return redirect(route('cursos.index'));
    }

    /**
     * Display the specified Cursos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cursos = $this->cursosRepository->find($id);

        if (empty($cursos)) {
            Flash::error('Cursos not found');

            return redirect(route('cursos.index'));
        }

        return view('cursos.show')->with('cursos', $cursos);
    }

    /**
     * Show the form for editing the specified Cursos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cursos = $this->cursosRepository->find($id);

        if (empty($cursos)) {
            Flash::error('Cursos not found');

            return redirect(route('cursos.index'));
        }

        return view('cursos.edit')->with('cursos', $cursos);
    }

    /**
     * Update the specified Cursos in storage.
     *
     * @param int $id
     * @param UpdateCursosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCursosRequest $request)
    {
        $cursos = $this->cursosRepository->find($id);

        if (empty($cursos)) {
            Flash::error('Cursos not found');

            return redirect(route('cursos.index'));
        }

        $cursos = $this->cursosRepository->update($request->all(), $id);

        Flash::success('Cursos updated successfully.');

        return redirect(route('cursos.index'));
    }

    /**
     * Remove the specified Cursos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cursos = $this->cursosRepository->find($id);

        if (empty($cursos)) {
            Flash::error('Cursos not found');

            return redirect(route('cursos.index'));
        }

        $this->cursosRepository->delete($id);

        Flash::success('Cursos deleted successfully.');

        return redirect(route('cursos.index'));
    }
}

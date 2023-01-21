<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHorariosRequest;
use App\Http\Requests\UpdateHorariosRequest;
use App\Repositories\HorariosRepository;
use App\Http\Controllers\Controller as AppBaseController;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Carreras;
use App\Models\Materias;
use App\Models\Cursos;
use Validator;
use Illuminate\Validation\Rule;
use Flash;
use Response;
use DB;
use Session;
use Auth;

class HorariosController extends AppBaseController
{
    /** @var  HorariosRepository */
    private $horariosRepository;

    public function __construct(HorariosRepository $horariosRepo)
    {
        $this->horariosRepository = $horariosRepo;
    }

    /**
     * Display a listing of the Horarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        $docentes=Usuarios::Where('perfil',2)->OrderBy('name')->get();
        $usu_id=Auth::user()->id;
        $car_id=Session::get('car_id');

        if(Auth::user()->perfil==0){

            $asignacion=[];

        }else{

            $asignacion=DB::select("SELECT * FROM asigna_carreras ac
                                    JOIN carreras c ON ac.car_id=c.car_id
                                    WHERE ac.usu_id=$usu_id and ac.car_id=$car_id ");
            
            if(!empty($asignacion)){
                $asignacion=$asignacion[0];
            }

        }

        return view('horarios.index')
            ->with('docentes', $docentes)
            ->with('asignacion', $asignacion);
    }

    /**
     * Show the form for creating a new Horarios.
     *
     * @return Response
     */
    public function create()
    {
        $docentes=Usuarios::Where('perfil',2)->OrderBy('name')->pluck('name','id');
        $carreras=Carreras::OrderBy('car_nombre')->pluck('car_nombre','car_id');
        $materias=Materias::OrderBy('mat_descripcion')->pluck('mat_descripcion','mat_id');
        $cursos=Cursos::OrderBy('cur_descripcion')->pluck('cur_descripcion','cur_id');
        $paralelos=$this->paralelos();
        $dias=$this->dias();
        $horas=$this->horas();
        return view('horarios.create')
        ->with('docentes',$docentes)
        ->with('carreras',$carreras)
        ->with('materias',$materias)
        ->with('cursos',$cursos)
        ->with('paralelos',$paralelos)
        ->with('dias',$dias)
        ->with('horas',$horas)
        ;
    }

    /**
     * Store a newly created Horarios in storage.
     *
     * @param CreateHorariosRequest $request
     *
     * @return Response
     */
    public function store(CreateHorariosRequest $request)
    {

        $input = $request->all();

        $horarios = $this->horariosRepository->create($input);

        Flash::success('Horarios saved successfully.');
        
        return redirect(route('horarios.index'));

    }

    /**
     * Display the specified Horarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $horarios = $this->genera_sql_horarios($id);
        $docente=Usuarios::where('id',$id)->get();

        if (empty($horarios)) {
            Flash::error('Horarios not found');
            return redirect(route('horarios.index'));
        }

        return view('horarios.show')
        ->with('docente', $docente[0])
        ->with('horarios', $horarios)
        ;
    }

    /**
     * Show the form for editing the specified Horarios.
     *
     * @param int $id
     *
     * @return Response
     */

    public function genera_sql_horarios($id){

        $horas=$this->horas();
        $car_id=Session::get('car_id');

        $sql="";
        $horas=$this->horas();
        foreach ($horas as $k => $h) {
            $union=" UNION ALL";
            if($k==10){
                $union="";
            }
                $sql.="(SELECT $k as hora, 
                (SELECT concat(mat_descripcion,'-',cur_descripcion,' ',hor_paralelo,'&',h.hor_id) from horarios h JOIN materias m on h.mat_id=m.mat_id JOIN cursos c on h.cur_id=c.cur_id WHERE usu_id=$id and car_id=$car_id AND hor_hora=$k AND hor_dia=1 LIMIT 1) AS `lunes`,
                (SELECT concat(mat_descripcion,'-',cur_descripcion,' ',hor_paralelo,'&',h.hor_id) from horarios h JOIN materias m on h.mat_id=m.mat_id JOIN cursos c on h.cur_id=c.cur_id WHERE usu_id=$id and car_id=$car_id AND hor_hora=$k AND hor_dia=2 LIMIT 1) AS `martes`,
                (SELECT concat(mat_descripcion,'-',cur_descripcion,' ',hor_paralelo,'&',h.hor_id) from horarios h JOIN materias m on h.mat_id=m.mat_id JOIN cursos c on h.cur_id=c.cur_id WHERE usu_id=$id and car_id=$car_id AND hor_hora=$k AND hor_dia=3 LIMIT 1) AS `miercoles`,
                (SELECT concat(mat_descripcion,'-',cur_descripcion,' ',hor_paralelo,'&',h.hor_id) from horarios h JOIN materias m on h.mat_id=m.mat_id JOIN cursos c on h.cur_id=c.cur_id WHERE usu_id=$id and car_id=$car_id AND hor_hora=$k AND hor_dia=4 LIMIT 1) AS `jueves`,
                (SELECT concat(mat_descripcion,'-',cur_descripcion,' ',hor_paralelo,'&',h.hor_id) from horarios h JOIN materias m on h.mat_id=m.mat_id JOIN cursos c on h.cur_id=c.cur_id WHERE usu_id=$id and car_id=$car_id AND hor_hora=$k AND hor_dia=5 LIMIT 1) AS `viernes`)
                $union
                ";
        }
        return $horarios = DB::select($sql);


    }


    public function edit($id)
    {

        $docente=Usuarios::where('id',$id)->get();
        $carreras=Carreras::OrderBy('car_nombre')->pluck('car_nombre','car_id');
        $materias=Materias::OrderBy('mat_descripcion')->pluck('mat_descripcion','mat_id');
        $cursos=Cursos::OrderBy('cur_numero')->pluck('cur_descripcion','cur_id');
        $paralelos=$this->paralelos();
        $dias=$this->dias();
        $horas=$this->horas();

        $horarios = $this->genera_sql_horarios($id);
        return view('horarios.edit')
        ->with('docente', $docente[0])
        ->with('horarios', $horarios)
        ->with('carreras',$carreras)
        ->with('materias',$materias)
        ->with('cursos',$cursos)
        ->with('paralelos',$paralelos)
        ->with('dias',$dias)
        ->with('horas',$horas)
        ;


    }

    /**
     * Update the specified Horarios in storage.
     *
     * @param int $id
     * @param UpdateHorariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHorariosRequest $request)
    {

        //$horario=DB::select("SELECT * FROM horarios where ");
        $input = $request->all();
        //dd($input);

            $validator = Validator::make($request->all(), [ // se crea una instancia de Validator y se pasan todos los datos del formulario como primer argumento
                'usu_id' => ['required'], // el campo1 es requerido
                'hor_dia' => ['required'], // el campo1 es requerido
                'hor_hora' => ['required', Rule::unique('horarios')->where(function ($query) use ($request) { // el campo2 es requerido y se aplica la regla de unicidad en la tabla especificada

                    return $query->where('usu_id', $request->usu_id) // se verifica que el valor del campo1 en la tabla sea igual al valor del campo1 en el formulario
                                 ->where('hor_dia', $request->hor_dia) // se verifica que el valor del campo2 en la tabla sea igual al valor del campo2 en el formulario
                                 ->where('hor_hora', $request->hor_hora); // se verifica que el valor del campo2 en la tabla sea igual al valor del campo2 en el formulario

                            })],
            ],['hor_hora.unique'=>'Ya existe un registro de este horario.']);

            $validator2 = Validator::make($request->all(), [ // se crea una instancia de Validator y se pasan todos los datos del formulario como primer argumento
                'cur_id' => ['required'], // el campo1 es requerido
                'hor_paralelo' => ['required'], // el campo1 es requerido
                'hor_dia' => ['required'], // el campo1 es requerido
                'hor_hora' => ['required', Rule::unique('horarios')->where(function ($query) use ($request) { // el campo2 es requerido y se aplica la regla de unicidad en la tabla especificada

                    return $query->where('cur_id', $request->usu_id) // se verifica que el valor del campo1 en la tabla sea igual al valor del campo1 en el formulario
                                 ->where('hor_paralelo', $request->hor_dia) // se verifica que el valor del campo2 en la tabla sea igual al valor del campo2 en el formulario
                                 ->where('hor_dia', $request->hor_hora) // se verifica que el valor del campo2 en la tabla sea igual al valor del campo2 en el formulario
                                 ->where('hor_hora', $request->hor_hora); // se verifica que el valor del campo2 en la tabla sea igual al valor del campo2 en el formulario

                            })],
            ],['hor_hora.unique'=>'Ya existe un registro de este curso.']);

        if( $validator->fails() || $validator2->fails() ) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        
        $horarios = $this->horariosRepository->create($input);
        Flash::success('Horarios saved successfully.');
        return redirect(route('horarios.edit',$id));

    }

    /**
     * Remove the specified Horarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $req)
    {

        $dt=$req->all();
        $hor_id=$dt['hor_id'];
        $horarios = $this->horariosRepository->find($hor_id);
        if (empty($horarios)) {
            Flash::error('Horarios not found');
            return redirect(route('horarios.index'));
        }
        $this->horariosRepository->delete($hor_id);
        Flash::success('Horarios deleted successfully.');
        return redirect(route('horarios.edit',$horarios->usu_id));
    }

    public function paralelos(){
        return [
            'A'=>'A',
            'B'=>'B',
            'C'=>'C',
            'D'=>'D'
        ];
    }

    public function dias(){
        return [
            '1'=>'LUNES',
            '2'=>'MARTES',
            '3'=>'MIERCOLES',
            '4'=>'JUEVES',
            '5'=>'VIERNES'
        ];
    }
    public function horas(){
        return [
            '1'=>'PRIMERA',
            '2'=>'SEGUNDA',
            '3'=>'TERCERA',
            '4'=>'CUARTA',
            '5'=>'QUINTA',
            '6'=>'SEXTA',
            '7'=>'SÉPTIMA',
            '8'=>'OCTAVA',
            '9'=>'NOVENA',
            '10'=>'DÉCIMA'
        ];
    }

    public function horario_docente(){
        $usu_id=Auth::user()->id;
        return $this->show($usu_id);
    }
    
    public function aula_virtual(){

        $usu_id=Auth::user()->id;
        $horarios=$this->genera_sql_horarios($usu_id);
        return view('horarios.aula_virtual')
        ->with('horarios',$horarios);


    }

}

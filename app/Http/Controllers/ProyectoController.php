<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\User;
use App\Models\Convocatoria;
use App\Models\Inscripcion;
use App\Models\Colaborador;
use Codedge\Fpdf\Fpdf\Fpdf;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estatus_eliminar=1;
        $proyectos=Proyecto::where('estatus_eliminar',$estatus_eliminar)->get();
        return view('proyectos.index',compact('proyectos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proyectos.create');
    }

    public function create2($idConv)
    {
        //
        $users=User::all();
        return view('proyectos.create', compact('idConv', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'titulo'=>'required|min:2|max:50',
            'resumen'=>'required|min:2|max:1000',
            'objetivo'=>'required|max:2000',
            'participantes'=>'required|numeric|max:4|regex:/[0-4]/',
            'lugar'=>'required',
            'costo'=>'required|numeric',
            'colaboradors'=>'required',
        ]);

        $proyectos=new Proyecto();
        
        $proyectos->titulo=$request->titulo;
        $proyectos->fechainicio=$request->fechainicio;
        $proyectos->fechafinal=$request->fechafinal;
        $proyectos->resumen=$request->resumen;
        $proyectos->objetivo=$request->objetivo;
        $proyectos->participantes=$request->participantes;
        $proyectos->lugar=$request->lugar;
        $proyectos->costo=$request->costo;
        $proyectos->user_id=Auth()->User()->id;
        $proyectos->convocatoria_id=$request->idConv;
        $proyectos->status=$request->status;
        $proyectos->save();
        $insertedId = $proyectos->id;        
        $colaborador=new Colaborador();
        if ( $request->has('colaboradors') ) {
            foreach ( $request->get('colaboradors') as $colaboradores ) {
                Colaborador::create([
                    'colaborador' => $colaboradores,
                    'proyecto_id' => $insertedId
                ]);
            }
        }
        
        $colaborador -> proyecto_id = $proyectos;

        return redirect()->route('proyectos.index')->with('mensaje','¡¡¡¡Nueva convocatoria registrada con exito!!!!');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $proyectos=Proyecto::where('id','=',$id)->first();
        $colaboradores=Colaborador::where('proyecto_id',$id);
        return view('proyectos.show',compact('proyectos','colaboradores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proyectos=Proyecto::findOrFail($id);
        $users=User::all();
        return view('proyectos.edit',compact('proyectos','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //

        $validated = $request->validate([
            'titulo'=>'required|min:2|max:50',
            'resumen'=>'required|min:2|max:1000',
            'objetivo'=>'required|max:2000',
            'participantes'=>'required|numeric|max:4|regex:/[0-4]/',
            'lugar'=>'required',
            'costo'=>'required|numeric',
            'colaboradors'=>'required',
        ]);

        
        $proyectos=Proyecto::findOrFail($id);
        $proyectos->titulo=$request->titulo;
        $proyectos->fechainicio=$request->fechainicio;
        $proyectos->fechafinal=$request->fechafinal;
        $proyectos->resumen=$request->resumen;
        $proyectos->objetivo=$request->objetivo;
        $proyectos->participantes=$request->participantes;
        $proyectos->lugar=$request->lugar;
        $proyectos->costo=$request->costo;
        $proyectos->user_id=Auth()->User()->id;
        $proyectos->convocatoria_id=$request->idConv;
        $proyectos->status=$request->status;

        $proyectos->save();

        $insertedId = $proyectos->id;


        $colaborador=new Colaborador();

        if ( $request->has('colaboradors') ) {
            foreach ( $request->get('colaboradors') as $colaboradores ) {
                Colaborador::create([
                    'colaborador' => $colaboradores,
                    'proyecto_id' => $insertedId
                ]);
            }
        }
        
        $colaborador -> proyecto_id = $proyectos;

        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $proyectos=Proyecto::find($id);
        $proyectos->estatus_eliminar=0;
        $proyectos->update();
        return redirect()->route('proyectos.index');
    }


    public function ins($id)
    {
        $convocatorias=Convocatoria::find($id);
        return view('proyectos.create',[ 'convocatoria_id'=>$convocatorias]);

    }


    public function proyectosConv($id){
        $estatus_eliminar=1;
        $proyectos=Proyecto::where('convocatoria_id', $id)->get();
        $proyectos=Proyecto::where('estatus_eliminar',$estatus_eliminar)->get();
        return view('proyectos.proyectosConv',compact('proyectos'));
    }


    public function change_status(Proyecto $proyecto){
        if($proyecto->status == 'REALIZANDO'){
            $proyecto->update(['status'=>'FINALIZADO']);
            return redirect()->back();
        }else{
            $proyecto->update(['status'=>'REALIZANDO']);
            return redirect()->back();
        }
    }


    public function misProyectos($id){
        $proyectos=Proyecto::where('user_id',$id)->get();
        return view('proyectos.indexPropios',compact('users', 'proyectos'));
    }


    public function __construct(){
        $this->fpdf = new Fpdf;
    }

    
    public function pdfProyecto($id){

        //-------------------------------1 seccion-----------------------------------------------
        $constancia=Proyecto::select('proyectos.titulo AS titulo')
        ->where('proyectos.id',$id)
        ->get();
        foreach($constancia AS $row){
            $this->fpdf->SetTitle($row->titulo);
        }
        $this->fpdf->SetFont('Times', 'B', 12);
        $this->fpdf->SetMargins(30,10,30,10);
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage("P", ['210', '270']);
        $this->fpdf->Image('img/header.jpg', 0, 3, 210, 0, 'JPG');
        $this->fpdf->Image('img/footer.jpg', 5, 240, 210, 0, 'JPG');
        $this->fpdf->Ln(20);
        $this->fpdf->MultiCell(0,20, utf8_decode('CONSTANCIA DE REGISTRO DE PROYECTO INTERNO'),0,'C');
        
        $fecha=date_default_timezone_set('America/Mexico_City');
        $fecha=setlocale(LC_ALL,'es_MX');
        $fecha = date('l js \of F Y h:i:s A');
        $fecha=strftime("%A %d de %B %Y %r");
        
       // $diassemana = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
       // $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        //$fecha = $diassemana[date('w')] .' '. date('d') .' de '. $meses[date('n') - 1].' del ' . date('Y');
        
        
        //-------------------------------/1 seccion-----------------------------------------------

        $this->fpdf->MultiCell(0,20, utf8_decode($fecha),0,'R');


        $proyecto=Proyecto::select('proyectos.titulo AS titulo','proyectos.fechainicio AS fechainicio',
        'proyectos.fechafinal AS fechafinal','proyectos.objetivo AS objetivo','proyectos.resumen AS resumen',
        'proyectos.participantes AS participantes','proyectos.lugar AS lugar','proyectos.costo AS costo',
        'users.name AS nombreuser','convocatorias.titulo AS conv')
        ->join('users','proyectos.user_id','=','users.id')  
        ->join('convocatorias','proyectos.convocatoria_id','=','convocatorias.id')        
        ->where('proyectos.id',$id)
        ->get();
        
        
        $progUser=Proyecto::select('proyectos.user_id AS iduser')
        ->where('proyectos.id',$id)
        ->get();       

        //Parte del nombre
        $this->fpdf->SetFont("Times", "", 12);
        
        foreach($proyecto AS $row){
        $this->fpdf->Cell(40, 30, $row->nombreuser, 0,0,'J');
        }
        $this->fpdf->Ln(5);

        $this->fpdf->Cell(70, 30, 'PROFESOS DE ASIGNATURA A', 0, 0, 'J');

        $this->fpdf->Ln(5);

        foreach($progUser AS $row){
            $pUser=User::select('programas.name AS prog')
            ->join('programas','users.programa_id','=','programas.id')         
            ->where('users.id',$row->iduser)
            ->get();
            foreach($pUser AS $row){
                $this->fpdf->Cell(60, 30,  utf8_decode($row->prog),0, 1, 'J');
            }
        }

        $this->fpdf->Cell(60, -18, 'PRESENTE.', 0, 0, 'L');

        $this->fpdf->Ln(2);

        foreach($proyecto AS $row){
        $texto="            Por este conducto le notifico que el proyecto abajo escrito y del cual es responsable técnico, ha sido ACEPTADO para su desarrollo en conjunto con los colaboradores abajo enlistados $row->fechainicio al $row->fechafinal del año en curso";
        }

        $this->fpdf->MultiCell(150, 8, utf8_decode($texto),'J');

        $this->fpdf->Ln(5);

//----------------------------SECCION PARA EL RECUADRO DE LOS DATOS DEL PROYECTO

        //-------TITULO--------
        $this->fpdf->Cell(40, 7, utf8_decode ("Titulo:"), 1, 0, 'C');

        foreach ($proyecto AS $row) {
            $this->fpdf->Cell(110, 7, utf8_decode ($row['titulo']),1, 1, 'J');
        }

        //-------OBJETIVO--------

        $this->fpdf->Cell(40, 10, utf8_decode ("Objetivo:"), 1, 0, 'C');

        foreach ($proyecto AS $row) {
            $this->fpdf->MultiCell(110, 5, utf8_decode ($row['objetivo']),1, 'J');
        }

        //-------DESCRIPCION--------
        $this->fpdf->Cell(40, 15, utf8_decode ("Descripción:"), 1, 0, 'C');

        foreach ($proyecto AS $row) {
            $this->fpdf->MultiCell(110, 5, utf8_decode ($row['resumen']),1, 'J');
        }

        //-------COSTO--------
        $this->fpdf->Cell(40, 7, utf8_decode ("Monto financiado:"), 1, 0, 'C');

        foreach ($proyecto AS $row) {
            $this->fpdf->Cell(110, 7,utf8_decode ($row['costo']),1,1, 'J');
        }

        //-------COLABORADORES--------
        $this->fpdf->Cell(75, 7, utf8_decode ("Colaboradores:"), 1, 0, 'C');
        $this->fpdf->Cell(75, 7, utf8_decode ("Programa Educativo:"), 1, 1, 'C');

        $colaborador=Colaborador::select('colaboradors.colaborador AS col','users.name AS coluser')
        ->join('users','colaboradors.colaborador','=','users.id')       
        ->where('proyecto_id',$id)
        ->get();
        
        foreach($colaborador AS $row){
            $this->fpdf->Cell(75, 7, $row->coluser,1, 0, 'J');
            $pUserCol=User::select('programas.name AS progCol')
            ->join('programas','users.programa_id','=','programas.id')         
            ->where('users.id',$row->col)
            ->get();
            foreach($pUserCol AS $row){
                $this->fpdf->Cell(75, 7,  utf8_decode($row->progCol),1, 1, 'J');
            }
        }
        
        
        $this->fpdf->Ln(0);
/*
        foreach ($proyecto AS $row) {
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['titulo']),1, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['fechainicio']),0, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['fechafinal']),0, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['objetivo']),0, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['resumen']),0, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['participantes']),0, 1, 'C');
            $this->fpdf->Cell(20, 5, utf8_decode ($row['lugar']),0, 1, 'L');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['costo']),0, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['nombreuser']),0, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['conv']),0, 1, 'C');
            //$this->fpdf->Cell(20, 5, utf8_decode ($row['col']),0, 1, 'C');
        }

  */      

        

        

        $this->fpdf->Ln(10);

        $texto2="           Los rubros financiables del proyecto se tomaron del protocolo correspondiente entregado por el grupo de trabajo, por lo que cualquier gasto no contemplado en dicho documento no será consedierado por parte de la institución. Al finalizar el proyecto, se el material adquirido para su desarrollo es factible de ser inventariado, se quedará como propiedad institucional.";
        
        $this->fpdf->MultiCell(150, 8, utf8_decode($texto2));


        $this->fpdf->Ln(5);

        $texto3="           Es importante hacer de su concentimiento que para futuros apoyos se tomarán en cuenta los resultados parciales () y () del cumplimiento en tiempo y forma de las actividades derivadas de este proyecto.";
        
        $this->fpdf->MultiCell(150, 8, utf8_decode($texto3));


        $this->fpdf->Ln(5);

        $texto4="           Agradeciendo de antemano su participación y compromiso institucional, me despido enciándole un cordial saludo.";
        
        $this->fpdf->MultiCell(150, 8, utf8_decode($texto4));

        $this->fpdf->Ln(5);

        $this->fpdf->Cell(150, 8,utf8_decode('ATTE. Comité de Investigación'),0,0,'C');


        $this->fpdf->Ln(35);


        //$this>fpdf->SetMargins();
        $this->fpdf->MultiCell(150, 8,utf8_decode('IQI Edmundo Alberto Vazquez Castro'),'T','C',false);

        

        $this->fpdf->Cell(150, 8,utf8_decode('Jefe de división academica'),0,0,'C');

        $this->fpdf->Output();//----
        exit;                 //---- Este cierra el pdf siempre ira de ultimo
    }
    
}

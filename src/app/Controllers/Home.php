<?php

namespace App\Controllers;
use App\Models\Usuarios;

use App\Models\Recetas;
use App\Models\Medicamentos;

class Home extends BaseController
{
    public function index()
    {       
        echo view('cabecera_inicio');
        echo view('inicio');
        // $libros = new Usuarios();
        // $datos = $libros->listarUsuarios();
        // print_r($datos);
         //echo "test";
    }

    public function admin()
    {       
        echo view('cabecera_inicio');

        echo view('admin');
        // $libros = new Usuarios();
        // $datos = $libros->listarUsuarios();
        // print_r($datos);
         //echo "test";
    }

    public function primera(){
        echo view('cabecera_inicio');

        echo view('primera');


    }

    public function inicio_farmacia(){
        echo view('cabecera_inicio');

        echo view('inicio_farmacia');



    }

    public function mostrarReceta(){
      


        $recetas = new Recetas();
        $datos = $recetas->ultimaB();

        // $medicamentos = new medicamentos();

        // $lista = $medicamentos->ultima();


        // foreach($lista as $m){

        //     $nombre_m = $m->nombre;
        //     $tipo = $m->tipo;
        //     $dosis = $m->dosis;


        // }



        // $datos = (array) $datos;

        // $nombre = $datos[0]->nombre;
        // $primer_apellido = $datos[0]->primer_apellido;
        // $segundo_apellido = $datos[0]->segundo_apellido;
        // $edad = $datos[0]->edad;
        // $diagnostico = $datos[0]->diagnostico;
        // $medico = $datos[0]->medico_prescriptor;
        // $numero_receta = $datos[0]->numero_receta;


        return json_encode($datos);





    }

    public function mostrarRecetaMedicamentos(){
      



        $medicamentos = new medicamentos();

        $lista = $medicamentos->ultima();


 

        return json_encode($lista);





    }

}

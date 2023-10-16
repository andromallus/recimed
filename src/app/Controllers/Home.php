<?php

namespace App\Controllers;
use App\Models\Usuarios;

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
}

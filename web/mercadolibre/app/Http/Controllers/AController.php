<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;

class AController extends Controller
{
    public function getMarcas(){
        $marcas = array();
        $marcas[] = "Colun";
        $marcas[] = "LoncoLeche";
        $marcas[] = "Soprole";
        $marcas[] = "Carozzi";

        return $marcas;
    }

    public function getComidas(){
        //SELECT * FROM TABLA
        $comidas = Comida::all();
        return $comidas;

    }

    public function crearComida(){
        //INSERT INTO TABLA
        $comida = new Comida();
        $comida->nombre="PapaFrita";
        $comida->marca="Colun";
        $comida->anno=2000;

        $comida->save();
        return $comida;
    }



}

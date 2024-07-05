<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Users;
use App\Models\UserModel;
use App\Config\Session;


class Home extends BaseController
{
    protected $userModel;
    public $session;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->userModel = new UserModel(); // Crea una instancia del modelo
        $this->validator = \Config\Services::validation(); // Carga la biblioteca de validación
        $this->session = \Config\Services::session(); //Carga la biblioteca de session
    }

    public function index()
    {
        $titulo = ['titulo' => '¡Tu mate te esta esperando! 🧉',
                    't_head' => 'Bienvenidos a Serafina',
                    'session'=> $this->session
                ];
        return view('front/layouts/index_contenido', $titulo);
    }


    public function quienes_somos(){
        $titulo = ['titulo' => 'Serafina quienes somos',
                    't_head' => 'Quienes somos?',
                    'session'=> $this->session
                ];
        return view('front/layouts/quienes_somos_contenido', $titulo);
    }

    public function acerca_de(){
        $titulo = ['titulo' => 'Acerca de Serafina',
                    't_head' => 'Acerca de Serafina',
                    'session'=> $this->session
                ];
        return view('front/layouts/acerca_de_contenido', $titulo);
    }

    public function registrate(){
        $titulo = ['titulo' => 'Registrate en Serafina',
                    't_head' => 'Registrate en Serafina',
                    'session'=> $this->session
                ];

        if ($this->session->logged_in) {
            //return view('front/layouts/dashboard_contenido', $titulo);
            return redirect()->to('dashboard');
        }else{
            
            return view("front/layouts/registro_contenido", $titulo);
        }       


    }

    public function productos(){
        $titulo = ['titulo' => 'Productos',
                    't_head' => 'Tienda Serafina',
                    'session'=> $this->session
                ];
        return view("front/layouts/productos_contenido",$titulo);
    }
}

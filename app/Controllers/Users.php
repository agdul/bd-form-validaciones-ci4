<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Users extends BaseController
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


    public function hashPassword($rawPassword)
    {
        return password_hash($rawPassword, PASSWORD_DEFAULT);
    }


    public function correo_or_pass_error($correo)
    {
        $existe_user = $this->userModel->correo_en_uso($correo);
        if ($existe_user) {
            return $this->session->setFlashdata('error_message', 'Contraseña incorrecta. Inténtalo nuevamente.');
        } else {
            return $this->session->setFlashdata('error_message', 'Correo incorrecto. Inténtalo nuevamente.');
        }
    }

    // public function login()
    // {
    //     // Iniciar sesión después del registro exitoso
    //     // (Asegúrate de cargar la librería 'session' en tu controlador)
    //     $sessionData = [
    //         'id_user' => $this->userModel->getInsertID(),
    //         'nombre_usuario' => $this->request->getPost('nombre_usuario'),
    //         'nombre' => $this->request->getPost('nombre_user'),
    //         'correo' => $this->request->getPost('correo_user'),
    //         'nivel' => $this->request->getPost('nivel_user'),
    //         // Otros datos de usuario que quieras almacenar en la sesión
    //     ];
    //     echo (session()->set($sessionData));
    //     // Redirige a la página de inicio o a donde desees
    //     redirect()->to('front/layouts/login_contenido'); // Cambia la ruta según tu aplicación
    // }



    public function login()
    {
        $titulo = [
            'titulo' => 'Ingresa a Serafina',
            't_head' => 'Inicio de Sesion',
            'session' => $this->session
        ];
        $loggedIn = $this->session->get('logged_in');

        if ($loggedIn) {
            return redirect()->to('dashboard');
        } else {
            return view('front/layouts/login_contenido', $titulo);
        }
    }


    public function dashboard()
    {

        if ($this->session->logged_in) { //Si existe alguna session activa muestra el dashboard el usuario
            $level_user = $this->session->get('nivel');
            if ($level_user == 0) {
                $nombre_user = $this->session->get('nombre');
                $session_user = $this->session->get('session');

                $titulo = [ //Array de relaciones de clave-valor 
                    'titulo' => 'Bienvenido ' . $nombre_user,
                    't_head' => 'Bienvenido ' . $nombre_user,
                    'nivel' => $level_user,
                    'session' => $session_user,
                ];
                return view('front/layouts/dashboard_contenido', $titulo);
            } else {
                $nombre_user = $this->session->get('nombre');
                $session_user = $this->session->get('session');
                $users = $this->userModel->all_users();
                $titulo = [ //Array de relaciones de clave-valor 
                    'titulo' => 'Bienvenido ' . $nombre_user,
                    't_head' => 'Bienvenido ' . $nombre_user,
                    'nivel' => $level_user,
                    'session' => $session_user,
                    'users' => $users
                ];
                return view('front/layouts/dashboard_contenido', $titulo);
            }
        } else { // Si no hay sesión activa, redirige al inicio de sesión
            return redirect()->to('login'); // Asegúrate de ajustar la ruta correcta
        }
    }

    public function cerrar_session()
    {
        if ($this->session->logged_in) {
            $this->session->destroy();
            return redirect()->to('login');
        } else {
            $this->session->destroy();
            return redirect()->to('login');
        }
    }

    public function iniciar_sesion()
    {
        $validationRules = [ // Define las reglas de validación
            'correo' => 'required|valid_email',
            'contrasena' => 'trim|required|min_length[6]|max_length[25]'
        ];
        $this->validator->setRules($validationRules); // Establece/Seteo las reglas para la validación
        $titulo = [ //Array de relaciones de clave-valor 
            'titulo' => 'Ingresa a Serafina',
            't_head' => 'Inicio de Sesion',
            'validation' => $this->validator,
            'session' => $this->session
        ];
        // Luego, realiza la validación
        if ($this->validate($validationRules)) { //Si pasa la validacion del form
            $correo = $this->request->getPost('correo'); //Recupera del metodo post el correo y guarda
            $contrasena = $this->request->getPost('contrasena'); //Recupera del metodo post de la password y guarda
            if ($this->userModel->verificar_credenciales($correo, $contrasena)) { //Pregunta si los inputs del user son correctos, pertenecen a un usuario.
                $session = $this->session; //??     //Si pasa la verificacion
                $user_query = $this->userModel->getUser($correo);  //Hace una query(funcion del modelo) obtengo el user 
                if ($user_query !== null) { //Manejo de erro de la query
                    $dataSession = [ //Cargo mi array con los datos recididos de la consulta
                        'id' => $user_query->id_user,
                        'user' => $user_query->nombre_usuario,
                        'nombre' => $user_query->nombre_user,
                        'correo' => $correo,
                        'nivel' => $user_query->nivel_user,
                        'session' => $session,
                    ];
                    $this->session->set($dataSession); //Cargo en la libreria de session los datos
                    $this->session->logged_in = true;
                    var_dump($this->session->logged_in);
                    return redirect()->to('dashboard');
                } else {
                    return view('front/layouts/login_contenido', $titulo);
                    // Maneja el caso cuando no se encuentran los datos
                }
            } else { //Sino se verifica las credenciales pasa esto
                $this->correo_or_pass_error($correo);
                return view('front/layouts/login_contenido', $titulo);
            }
        } else { // Va por el fail en el form, vuelve a la vista con los errores 
            $titulo['validation'] = $this->validator;
            return view('front/layouts/login_contenido', $titulo);
        }
    }


    public function registrate()
    {
        if ($this->request->getMethod() === 'POST') {
            $rules = [ // Defino las reglas de validacion
                'nombre_usuario' => 'required|min_length[5]|max_length[20]',
                'nombre_user' => 'required|min_length[3]',
                'apellido_user' => 'required|min_length[3]',
                'correo_user' => 'required|valid_email',
                'contrasena_user' => 'trim|required|min_length[6]|max_length[25]',
                'tel_user' => 'required|numeric|min_length[8]|max_length[15]',
                'direccion_user' => 'required|max_length[15]',
            ];
            $this->validator->setRules($rules); //seteo las reglas
            $titulo = [
                'titulo' => 'Ingresa a Serafina',
                't_head' => 'Inicio de Sesion',
                'validation' => $this->validator
            ];
            $user_name =  $this->request->getPost('nombre_usuario'); //Recupero y guardo el nombre_usuario
            $correo = $this->request->getPost('correo_user'); // Recupero el correo

            $existe_user = $this->userModel->usuario_en_uso($correo, $user_name); //Guardo el resultado de la consulta si el usuario esta en uso V o F

            if ($this->validate($rules) && !$existe_user) { //Si las reglas se cumplen y el usuario no esta registrado  procede a guardarlo en la bd
                $contrasena_hasheada = ''; //Inicializacion de las varariables
                $pass = '';                //Inicializacion de las varariables
                $pass = $this->request->getPost('contrasena_user'); //Recupero la contrase;a del formulario igresado x el usuario
                $contrasena_hasheada = $this->hashPassword($pass); // guardo la Password haseada con la funcion que lo hace, le paso el input del usuario.

                $data = [ //Creo un array con los datos que voy a insertar en la tabla, todos los inputs del form tanto 
                    'nombre_usuario' => $user_name,
                    'nombre_user' => $this->request->getPost('nombre_user'),
                    'apellido_user' => $this->request->getPost('apellido_user'),
                    'correo_user' => $correo,
                    'contrasena_user' => $contrasena_hasheada,
                    'tel_user' => $this->request->getPost('tel_user'),
                    'direccion_user' => $this->request->getPost('direccion_user'),
                    'nivel_user' => 0, // Puedes ajustar esto según tus necesidades (0-Usuario || 1-Administrador)
                    'status_user' => 1, // Activo por defecto
                ];

                $this->userModel->save($data); //Agrego/Inserto los $datos en la tabla.
                $this->session->setFlashdata('success_message', '¡Registro exitoso! Inicie sesion para continuar'); //Mensaje de exito para Registro
                //$this->session->destroy();
                //return view('front/layouts/login_contenido', $titulo);
                return redirect()->to('login');
            } else { //Error en el form
                $this->user_or_correo_error($correo, $user_name);
                $titulo['validation'] = $this->validator;
                $titulo['session'] = $this->session;
                return view('front/layouts/registro_contenido', $titulo);
            }
        } else { ////Error No es post
            $titulo = [
                'titulo' => 'Registrate en Serafina',
                't_head' => 'Registrate en Serafina',
                'validation' => $this->validator,
                'session' =>  $this->session
            ];
            // $this->session->setFlashdata('error_message', 'El correo o el nombre de usuario ya están en uso.');
            return view('front/layouts/registro_contenido', $titulo);
        }
    }


    public function user_or_correo_error($correo, $nombre_usuario)
    {
        if ($this->userModel->correo_en_uso($correo, $nombre_usuario)) {
            return $this->session->setFlashdata('error_message', 'El correo ya está en uso.');
        }
        if ($this->userModel->user_en_uso($correo, $nombre_usuario)) {
            return $this->session->setFlashdata('error_message', 'El nombre de usuario ya está en uso.');
        }
    }


    // FUNCIONES DEL CRUD - USUARIO

    public function add_user()
    {
        $titulo = [
            'titulo' => 'Agregar Usuario',
            't_head' => 'ADM - CRUD',
            'session' =>  $this->session
        ];

        if ($this->session->logged_in) {
            $level_user = $this->session->get('nivel');
            if ($level_user == 0) {
                return redirect()->to('login');
            } else {
                $nombre_user = $this->session->get('nombre');
                $session_user = $this->session->get('session');
                $users = $this->userModel->all_users();
                $titulo = [ //Array de relaciones de clave-valor 
                    'titulo' => 'Bienvenido ' . $nombre_user,
                    't_head' => 'ADM - CRUD ',
                    'nivel' => $level_user,
                    'session' => $session_user,
                    'users' => $users
                ];
                return view('front/layouts/add_user_contenido', $titulo);
            }
        } else { // Si no hay sesión activa, redirige al inicio de sesión
            return redirect()->to('login'); // Asegúrate de ajustar la ruta correcta
        }
    }

    public function cargar_user(){
        if ($this->request->getMethod() === 'POST') {
            $titulo = [
                'titulo' => 'Agregar Usuario',
                't_head' => 'ADM - CRUD',
                'session' =>  $this->session
            ];
            $rules = [ // Defino las reglas de validacion
                'nombre_usuario' => 'required|min_length[5]|max_length[20]',
                'nombre_user' => 'required|min_length[3]',
                'apellido_user' => 'required|min_length[3]',
                'correo_user' => 'required|valid_email',
                'contrasena_user' => 'trim|required|min_length[6]|max_length[25]',
                'tel_user' => 'required|numeric|min_length[8]|max_length[15]',
                'direccion_user' => 'required|max_length[15]',
            ];
            $this->validator->setRules($rules); //seteo las reglas
            $titulo['validation'] = $this->validator;
            $user_name =  $this->request->getPost('nombre_usuario'); //Recupero y guardo el nombre_usuario
            $correo = $this->request->getPost('correo_user'); // Recupero el correo

            $existe_user = $this->userModel->usuario_en_uso($correo, $user_name);
            if ($this->validate($rules) && !$existe_user) {

                $contrasena_hasheada = ''; //Inicializacion de las varariables
                $pass = '';                //Inicializacion de las varariables
                $pass = $this->request->getPost('contrasena_user'); //Recupero la contrase;a del formulario igresado x el usuario
                $contrasena_hasheada = $this->hashPassword($pass); // guardo la Password haseada con la funcion que lo hace, le paso el input del usuario.

                $data = [ //Creo un array con los datos que voy a insertar en la tabla, todos los inputs del form tanto 
                    'nombre_usuario' => $user_name,
                    'nombre_user' => $this->request->getPost('nombre_user'),
                    'apellido_user' => $this->request->getPost('apellido_user'),
                    'correo_user' => $correo,
                    'contrasena_user' => $contrasena_hasheada,
                    'tel_user' => $this->request->getPost('tel_user'),
                    'direccion_user' => $this->request->getPost('direccion_user'),
                    'nivel_user' => 0, // Puedes ajustar esto según tus necesidades (0-Usuario || 1-Administrador)
                    'status_user' => 1, // Activo por defecto
                ];
                $this->userModel->save($data); //Agrego/Inserto los $datos en la tabla.
                $this->session->setFlashdata('success_message', 'Usuario agregado correctamente'); //Mensaje de exito para Registro
                //$this->session->destroy();
                //return view('front/layouts/login_contenido', $titulo);
                return redirect()->to('add_user');

            }else{
                $this->user_or_correo_error($correo, $user_name);
                $titulo['validation'] = $this->validator;
                $titulo['session'] = $this->session;
                return view('front/layouts/add_user_contenido', $titulo);
            }
        }
    }

    public function edit_user($id)
    {
        $titulo = [
            'titulo' => 'Editar Usuario',
            't_head' => 'ADM - CRUD',
            'session' =>  $this->session
        ];
        
        $user = $this->userModel->get_user_id($id);
        $titulo['user'] = $user;
        return view('front/layouts/edit_user_contenido', $titulo);
    }

    public function update_user(){
        if ($this->request->getMethod() === 'POST'){
            $titulo = [
                'titulo' => 'Editar Usuario',
                't_head' => 'ADM - CRUD',
                'session' =>  $this->session
            ];
            $rules = [ // Defino las reglas de validacion
                'nombre_usuario' => 'required|min_length[5]|max_length[20]',
                'nombre_user' => 'required|min_length[3]',
                'apellido_user' => 'required|min_length[3]',
                'correo_user' => 'required|valid_email',
                'tel_user' => 'required|numeric|min_length[8]|max_length[15]',
                'direccion_user' => 'required|max_length[15]',
            ];

            if (!empty($this->request->getPost('contrasena_user'))) {
                $rules['contrasena_user'] = 'trim|required|min_length[6]|max_length[25]';
            }

            $this->validator->setRules($rules); //seteo las reglas
            $titulo['validation'] = $this->validator;

            if ($this->validate($rules)){
                $id = $this->request->getPost('id_user');

                $datos = [ //Creo un array con los datos que voy a insertar en la tabla, todos los inputs del form tanto 
                    'nombre_usuario' => $this->request->getPost('nombre_usuario'),
                    'nombre_user' => $this->request->getPost('nombre_user'),
                    'apellido_user' => $this->request->getPost('apellido_user'),
                    'correo_user' => $this->request->getPost('correo_user'),
                    'tel_user' => $this->request->getPost('tel_user'),
                    'direccion_user' => $this->request->getPost('direccion_user'),
                    'nivel_user' => 0, // Puedes ajustar esto según tus necesidades (0-Usuario || 1-Administrador)
                    'status_user' => 1, // Activo por defecto
                ];

                if (!empty($this->request->getPost('contrasena_user'))) {
                    $contrasena_hasheada = ''; //Inicializacion de las varariables
                    $pass = '';                //Inicializacion de las varariables
                    $pass = $this->request->getPost('contrasena_user'); //Recupero la contrase;a del formulario igresado x el usuario
                    $contrasena_hasheada = $this->hashPassword($pass); // guardo la Password haseada con la funcion que lo hace, le paso el input del usuario.
                    $datos['contrasena_user'] = $contrasena_hasheada;
                }

                $this->userModel->update_user($id, $datos);
                $this->session->setFlashdata('success_message', 'Usuario editado correctamente');
                return redirect()->to('dashboard');
            }else{
                return view('front/layouts/edit_user_contenido', $titulo); 
            }
        }
    }

    public function delete_user($id){
         if ($this->session->logged_in) {
            $level_user = $this->session->get('nivel');
            if ($level_user == 0) {
                return redirect()->to('login');
            } else {
                $titulo = [ //Array de relaciones de clave-valor 
                    'titulo' => 'Bienvenido ' . $this->session->get('nombre'),
                    't_head' => 'ADM - CRUD ',
                    'nivel' => $level_user,
                    'session' => $this->session->get('session'),
                    'users' => $this->userModel->all_users(),
                ];
                $exist_user = $this->userModel->user_exists_id($id);
                if(!$exist_user){
                    $this->session->setFlashdata('error_message', 'Usuario no encontrado');
                    return redirect()->to('dashboard');
                }

                $this->userModel->update($id, ['status_user' => 0]);
                $this->userModel->delete($id);
                $this->session->setFlashdata('success_message', 'Usuario Eliminado');
                return redirect()->to('dashboard');
            }
        } else { // Si no hay sesión activa, redirige al inicio de sesión
            return redirect()->to('login'); // Asegúrate de ajustar la ruta correcta
        }
    }


}

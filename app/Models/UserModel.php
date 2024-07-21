<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{

    protected $table      = 'usuarios';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; //array
    protected $useSoftDeletes = true;

    protected $allowedFields = [
    'nombre_usuario','nombre_user','apellido_user',
    'correo_user','contrasena_user','tel_user',
    'direccion_user','nivel_user','status_user'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaUp_user';
    protected $updatedField  = 'fechaEdit_user';
    protected $deletedField  = 'fechaDeath_user';

    public function all_users(){
        return $this->where('status_user', 1)->findAll();
    }

    public function user_exists($correo){
        $query = $this->where('correo_user', $correo)->get();
        return $query->getNumRows() > 0;
    }
    public function user_exists_id($id){
        $query = $this->where('id_user', $id)->get();
        return $query->getNumRows() > 0;
    }

    public function getUser($correo){
        return $this->where('correo_user', $correo)->first();
    }

    public function get_user_id($id){
        return $this->where('id_user', $id)->first();
    }

    public function get_password($correo){
        $this->select('contrasena_user');
        $this->where('correo_user',$correo);

        $query = $this->get();
        if($query->getNumRows() > 0){
            $row = $query->getRow();
            return $row->contrasena_user;
        } else {
            return false;
        }
    }

    public function correo_en_uso($correo){
        $query = $this->where('correo_user', $correo)->get();
        return $query->getNumRows() > 0;// Si el número de filas devuelto por la consulta es mayor que cero, 
        //significa que el correo ya están en uso, y podemos devolver true. 
        //De lo contrario, devolvemos false
    }

    public function usuario_en_uso($correo, $nombre_usuario){
        $query = $this->where('correo_user', $correo)
                      ->orWhere('nombre_usuario', $nombre_usuario)
                      ->get();
        return $query->getNumRows() > 0;// Si el número de filas devuelto por la consulta es mayor que cero, 
                                        //significa que el correo o el nombre de usuario ya están en uso, y podemos devolver true. 
                                        //De lo contrario, devolvemos false
    }

    public function user_en_uso($correo, $nombre_usuario){
        $query = $this->where('nombre_usuario', $nombre_usuario)
                      ->get();
        return $query->getNumRows() > 0;// Si el número de filas devuelto por la consulta es mayor que cero, 
                                        //significa que el nombre de usuario ya están en uso, y podemos devolver true. 
                                        //De lo contrario, devolvemos false
    }

    public function verificar_credenciales($correo, $contrasena){
        $query = $this->where('correo_user', $correo)->get();
        if($query->getNumRows() > 0){
            $row = $query->getRow();
            $pass_hash = $row->contrasena_user;
            if(password_verify($contrasena, $pass_hash)){//Verificamos que coincidan
                return true;// Credenciales válidas
            }
        }
        return false;// Credenciales Invalidas
    }


    public function update_user($id, $datos){

        return $this->update($id, $datos);
    }
}
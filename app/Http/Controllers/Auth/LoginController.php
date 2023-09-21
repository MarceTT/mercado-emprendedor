<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use App\Model\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest' , ['only' => 'showLoginForm']);
    }
 
    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {

        $credentials = $this->validate(request(),[
            'usuario' => 'required|string',
            'password' => 'required|string'
            ]);

            $respuesta = array(
                'estado' => false,
                'respuesta' => ''
                );
        
                $user = $request->input('usuario');
                $pass = $request->input('password');

                $ldap_serv = 'ldap://10.100.0.124';
                $ldap_port = '389';
                $lc = ldap_connect($ldap_serv, $ldap_port);
                ldap_set_option($lc, LDAP_OPT_REFERRALS, 0);
                ldap_set_option($lc, LDAP_OPT_PROTOCOL_VERSION, 3);
                $ldapbind = @ldap_bind($lc,$user.'@udalba.local',$pass);
        
                if ($ldapbind == false) {
                    return back()->with('error', 'Usuario o Clave incorrectos');   
                }else{  
        
                     $filter="(SAMAccountName=".trim($user).")"; 
                     $result = ldap_search($lc, "dc=udalba, dc=local" ,$filter) or die ("Error en la busqueda");
                     $info = ldap_get_entries($lc, $result);
        
                     $mail = $user.'@udalba.cl';
        
                    $total = Usuario::where('email','=',$mail)->count();
                    if($total==0){
        
                    $insert = new Usuario;
                    $insert->name = $info[0]['cn'][0];
                    $insert->email = $mail;
                    $insert->password = Hash::make($pass);
                    $insert->access = 0;
                    $insert->save();
        
                     return back()->with('success', 'Usuario registrado,contacte al administrador del sistema para activar su cuenta');
        
                    }else{
                    $total2 = Usuario::where('email','=',$mail)->where('access','=',1)->count();
        
                    if($total2>0){

                        $cambioclave = Usuario::where('email','=',$mail)->first();
                        if($cambioclave->id>0){
                            // Seteamos un nuevo titulo
                            $cambioclave->password = Hash::make($pass);
                          
                            // Guardamos en base de datos
                            $cambioclave->save();
                         }
                         
        
                        $logueo = array(
                        'email' => $mail,
                        'password' => $pass);
                        
                        
                         if(Auth::attempt($logueo)){

                            //date_default_timezone_set('America/Santiago');
                            //$vitacora = new Vitacora;
                            //$vitacora->nombre = $info[0]['cn'][0];
                            //$vitacora->email = $mail;
                            //$vitacora->fecha_entrada = date("m/d/Y H:i:s");
                            //$vitacora->save();

        
                            return redirect('/admin');
                            //echo "Estas loegueado";
                            //exit();
        
                         }else{
                            return back()->with('error', 'Usuario o Clave incorrecto');
                         }
        
        
                    }else{
                        return back()->with('error', 'Usuario o Clave incorrecto');
                    }
                        
                    }
        
                    
                    
                    
        
                        
                } 
    }


    public function logout()
    {
    Auth::logout();
    return redirect('/login');
    }
}

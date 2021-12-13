<?php

require_once('players.php');
//require_once('view_MQ.php');
class controller
{

    //rutes o esdeveniments possibles
    //view1: nom i edat
    //view2: nom i alçada
    private $peticions = 'login';


    public function handler()
    {
        $usuario = new usuario();
        //$pelicula = new pelicula();
        //$valoracio_pelicula = new valoracio_pelicula();
        //$partida = new partida();
        //$partida_jugada = new partida_jugada();
        //$vista = new view();

        // Què em demanen?
        $event = 'inici';

        $uri = $_SERVER['REQUEST_URI'];
        echo $uri;



        switch ($event) {
            case 'view1':
                $dades = $usuario->selectAll(array("nom", "edat"));
                break;

            //case 'signup':
             //   $dades = $this->recollirDadesPost();
               // echo $usuario->introduirUsuari($dades);
                //break;
        }
    }

    private function recollirDadesPost()
    {

          if (isset($_POST['usuario'])) {
            $dadesForm = array(
                'usuario' => $_POST['usuario'],
                'passwd' => $_POST['passwd']
            );
        }

        return $dadesForm;
    }

    public function login(){
        $usuari_login = new usuario();
        $dadesPOST = $this->recollirDadesPost();
        $resposta = $usuari_login->comprovarLogin($dadesPOST);
        return $resposta;
    }
}
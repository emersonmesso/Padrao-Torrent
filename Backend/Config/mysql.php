<?php
class mysql{
    public $sql;
    public function conecta(){
        $host = "localhost";
        $user = "padraoto_emersonmesso";
        $pass = "messo18101995";
        $banco = "padraoto_torrent";
        //
        $this->sql = new mysqli($host, $user, $pass, $banco);
        //
    }
}
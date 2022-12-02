<?php
    interface CRUD{
        public function crear();
        public function actualizar();
        public function borrar();
        public function leer_todos();
        public function leer_uno_id();
        public function leer_varios_campo();
    }
?>
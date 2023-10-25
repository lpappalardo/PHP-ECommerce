<?php
    class Generos{
        public $id;
        public $nombre;

        public function  traerGeneros() {
    
            $json = file_get_contents("../data/generos.json");
            $jsonData = json_decode($json);
    
            $generos = [];
    
            foreach ($jsonData as $value) {
                $genero = new self();
                $genero->id = $value->id;
                $genero->nombre = $value->nombre;
    
                $generos[] = $genero;
            }
    
            return $generos;
        }
    }
?>
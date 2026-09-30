<?php
declare(strict_types=1);
class Nodo {
    public function __construct(
        public int $id,
        public string $nombre,
        public float $precio,
        public int $stock,
        public ?Nodo $siguiente = null, 
        public ?Nodo $anterior = null, 
    ){}
}
?>
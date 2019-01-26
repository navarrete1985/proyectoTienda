<?php
/*
id, nombre, articulos
*/

/**
 * @Entity @Table(name="categoria")
 */
class Categoria {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string", nullable=false, length=50)
     */
    private $nombre;
    
    /** 
     * @OneToMany(targetEntity="CategoriaArticulo", mappedBy="categoria") 
    */
    private $articulos;
    
}
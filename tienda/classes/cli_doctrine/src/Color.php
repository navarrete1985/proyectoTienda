<?php
/*
id, imgsrc, nombre
*/

/**
 * @Entity @Table(name="color")
 **/
class CategoriaArticulo {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string", legth=255, nullable=false)
     */
    private $imgsrc;
    
    /**
     * @Column(type="string", legth=30)
     */
    private $nombre;
    
    /**
     * @OneToMany(targetEntity="ColorArticulo", mappedBy="color")
     */
    private $articulos;
    
}
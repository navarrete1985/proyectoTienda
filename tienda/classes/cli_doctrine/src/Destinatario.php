<?php
/*
id, nombre, articulos
*/

/**
 * @Entity @Table(name="destinatario")
 */
class Complementos {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string", nullable=false, legth=50)
     */
    private $nombre;
    
    /**
     * @OneToMany(targetEntity="DestinatarioArticulo", mappedBy="destinatario")
     */
    private $articulos;

}
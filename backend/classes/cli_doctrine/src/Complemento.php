<?php
/*
id, dimensiones, coleccion, numbolsillos, otrascarcteristicas
*/

/**
 * @Entity @Table(name="complemento")
 */
class Complementos {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="integer", nullable=true)
     */
    private $alto;
    
    /**
     * @Column(type="integer", nullable=true)
     */
    private $ancho;
    
    /**
     * @Column(type="integer", nullable=true)
     */
    private $fondo;
    
    /**
     * @Column(type="string", length=100, nullable=false, options={"default" : "indefinido"})
     */
    private $coleccion;
    
    /**
     * @Column(type="decimal", nullable=true, precision=2, scale=2) 
     */
    private $numbolsillos;

}
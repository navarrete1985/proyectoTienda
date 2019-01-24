<?php
/*
id, precio, material, peso, referencia, estampado, detalle, cierre, pais de fabricación, color, categoria, destinatario
*/

/**
 * @Entity @Table(name="articulo")
 */
class Articulo {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="decimal", nullable=false, precision=7, scale=2)
     */
    private $precio;
    
    /**
     * @Column(type="string", length=100, nullable=false, options={"default" : "indefinido"})
     */
    private $material;
    
    /**
     * @Column(type="decimal", nullable=true, precision=2, scale=2) 
     */
    private $peso;

    /**
     * @Column(type="string", length=18, nullable=false)
     */
    private $referencia;
    
    /**
     * @Column(type="string", length=30, nullable=true)
     */
    private $estampando;
    
    /**
     * @Column(type="text", nullable=true)
     */
    private $detalle;
    
    /**
     * @Column(type="string", length=30, nullable=false)
     */
    private $cierre;
    
    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $otrascaracteristicas;
    
    /**
     * @Column(type="string", nullable=false, length=30, options={"default" : "indefinido"}) 
     */
    private $paisfabricacion;
    
    /** 
     * @OneToMany(targetEntity="CategoriaArticulo", mappedBy="articulo") 
    */
    private $categorias;
    
    /** 
     * @OneToMany(targetEntity="DestinatarioArticulo", mappedBy="articulo") 
    */
    private $destinatarios;
    
    /** 
     * @OneToMany(targetEntity="Color", mappedBy="articulo") 
    */
    private $colores;
    
}
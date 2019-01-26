<?php
/*
id, precio, material, peso, referencia, estampado, detalle, cierre, pais de fabricación, color, categoria, destinatario

id, marca, modelo, precio, material, peso, referencia, estampado, detalle, cierre, (num-desde, num-hasta, stock), tipo, paisfabricacion, z{altura, temporada, formatacon,
puntera}   c{dimensiones, coleccion, numbolsillos, otrascaracteristicas} externas=>colores, caracteristicas, destinatarios, stock
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
     * @Column(type="string", length=50, nullable=false)
     */
    private $marca;
    
    /**
     * @Column(type="string", legth=100, nullable=true)
     */
    private $modelo;
    
    /**
     * @Column(type="decimal", nullable=false, precision=7, scale=2)
     */
    private $precio;
    
    /**
     * @Column(type="string", length=100, nullable=true, options={"default" : "indefinido"})
     */
    private $material;
    
    /**
     * @Column(type="decimal", nullable=true, precision=2, scale=2) 
     */
    private $peso;

    /**
     * @Column(type="string", length=18, nullable=false, unique=true)
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
     * @Column(type="string", length=30, nullable=true, options={"default" : "indeterminado"})
     */
    private $cierre;
    
    
    
    /*
                -OTRA POSIBILIDAD PARA NO CONTEMPLAR EL STOCK COMO ENTIDAD-
    num-desde
    num-hasta
    stock
    */
    
    
    
    /**
     * @Column(type="decimal", nullable=false, precision=2, options={"default" : 0})
     */
    private $tipo;/*Se podrán elegir entre Articulo::ZAPATO / Articulo::COMPLEMENTO*/
    
    /**
     * @Column(type="string", nullable=false, length=30, options={"default" : "indefinido"}) 
     */
    private $paisfabricacion;
    
    /*--------------------------------------CARACTERÍSTICAS DE ZAPATO--------------------------------------*/
    /**
     * @Column(type="decimal", nullable=true, precision=2, options={"default" : 0})
     */
    private $altura;
    
    /**
     * @Column(type="decimal", nullable=true, precision=1, options={"default" : 0})
     */
    private $temporada;
    
    /**
     * @Column(type="string", nullable=true, legth=50)
     */
    private $formatacon;
    
    /**
     * @Column(type="string", nullable=true, legth=50)
     */
    private $puntera;
    
    /*--------------------------------------CARACTERÍSTICAS DE COMPLEMENTO--------------------------------------*/
    /**
     * @Column(type="decimal", nullable=true, precision=3, options={"default" : 0})
     */
    private $alto;
    
    /**
     * @Column(type="decimal", nullable=true, precision=3, options={"default" : 0})
     */
    private $ancho;
    
    /**
     * @Column(type="decimal", nullable=true, precision=3, options={"default" : 0})
     */
    private $profundo;
    
    /**
     * @Column(type="string", nullable=true, legth=50)
     */
    private $coleccion;
    
    /**
     * @Column(type="decimal", nullable=true, precision=2, options={"default" : 0})
     */
    private $numbolsillos;
    
    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $otrascaracteristicas;
    
    /*--------------------------------------RELACIONES CON OTRAS TABLAS--------------------------------------*/
    
    /** 
     * @OneToMany(targetEntity="Color", mappedBy="articulo") 
    */
    private $colores;
    
    /** 
     * @OneToMany(targetEntity="CategoriaArticulo", mappedBy="articulo") 
    */
    private $categorias;
    
    /** 
     * @OneToMany(targetEntity="DestinatarioArticulo", mappedBy="articulo") 
    */
    private $destinatarios;
    
    /** 
     * @OneToMany(targetEntity="Stock", mappedBy="articulo") 
    */
    private $stocks;
    
    /**
     * @OneToMany(targetEntity="Detalle", mappedBy="articulo") 
     */
     private $detalles;
    
}
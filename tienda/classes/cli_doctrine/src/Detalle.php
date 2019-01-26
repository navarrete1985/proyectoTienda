<?php
//id, pedido, zapato, número, cantidad, precio
//id, cantidad, talla, precio (pedido, articulo, color)

/**
 * @Entity @Table(name="detalle",
 *  uniqueConstraints={@UniqueConstraint(name="detart", columns={"idpedido", "idarticulo", idcolor})})
 */
class Detalle {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="smallint", nullable=false, precision=2) 
     */
    private $cantidad;
    
    /**
     * @Column(type="smallint", nullable=false, precision=2) 
     */
    private $talla;
    
    /**
     * @Column(type="decimal", nullable=false, precision=7, scale=2) 
     */
    private $precio;
    
    /*-------------------------------------RELACIONES--------------------------------*/
    /**
     * @ManyToOne(targetEntity="Pedido", inversedBy="detalles")
     * @JoinColumn(name="idpedido", referencedColumnName="id", nullable=false)
    */
    private $pedido;
    
    /**
     * @ManyToOne(targetEntity="Articulo", inversedBy="detalles")
     * @JoinColumn(name="idzapato", referencedColumnName="id", nullable=false)
    */
    private $articulo;
    
    /**
     * @ManyToOne(targetEntity="Color", inversedBy="detalles")
     * @JoinColumn(name="idcolor", referencedColumnName="id", nullable=false)
    */
    private $color;
    
    
}
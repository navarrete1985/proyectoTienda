<?php
//talla, stock, (id_color, id_articulo)

/**
 * @Entity @Table(name="stock",
 *  uniqueConstraints={@UniqueConstraint(name="stock", columns={"idarticulo", "idcolor", "talla"})})
 */
class Stock {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="decimal", nullable=false, precision=3, options={"default" : -1})
     */
    private $talla;
    
    /*-------------------------------------RELACIONES--------------------------------*/
    
    /**
     * @ManyToOne(targetEntity="Articulo", inversedBy="stocks")
     * @JoinColumn(name="idarticulo", referencedColumnName="id", nullable=false)
    */
    private $articulo;
    
    /**
     * @ManyToOne(targetEntity="Color", inversedBy="stocks")
     * @JoinColumn(name="idcolor", referencedColumnName="id", nullable=false) 
     */
     private $color;
    
}
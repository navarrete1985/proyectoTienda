<?php
/*
id, color, articulo
*/

/**
 * @Entity @Table(name="colorarticulo",
 *  uniqueConstraints={@UniqueConstraint(name="color", columns={"idcolor", "idarticulo"})})
 **/
class ColorArticulo {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Color", inversedBy="articulos")
     * @JoinColumn(name="idcolor", referencedColumnName="id", nullable=false)
     */
    private $color;

    /**
     * @ManyToOne(targetEntity="Articulo", inversedBy="colores")
     * @JoinColumn(name="idarticulo", referencedColumnName="id", nullable=false)
     */
    private $articulo;
    
}
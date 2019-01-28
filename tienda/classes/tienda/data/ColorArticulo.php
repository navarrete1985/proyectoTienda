<?php
/*
id, color, articulo
*/

namespace tienda\data;

/**
 * @Entity @Table(name="colorarticulo",
 *  uniqueConstraints={@UniqueConstraint(name="color", columns={"idcolor", "idarticulo"})})
 **/
class ColorArticulo {

    use \tienda\common\Common;

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
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set color
     *
     * @param \Color $color
     *
     * @return ColorArticulo
     */
    public function setColor(\Color $color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set articulo
     *
     * @param \Articulo $articulo
     *
     * @return ColorArticulo
     */
    public function setArticulo(\Articulo $articulo)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return \Articulo
     */
    public function getArticulo()
    {
        return $this->articulo;
    }
}

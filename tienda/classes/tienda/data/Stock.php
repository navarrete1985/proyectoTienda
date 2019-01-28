<?php
//talla, stock, (id_color, id_articulo)

namespace tienda\data;

/**
 * @Entity @Table(name="stock",
 *  uniqueConstraints={@UniqueConstraint(name="stock", columns={"idarticulo", "idcolor", "talla"})})
 */
class Stock {

    use \tienda\common\Common;

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
     * Set talla
     *
     * @param string $talla
     *
     * @return Stock
     */
    public function setTalla($talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Get talla
     *
     * @return string
     */
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Set articulo
     *
     * @param \Articulo $articulo
     *
     * @return Stock
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

    /**
     * Set color
     *
     * @param \Color $color
     *
     * @return Stock
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
}

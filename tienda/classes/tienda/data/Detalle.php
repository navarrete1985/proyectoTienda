<?php
//id, pedido, zapato, número, cantidad, precio
//id, cantidad, talla, precio (pedido, articulo, color)

namespace tienda\data;

/**
 * @Entity @Table(name="detalle",
 *  uniqueConstraints={@UniqueConstraint(name="detart", columns={"idpedido", "idarticulo", "idcolor"})})
 */
class Detalle {

    use \tienda\common\Common;

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
     * @JoinColumn(name="idarticulo", referencedColumnName="id", nullable=false)
    */
    private $articulo;
    
    /**
     * @ManyToOne(targetEntity="Color", inversedBy="detalles")
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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Detalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set talla
     *
     * @param integer $talla
     *
     * @return Detalle
     */
    public function setTalla($talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Get talla
     *
     * @return integer
     */
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Detalle
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set pedido
     *
     * @param \Pedido $pedido
     *
     * @return Detalle
     */
    public function setPedido(\Pedido $pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get pedido
     *
     * @return \Pedido
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set articulo
     *
     * @param \Articulo $articulo
     *
     * @return Detalle
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
     * @return Detalle
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

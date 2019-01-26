<?php
/*
id, imgsrc, nombre, articulos
*/

/**
 * @Entity @Table(name="color")
 **/
class Color {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string", length=255, nullable=false)
     */
    private $imgsrc;
    
    /**
     * @Column(type="string", length=50)
     */
    private $nombre;
    
    /**
     * @OneToMany(targetEntity="ColorArticulo", mappedBy="color")
     */
    private $articulos;
    
    /**
     * @OneToMany(targetEntity="Detalle", mappedBy="color")
     */
    private $detalles;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articulos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set imgsrc
     *
     * @param string $imgsrc
     *
     * @return Color
     */
    public function setImgsrc($imgsrc)
    {
        $this->imgsrc = $imgsrc;

        return $this;
    }

    /**
     * Get imgsrc
     *
     * @return string
     */
    public function getImgsrc()
    {
        return $this->imgsrc;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Color
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add articulo
     *
     * @param \ColorArticulo $articulo
     *
     * @return Color
     */
    public function addArticulo(\ColorArticulo $articulo)
    {
        $this->articulos[] = $articulo;

        return $this;
    }

    /**
     * Remove articulo
     *
     * @param \ColorArticulo $articulo
     */
    public function removeArticulo(\ColorArticulo $articulo)
    {
        $this->articulos->removeElement($articulo);
    }

    /**
     * Get articulos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticulos()
    {
        return $this->articulos;
    }

    /**
     * Add detalle
     *
     * @param \Detalle $detalle
     *
     * @return Color
     */
    public function addDetalle(\Detalle $detalle)
    {
        $this->detalles[] = $detalle;

        return $this;
    }

    /**
     * Remove detalle
     *
     * @param \Detalle $detalle
     */
    public function removeDetalle(\Detalle $detalle)
    {
        $this->detalles->removeElement($detalle);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
}

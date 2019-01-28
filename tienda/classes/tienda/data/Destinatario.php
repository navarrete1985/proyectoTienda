<?php
/*
id, nombre, articulos
*/

namespace tienda\data;

/**
 * @Entity @Table(name="destinatario")
 */
class Destinatario {

    use \tienda\common\Common;

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string", nullable=false, length=50)
     */
    private $nombre;
    
    /**
     * @OneToMany(targetEntity="DestinatarioArticulo", mappedBy="destinatario")
     */
    private $articulos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articulos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Destinatario
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
     * @param \DestinatarioArticulo $articulo
     *
     * @return Destinatario
     */
    public function addArticulo(\DestinatarioArticulo $articulo)
    {
        $this->articulos[] = $articulo;

        return $this;
    }

    /**
     * Remove articulo
     *
     * @param \DestinatarioArticulo $articulo
     */
    public function removeArticulo(\DestinatarioArticulo $articulo)
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
}

<?php
/*
id, nombre, articulos
*/

namespace tienda\data;

/**
 * @Entity @Table(name="categoria")
 */
class Categoria {

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
     * @OneToMany(targetEntity="CategoriaArticulo", mappedBy="categoria") 
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
     * @return Categoria
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
     * @param \CategoriaArticulo $articulo
     *
     * @return Categoria
     */
    public function addArticulo(CategoriaArticulo $articulo)
    {
        $this->articulos[] = $articulo;

        return $this;
    }

    /**
     * Remove articulo
     *
     * @param \CategoriaArticulo $articulo
     */
    public function removeArticulo(CategoriaArticulo $articulo)
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

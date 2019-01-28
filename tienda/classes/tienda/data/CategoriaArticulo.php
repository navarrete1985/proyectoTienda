<?php
/*
id, categoria, articulo
*/

namespace tienda\data;

/**
 * @Entity @Table(name="categoriaarticulo",
 *  uniqueConstraints={@UniqueConstraint(name="catart", columns={"idcategoria", "idarticulo"})})
 **/
class CategoriaArticulo {

    use \tienda\common\Common;
    
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Categoria", inversedBy="articulos")
     * @JoinColumn(name="idcategoria", referencedColumnName="id", nullable=false)
     */
    private $categoria;

    /**
     * @ManyToOne(targetEntity="Articulo", inversedBy="categorias")
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
     * Set categoria
     *
     * @param \Categoria $categoria
     *
     * @return CategoriaArticulo
     */
    public function setCategoria(\Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set articulo
     *
     * @param \Articulo $articulo
     *
     * @return CategoriaArticulo
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

<?php
/*
id, nombre
*/

/**
 * @Entity @Table(name="categoriaarticulo",
 *  uniqueConstraints={@UniqueConstraint(name="catart", columns={"idcategoria", "idarticulo"})})
 **/
class CategoriaArticulo {

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
    
}
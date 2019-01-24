<?php
/*
id, nombre
*/

/**
 * @Entity @Table(name="destinatarioarticulo",
 *  uniqueConstraints={@UniqueConstraint(name="destart", columns={"iddestinatario", "idarticulo"})})
 **/
class DestinatarioArticulo {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Destinatario", inversedBy="articulos")
     * @JoinColumn(name="iddestinatario", referencedColumnName="id", nullable=false)
     */
    private $destinatario;

    /**
     * @ManyToOne(targetEntity="Articulo", inversedBy="destinatarios")
     * @JoinColumn(name="idarticulo", referencedColumnName="id", nullable=false)
     */
    private $articulo;
    
}
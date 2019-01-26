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
     * Set destinatario
     *
     * @param \Destinatario $destinatario
     *
     * @return DestinatarioArticulo
     */
    public function setDestinatario(\Destinatario $destinatario)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get destinatario
     *
     * @return \Destinatario
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set articulo
     *
     * @param \Articulo $articulo
     *
     * @return DestinatarioArticulo
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

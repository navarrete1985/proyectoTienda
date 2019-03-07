<?php
//id, fechaexp, numtarjeta, fechavalidez, cvv (detalles, usuario)

namespace tienda\data;

/**
 * @Entity @Table(name="pedido")
 */
class Pedido {

    use \tienda\common\Common;

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="datetime", nullable=false)
     */
    private $fechaexp;
    
    /**
     * @Column(type="string", length=16, nullable=false)
     */
    private $numtarjeta;
    
    /**
     * @Column(type="string", length=5, nullable=false)
     */
    private $fechavalidez;
    
    /**
     * @Column(type="string", length=3, nullable=false)
     */
    private $cvv;
    
    /*-------------------------------------RELACIONES--------------------------------*/
    
    /**
     * @ManyToOne(targetEntity="Usuario", inversedBy="pedidos")
     * @JoinColumn(name="idusuario", referencedColumnName="id", nullable=false)
    */
    private $usuario;
    
    /**
     * @OneToMany(targetEntity="Detalle", mappedBy="pedido") 
     */
     private $detalles;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fechaexp = new \DateTime();
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
     * Set fechaexp
     *
     * @param \DateTime $fechaexp
     *
     * @return Pedido
     */
    public function setFechaexp($fechaexp)
    {
        $this->fechaexp = $fechaexp;

        return $this;
    }

    /**
     * Get fechaexp
     *
     * @return \DateTime
     */
    public function getFechaexp()
    {
        return $this->fechaexp;
    }

    /**
     * Set numtarjeta
     *
     * @param string $numtarjeta
     *
     * @return Pedido
     */
    public function setNumtarjeta($numtarjeta)
    {
        $this->numtarjeta = $numtarjeta;

        return $this;
    }

    /**
     * Get numtarjeta
     *
     * @return string
     */
    public function getNumtarjeta()
    {
        return $this->numtarjeta;
    }

    /**
     * Set fechavalidez
     *
     * @param string $fechavalidez
     *
     * @return Pedido
     */
    public function setFechavalidez($fechavalidez)
    {
        $this->fechavalidez = $fechavalidez;

        return $this;
    }

    /**
     * Get fechavalidez
     *
     * @return string
     */
    public function getFechavalidez()
    {
        return $this->fechavalidez;
    }

    /**
     * Set cvv
     *
     * @param string $cvv
     *
     * @return Pedido
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }

    /**
     * Get cvv
     *
     * @return string
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Set usuario
     *
     * @param \Usuario $usuario
     *
     * @return Pedido
     */
    public function setUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Add detalle
     *
     * @param \Detalle $detalle
     *
     * @return Pedido
     */
    public function addDetalle(Detalle $detalle)
    {
        $this->detalles[] = $detalle;

        return $this;
    }

    /**
     * Remove detalle
     *
     * @param \Detalle $detalle
     */
    public function removeDetalle(Detalle $detalle)
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

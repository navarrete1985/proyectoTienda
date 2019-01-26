<?php
//id, fechaexp, numtarjeta, fechavalidez, cvv (detalles, usuario)

/**
 * @Entity @Table(name="pedido")
 */
class Pedido {

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
    
}
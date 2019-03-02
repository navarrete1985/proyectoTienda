<?php
/*
id, precio, material, peso, referencia, estampado, detalle, cierre, pais de fabricación, color, categoria, destinatario

id, marca, modelo, precio, material, peso, referencia, estampado, detalle, cierre, (num-desde, num-hasta, stock), tipo, paisfabricacion, z{altura, temporada, formatacon,
puntera}   c{dimensiones, coleccion, numbolsillos, otrascaracteristicas} externas=>colores, caracteristicas, destinatarios, stock
*/

namespace tienda\data;

/**
 * @Entity @Table(name="articulo")
 */
class Articulo {

    use \tienda\common\Common;
    
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $marca;
    
    /**
     * @Column(type="string", length=100, nullable=true)
     */
    private $modelo;
    
    /**
     * @Column(type="decimal", nullable=false, precision=7, scale=2)
     */
    private $precio;
    
    /**
     * @Column(type="string", length=100, nullable=true, options={"default" : "indefinido"})
     */
    private $material;
    
    /**
     * @Column(type="decimal", nullable=true, precision=2, scale=2) 
     */
    private $peso;

    /**
     * @Column(type="string", length=18, nullable=false, unique=true)
     */
    private $referencia;
    
    /**
     * @Column(type="string", length=30, nullable=true)
     */
    private $estampando;
    
    /**
     * @Column(type="text", nullable=true)
     */
    private $detalle;
    
    /**
     * @Column(type="string", length=30, nullable=true, options={"default" : "indeterminado"})
     */
    private $cierre;
    
    /**
     * @Column(type="blob", nullable=true)
     */
    private $img;
    
    /*
                -OTRA POSIBILIDAD PARA NO CONTEMPLAR EL STOCK COMO ENTIDAD-
    num-desde
    num-hasta
    stock
    */
    
    
    
    /**
     * @Column(type="decimal", nullable=false, precision=2, options={"default" : 0})
     */
    private $tipo;/*Se podrán elegir entre Articulo::ZAPATO = 0 / Articulo::COMPLEMENTO = 1*/
    
    /**
     * @Column(type="string", nullable=false, length=30, options={"default" : "indefinido"}) 
     */
    private $paisfabricacion;
    
    /*--------------------------------------CARACTERÍSTICAS DE ZAPATO--------------------------------------*/
    /**
     * @Column(type="decimal", nullable=true, precision=2, options={"default" : 0})
     */
    private $altura;
    
    /**
     * @Column(type="decimal", nullable=true, precision=1, options={"default" : 0})
     */
    private $temporada;
    
    /**
     * @Column(type="string", nullable=true, length=50)
     */
    private $formatacon;
    
    /**
     * @Column(type="string", nullable=true, length=50)
     */
    private $puntera;
    
    /*--------------------------------------CARACTERÍSTICAS DE COMPLEMENTO--------------------------------------*/
    /**
     * @Column(type="decimal", nullable=true, precision=3, options={"default" : 0})
     */
    private $alto;
    
    /**
     * @Column(type="decimal", nullable=true, precision=3, options={"default" : 0})
     */
    private $ancho;
    
    /**
     * @Column(type="decimal", nullable=true, precision=3, options={"default" : 0})
     */
    private $profundo;
    
    /**
     * @Column(type="string", nullable=true, length=50)
     */
    private $coleccion;
    
    /**
     * @Column(type="decimal", nullable=true, precision=2, options={"default" : 0})
     */
    private $numbolsillos;
    
    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $otrascaracteristicas;
    
    /*--------------------------------------RELACIONES CON OTRAS TABLAS--------------------------------------*/
    
    /** 
     * @OneToMany(targetEntity="Color", mappedBy="articulo") 
    */
    private $colores;
    
    /** 
     * @OneToMany(targetEntity="CategoriaArticulo", mappedBy="articulo") 
    */
    private $categorias;
    
    /** 
     * @OneToMany(targetEntity="DestinatarioArticulo", mappedBy="articulo") 
    */
    private $destinatarios;
    
    /** 
     * @OneToMany(targetEntity="Stock", mappedBy="articulo") 
    */
    private $stocks;
    
    /**
     * @OneToMany(targetEntity="Detalle", mappedBy="articulo") 
     */
     private $detalles;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->destinatarios = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stocks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getImg() {
        return $this->img;
    }
    
    public function setImg($img) {
        $this->img = $img;
        
        return $this;
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
     * Set marca
     *
     * @param string $marca
     *
     * @return Articulo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Articulo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Articulo
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
     * Set material
     *
     * @param string $material
     *
     * @return Articulo
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set peso
     *
     * @param string $peso
     *
     * @return Articulo
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return string
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     *
     * @return Articulo
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set estampando
     *
     * @param string $estampando
     *
     * @return Articulo
     */
    public function setEstampando($estampando)
    {
        $this->estampando = $estampando;

        return $this;
    }

    /**
     * Get estampando
     *
     * @return string
     */
    public function getEstampando()
    {
        return $this->estampando;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     *
     * @return Articulo
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set cierre
     *
     * @param string $cierre
     *
     * @return Articulo
     */
    public function setCierre($cierre)
    {
        $this->cierre = $cierre;

        return $this;
    }

    /**
     * Get cierre
     *
     * @return string
     */
    public function getCierre()
    {
        return $this->cierre;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Articulo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set paisfabricacion
     *
     * @param string $paisfabricacion
     *
     * @return Articulo
     */
    public function setPaisfabricacion($paisfabricacion)
    {
        $this->paisfabricacion = $paisfabricacion;

        return $this;
    }

    /**
     * Get paisfabricacion
     *
     * @return string
     */
    public function getPaisfabricacion()
    {
        return $this->paisfabricacion;
    }

    /**
     * Set altura
     *
     * @param string $altura
     *
     * @return Articulo
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get altura
     *
     * @return string
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set temporada
     *
     * @param string $temporada
     *
     * @return Articulo
     */
    public function setTemporada($temporada)
    {
        $this->temporada = $temporada;

        return $this;
    }

    /**
     * Get temporada
     *
     * @return string
     */
    public function getTemporada()
    {
        return $this->temporada;
    }

    /**
     * Set formatacon
     *
     * @param string $formatacon
     *
     * @return Articulo
     */
    public function setFormatacon($formatacon)
    {
        $this->formatacon = $formatacon;

        return $this;
    }

    /**
     * Get formatacon
     *
     * @return string
     */
    public function getFormatacon()
    {
        return $this->formatacon;
    }

    /**
     * Set puntera
     *
     * @param string $puntera
     *
     * @return Articulo
     */
    public function setPuntera($puntera)
    {
        $this->puntera = $puntera;

        return $this;
    }

    /**
     * Get puntera
     *
     * @return string
     */
    public function getPuntera()
    {
        return $this->puntera;
    }

    /**
     * Set alto
     *
     * @param string $alto
     *
     * @return Articulo
     */
    public function setAlto($alto)
    {
        $this->alto = $alto;

        return $this;
    }

    /**
     * Get alto
     *
     * @return string
     */
    public function getAlto()
    {
        return $this->alto;
    }

    /**
     * Set ancho
     *
     * @param string $ancho
     *
     * @return Articulo
     */
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;

        return $this;
    }

    /**
     * Get ancho
     *
     * @return string
     */
    public function getAncho()
    {
        return $this->ancho;
    }

    /**
     * Set profundo
     *
     * @param string $profundo
     *
     * @return Articulo
     */
    public function setProfundo($profundo)
    {
        $this->profundo = $profundo;

        return $this;
    }

    /**
     * Get profundo
     *
     * @return string
     */
    public function getProfundo()
    {
        return $this->profundo;
    }

    /**
     * Set coleccion
     *
     * @param string $coleccion
     *
     * @return Articulo
     */
    public function setColeccion($coleccion)
    {
        $this->coleccion = $coleccion;

        return $this;
    }

    /**
     * Get coleccion
     *
     * @return string
     */
    public function getColeccion()
    {
        return $this->coleccion;
    }

    /**
     * Set numbolsillos
     *
     * @param string $numbolsillos
     *
     * @return Articulo
     */
    public function setNumbolsillos($numbolsillos)
    {
        $this->numbolsillos = $numbolsillos;

        return $this;
    }

    /**
     * Get numbolsillos
     *
     * @return string
     */
    public function getNumbolsillos()
    {
        return $this->numbolsillos;
    }

    /**
     * Set otrascaracteristicas
     *
     * @param string $otrascaracteristicas
     *
     * @return Articulo
     */
    public function setOtrascaracteristicas($otrascaracteristicas)
    {
        $this->otrascaracteristicas = $otrascaracteristicas;

        return $this;
    }

    /**
     * Get otrascaracteristicas
     *
     * @return string
     */
    public function getOtrascaracteristicas()
    {
        return $this->otrascaracteristicas;
    }

    /**
     * Add colore
     *
     * @param \Color $colore
     *
     * @return Articulo
     */
    public function addColore(Color $colore)
    {
        $this->colores[] = $colore;

        return $this;
    }

    /**
     * Remove colore
     *
     * @param \Color $colore
     */
    public function removeColore(Color $colore)
    {
        $this->colores->removeElement($colore);
    }

    /**
     * Get colores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getColores()
    {
        return $this->colores;
    }

    /**
     * Add categoria
     *
     * @param \CategoriaArticulo $categoria
     *
     * @return Articulo
     */
    public function addCategoria(CategoriaArticulo $categoria)
    {
        $this->categorias[] = $categoria;

        return $this;
    }

    /**
     * Remove categoria
     *
     * @param \CategoriaArticulo $categoria
     */
    public function removeCategoria(CategoriaArticulo $categoria)
    {
        $this->categorias->removeElement($categoria);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Add destinatario
     *
     * @param \DestinatarioArticulo $destinatario
     *
     * @return Articulo
     */
    public function addDestinatario(DestinatarioArticulo $destinatario)
    {
        $this->destinatarios[] = $destinatario;

        return $this;
    }

    /**
     * Remove destinatario
     *
     * @param \DestinatarioArticulo $destinatario
     */
    public function removeDestinatario(DestinatarioArticulo $destinatario)
    {
        $this->destinatarios->removeElement($destinatario);
    }

    /**
     * Get destinatarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDestinatarios()
    {
        return $this->destinatarios;
    }

    /**
     * Add stock
     *
     * @param \Stock $stock
     *
     * @return Articulo
     */
    public function addStock(Stock $stock)
    {
        $this->stocks[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \Stock $stock
     */
    public function removeStock(Stock $stock)
    {
        $this->stocks->removeElement($stock);
    }

    /**
     * Get stocks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStocks()
    {
        return $this->stocks;
    }

    /**
     * Add detalle
     *
     * @param \Detalle $detalle
     *
     * @return Articulo
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

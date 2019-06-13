<?php

/**La classe EImmagine contiene i dati relativi alle immagini
 * @author gruppo 7
 * @package Entity
 * **/
class EImmagine implements JsonSerializable
{
    /**id dell'immagine*/
    private $id;

    /**dati immagine*/
    private $data;

    /** mime type dell'immagine */
    private $type;

    /**id dell'oggetto al quale l'immagine si riferisce */
    private $idesterno;

    /**costruttore*/
    public function __construct($d, $t)
    {
        $this->data = $d;
        $this->type = $t;

    }

    /**
     * @return int id dell'immagine
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id dell'immagine
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return longblob data immagine
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param longblob $data immagine
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return string content type dell'immagine
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type dell'immagine
     */
    public function setType($type): void
    {
        $this->type = $type;
    }



    /**
     * @return int idesterno
     */
    public function getIdesterno()
    {
        return $this->idesterno;
    }

    /**
     * @param int $idesterno
     */
    public function setIdesterno($idesterno): void
    {
        $this->idesterno = $idesterno;
    }

    /**
     * Stampa le informazioni dell'immagine
     */
    public function __toString(){
        $st = "ID: ".$this->id."content-type: ".$this->type." Data: ".$this->data."Id esterno ".$this->idesterno;
        return $st;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'data' => $this->getData(),
                'type' => $this->getType(),
                'idesterno'  => $this->getIdesterno()
            ];
    }






}
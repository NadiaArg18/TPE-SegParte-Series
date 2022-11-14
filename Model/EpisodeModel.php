<?php

class EpisodeModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_serie;charset=utf8', 'root', '');
    }

    function getEpisodes($sort = null, $order = null, $size = null, $offset = null, $filter = null, $data = null){ 
        if ($sort != null && $order != null){
            $query = $this->db->prepare("SELECT * FROM episodios ORDER BY $sort $order");
            $query->execute();
        } else if (($size != null) && ($offset != null) || ($size != null && ($offset == 0))){
            if ($offset == 0){
                $query = $this->db->prepare("SELECT * FROM episodios LIMIT $size");
            } else {
                $query = $this->db->prepare("SELECT * FROM episodios LIMIT $size OFFSET $offset");
            }           
            $query->execute();
        } else if ($filter != null && $data != null){
            $query = $this->db->prepare("SELECT * FROM episodios WHERE $filter = ?");
            $query->execute(array($data));
        } else {
            $query = $this->db->prepare("SELECT * FROM episodios");
            $query->execute();
        }
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function showEpisode($id){ 
        $sentence = $this->db->prepare("SELECT * FROM episodios WHERE id = ?");
        $sentence->execute(array($id));
        $episode = $sentence->fetch(PDO::FETCH_OBJ);
        return $episode;
    }

    function addEpisode($nameEpisode, $Director, $fk_id_Season, $premiereYear){      
        $sentence = $this->db->prepare("INSERT INTO episodios (nameEpisode, Director, fk_id_Season, premiereYear) VALUES(?,?,?,?)");
        $sentence->execute(array($nameEpisode, $Director, $fk_id_Season, $premiereYear));              
    }
    
    function deleteEpisodeFromDB($id){
        $sentence = $this->db->prepare("DELETE FROM episodios WHERE id = ?");
        $sentence->execute(array($id));
    }

    /*function getEpisodeToEdit($id){
        $sentence = $this->db->prepare("SELECT * FROM episodios WHERE id = ?");
        $sentence->execute(array($id));
        return $sentence->fetch(PDO::FETCH_OBJ);
    }
    
    function updateEpisodeFromDB($id, $nameEpisode, $Director, $fk_id_Season, $premiereYear){
        $sentence = $this->db->prepare("UPDATE episodios SET nameEpisode = ?, Director = ?, fk_id_Season = ?, premiereYear = ? WHERE id = ?");
        $sentence->execute(array($nameEpisode, $Director, $fk_id_Season, $premiereYear, $id));
    }

    function getEpisodesBySeason($season){
        $sentence = $this->db->prepare("SELECT a.*,b.* FROM episodios a INNER JOIN temporadas b ON a.fk_id_Season = b.id_Season WHERE b.id_Season = ?");
        $sentence->execute(array($season));
        $seasonEpisode = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $seasonEpisode;
    }*/
}

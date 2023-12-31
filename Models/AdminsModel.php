<?php 

namespace App\Models;

class AdminsModel extends Model {

    protected $id;
    protected $login;
    protected $password;
    protected $table = 'admins';

    public function getAdmin(array $criteres) {
        $champs = [];
        $valeurs = [];

        //eclater le tableau

        foreach ($criteres as $champ => $valeur) {
           //select * from annonces where actif = ?
           //bindvalue(1,valueur)
           $champs[] = "$champ = ?";
           $valeurs[] = $valeur;
        }

        // on transfore letable "chaps" en chaine de caractere

        $liste_champs = implode(' AND ', $champs);

        // on execute la requete
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '. $liste_champs,$valeurs)->fetch();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
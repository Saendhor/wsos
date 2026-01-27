package com.dmi.hogwartsos.Model;

import jakarta.persistence.*;

@Entity
public class Wizard {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String name;
    @ManyToOne
    @JoinColumn(name = "langhouse")
    Langhouse langhouseId;

    public Wizard() {
        //
    }
    
    public Wizard(Long id, String name, Langhouse langhouseId) {
        this.id = id;
        this.name = name;
        this.langhouseId = langhouseId;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Langhouse getLanghouseId() {
        return langhouseId;
    }

    public void setLanghouseId(Langhouse langhouseId) {
        this.langhouseId = langhouseId;
    }
    
}

package com.dmi.hogwartsos.Model;

import java.util.*;
import jakarta.persistence.*;

@Entity
public class Langhouse {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    private String name;
    @OneToMany(mappedBy = "langhouseId", cascade = CascadeType.REMOVE)
    private List<Wizard> wizard = new ArrayList<>();

    public Langhouse() {
    }

    public Langhouse(long id, String name, List<com.dmi.hogwartsos.Model.Wizard> wizard) {
        this.id = id;
        this.name = name;
        this.wizard = wizard;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public List<Wizard> getWizard() {
        return wizard;
    }

    public void setWizard(List<Wizard> wizard) {
        this.wizard = wizard;
    }
    
}

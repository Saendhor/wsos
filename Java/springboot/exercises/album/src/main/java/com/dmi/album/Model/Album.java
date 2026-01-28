package com.dmi.album.Model;

import jakarta.persistence.*;

@Entity
public class Album {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    private String name;

    /*
        Default constructor
    */
    public Album() {
        //
    }

    public Album(long id, String name) {
        this.id = id;
        this.name = name;
    }

    /*
        Setters and getters
    */

    public void setId(long id) {
        this.id = id;
    }

    public long getId() {
        return this.id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getName() {
        return this.name;
    }

    /* --- */
}

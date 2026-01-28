package com.dmi.album.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import com.dmi.album.Model.Album;
import com.dmi.album.Repository.AlbumRepository;
 
/*
    Create
    Read
    Update
    Destroy - Delete
*/

@Controller
public class AlbumController {

    private final AlbumRepository albumRepository;

    public AlbumController(AlbumRepository albumRepository) {
        this.albumRepository = albumRepository;
    }

    //Read - Index
    @GetMapping("/album")
    public String index(Model model) {
        model.addAttribute("album", albumRepository.findAll());
        return "album/list";
    }

    //Create
    @GetMapping("/album/new")
    public String create(Model model) {
        model.addAttribute("album", new Album());
        return "album/edit";
    }

    //Update - Edit
    @GetMapping("/album/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("album", albumRepository.getReferenceById(id));
        return "album/edit";
    }

    //Delete
    @GetMapping("/album/{id}/delete")
    public String delete(@PathVariable Long id) {
        Album toDelete = albumRepository.getReferenceById(id);
        albumRepository.delete(toDelete);
        return "redirect:/album";
    }

    @PostMapping("/album")
    public String cr(@ModelAttribute Album album, Model model) {
        albumRepository.save(album);
        return "redirect:/album";
    }

}

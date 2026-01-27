package com.dmi.hogwartsos.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import com.dmi.hogwartsos.Model.Langhouse;
import com.dmi.hogwartsos.Repository.LanghouseRepository;
import com.dmi.hogwartsos.Repository.WizardRepository;

@Controller
public class LanghouseController {
    private final LanghouseRepository langhouseRepository;
    private final WizardRepository wizardRepository;

    public LanghouseController(LanghouseRepository langhouseRepository, WizardRepository wizardRepository) {
        this.langhouseRepository = langhouseRepository;
        this.wizardRepository = wizardRepository;
    }

    @GetMapping("/langhouse")
    public String getHome(Model model) {
        model.addAttribute("langhouse", langhouseRepository.findAll());
        return "langhouse/list";
    }

    @GetMapping("/langhouse/new")
    public String create(Model model) {
        model.addAttribute("langhouse", new Langhouse());
        return ("langhouse/edit");
    }

    @GetMapping("/langhouse/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("langhouse", langhouseRepository.getReferenceById(id));
        return "langhouse/edit";
    }

    @GetMapping("/langhouse/{id}/delete")
    public String delete(@PathVariable Long id) {
        Langhouse langhouse = langhouseRepository.getReferenceById(id);
        langhouseRepository.delete(langhouse);
        return "redirect:/langhouse";
    }

    @GetMapping("/langhouse/{id}/filter")
    public String filter(@PathVariable Long id, Model model) {
        Langhouse langhouse = langhouseRepository.getReferenceById(id);
        model.addAttribute("wizard", wizardRepository.findByLanghouseId(langhouse));
        return "wizard/list";
    }

    @PostMapping("/langhouse")
    public String cr(@ModelAttribute Langhouse langhouse, Model model) {
        langhouseRepository.save(langhouse);
        return ("redirect:/langhouse");
    }
    
}
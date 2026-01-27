package com.dmi.hogwartsos.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import com.dmi.hogwartsos.Model.Wizard;
import com.dmi.hogwartsos.Repository.LanghouseRepository;
import com.dmi.hogwartsos.Repository.WizardRepository;

@Controller
public class WizardController {

    private final LanghouseRepository langhouseRepository;
    private final WizardRepository wizardRepository;

    public WizardController(WizardRepository wizardRepository, LanghouseRepository langhouseRepository) {
        this.wizardRepository = wizardRepository;
        this.langhouseRepository = langhouseRepository;
    }

    @GetMapping("/wizard")
    public String home(Model model) {
        model.addAttribute("wizard", wizardRepository.findAll());
        return "wizard/list";
    }

    @GetMapping("/wizard/new")
    public String create(Model model) {
        model.addAttribute("wizard", new Wizard());
        model.addAttribute("langhouse", langhouseRepository.findAll());
        return ("wizard/edit");
    }

    @GetMapping("/wizard/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("wizard", wizardRepository.getReferenceById(id));
        model.addAttribute("langhouse", langhouseRepository.findAll());
        return "wizard/edit";
    }

    @GetMapping("/wizard/{id}/delete")
    public String delete(@PathVariable Long id) {
        Wizard wizard = wizardRepository.getReferenceById(id);
        wizardRepository.delete(wizard);
        return "redirect:/wizard";
    }

    @PostMapping("/wizard")
    public String cr(@ModelAttribute Wizard wizard, Model model) {
        wizardRepository.save(wizard);
        return ("redirect:/wizard");
    }
}
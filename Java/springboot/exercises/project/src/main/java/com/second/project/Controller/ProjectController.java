package com.second.project.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import com.second.project.Repository.ProjectRepository;
import com.second.project.Model.Project;

@Controller
public class ProjectController {

    private final ProjectRepository projectRepository;

    public ProjectController(ProjectRepository projectRepository) {
        this.projectRepository = projectRepository;
    }

    //Read
    @GetMapping("/project")
    public String index(Model model) {
        model.addAttribute("project", projectRepository.findAll());
        return "project/list";
    }
    
    //Create
    @GetMapping("/project/new")
    public String create(Model model) {
        model.addAttribute("project", new Project());
        return "project/edit";
    }
        
    //Update - Edit
    @GetMapping("/project/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("project", projectRepository.getReferenceById(id));
        return "project/edit";
    }

    //Delete
    @GetMapping("/project/{id}/delete")
    public String delete(@PathVariable Long id, Model model) {
        Project toDelete = projectRepository.getReferenceById(id);
        projectRepository.delete(toDelete);
        return "redirect:/project";
    }

    //Save operation
    @PostMapping("/album")
    public String cr(@ModelAttribute Project project, Model model) {
        projectRepository.save(project);
        return "redirect:/album";
    }

}
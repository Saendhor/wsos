package com.second.project.Repository;

import com.second.project.Model.Project;
import org.springframework.data.jpa.repository.*;

public interface ProjectRepository extends JpaRepository<Project, Long> {
    //
}

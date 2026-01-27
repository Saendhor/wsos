package com.dmi.hogwartsos.Repository;

import com.dmi.hogwartsos.Model.Langhouse;
import com.dmi.hogwartsos.Model.Wizard;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

public interface WizardRepository extends JpaRepository<Wizard, Long> {
    public List<Wizard> findByLanghouseId(Langhouse langhouseId);
}

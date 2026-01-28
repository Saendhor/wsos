package com.dmi.album.Repository;

import com.dmi.album.Model.Album;
import org.springframework.data.jpa.repository.JpaRepository;

public interface AlbumRepository extends JpaRepository<Album, Long> {
    //
}

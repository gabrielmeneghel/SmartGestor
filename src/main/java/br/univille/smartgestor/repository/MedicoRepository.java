package br.univille.smartgestor.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import br.univille.smartgestor.model.Medico;

@Repository
public interface MedicoRepository extends JpaRepository<Medico, Long> {

}
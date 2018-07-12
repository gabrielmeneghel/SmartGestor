package br.univille.smartgestor.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import br.univille.smartgestor.model.Paciente;

@Repository

public interface PacienteRepository extends JpaRepository<Paciente, Long>{

}
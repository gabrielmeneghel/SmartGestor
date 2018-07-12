package br.univille.smartgestor.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.ModelAndView;

import br.univille.smartgestor.model.Consulta;
import br.univille.smartgestor.repository.ConsultaRepository;
import br.univille.smartgestor.repository.MedicoRepository;
import br.univille.smartgestor.repository.PacienteRepository;
import br.univille.smartgestor.repository.ProcedimentoRepository;

@Controller
@RequestMapping("/consulta")
public class ConsultaController {
    @Autowired
    private ConsultaRepository consultaRepository;
    @Autowired
    private PacienteRepository pacienteRepository;
    @Autowired
    private MedicoRepository medicoRepository;
    @Autowired
    private ProcedimentoRepository procedimentoRepository;
    
    @GetMapping("")
    public ModelAndView index() {
        List<Consulta> listaConsulta = this.consultaRepository.findAll();
        
        return new ModelAndView("consulta/index","listaConsulta",listaConsulta);
    }
    
}
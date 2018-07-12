package br.univille.smartgestor.controller;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import br.univille.smartgestor.model.Cidade;
import br.univille.smartgestor.model.Paciente;
import br.univille.smartgestor.repository.CidadeRepository;
import br.univille.smartgestor.repository.PacienteRepository;

@Controller
@RequestMapping("/paciente")
public class PacienteController {
	
	 @Autowired
	 private PacienteRepository pacienteRepository;
	 
	  @Autowired
	  private CidadeRepository cidadeRepository;

	
	@GetMapping("")
	public ModelAndView index() {
		List<Paciente> listaPaciente = this.pacienteRepository.findAll();
		    
	    return new ModelAndView("paciente/index","listapac",listaPaciente);
	}
	
	@GetMapping("/novo")
    public ModelAndView createForm(@ModelAttribute Paciente paciente) {
        List<Cidade> listaCidades = cidadeRepository.findAll();
        return new ModelAndView("paciente/form","listacidades",listaCidades);
    }
	

	
	 @PostMapping(params="form")
	    public ModelAndView save(@Valid Paciente paciente, BindingResult result, RedirectAttributes redirect) {
	        
	        paciente = this.pacienteRepository.save(paciente);
	        
	        return new ModelAndView("redirect:/paciente");
	    }
	 
	 @GetMapping(value="/alterar/{id}")
	    public ModelAndView alterarForm1(@PathVariable("id") Paciente paciente) {
	        List<Cidade> listaCidades = cidadeRepository.findAll();
	        HashMap<String, Object> dados = new HashMap<String, Object>();
	        dados.put("paciente",paciente);
	        dados.put("listacidades",listaCidades);
	        
	        return new ModelAndView("paciente/form",dados);
	    }
	 

	 
	 @GetMapping(value="remover/{id}")
	 public ModelAndView remover(@PathVariable ("id") Long id, RedirectAttributes redirect) {
	      this.pacienteRepository.deleteById(id);
	      return new ModelAndView("redirect:/paciente");
	    }
}

package com.escola.estoquelivros.controller;

import com.escola.estoquelivros.dto.LivroRequestDTO;
import com.escola.estoquelivros.model.Livro;
import com.escola.estoquelivros.service.LivroService;
import jakarta.validation.Valid;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

// Essa classe recebe requisições web e responde em JSON - os getters entram em ação
@RestController
// Todos os endpoints dessa classe começam com /livros
@RequestMapping("/livros")
public class LivroController {

    private final LivroService livroService;

    public LivroController(LivroService livroService) {
        this.livroService = livroService;
    }
    // Responde a GET /livros e mostra a lista de todos os livros
    @GetMapping
    public List<Livro> listarTodos() {
        return livroService.listarTodos();
    }
    //Puxa o livro pelo ID
    @GetMapping("/{id}")
    public ResponseEntity<Livro> buscarPorId(@PathVariable Long id) {
        Optional<Livro> livro = livroService.buscarPorId(id);

        if (livro.isPresent()) {
            return ResponseEntity.ok(livro.get());
        }
        return ResponseEntity.notFound().build();
    }
    // Responde a POST /livros, recebe os dados do livro em JSON (no DTO) e salva no banco
    @PostMapping
    public ResponseEntity<Livro> criar(@Valid @RequestBody LivroRequestDTO dto) {
        // manda o DTO para o service, que cria o livro e salva no banco
        Livro livroSalvo = livroService.salvar(dto);

        // devolve 201 (Created) com o livro salvo, já com o id gerado pelo banco
        return ResponseEntity.status(HttpStatus.CREATED).body(livroSalvo);
    }

    // Responde a PUT /livros/{id}, atualiza os dados de um livro que já existe
    @PutMapping("/{id}")
    public ResponseEntity<Livro> atualizar(@PathVariable Long id, @Valid @RequestBody LivroRequestDTO dto) {
        // o id vem do endereço e os dados novos vêm do corpo da requisição (DTO)
        Optional<Livro> livroAtualizado = livroService.atualizar(id, dto);

        // se o livro existe, devolve 200 (OK) com o livro atualizado
        if (livroAtualizado.isPresent()) {
            return ResponseEntity.ok(livroAtualizado.get());
        }

        // se o livro não existe, devolve 404 (Not Found)
        return ResponseEntity.notFound().build();
    }
    // Deleta um livro
    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deletar(@PathVariable Long id) {
        if (livroService.deletar(id)) {
            return ResponseEntity.noContent().build();
        }
        return ResponseEntity.notFound().build();
    }
}
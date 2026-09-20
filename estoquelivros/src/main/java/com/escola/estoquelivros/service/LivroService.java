package com.escola.estoquelivros.service;
import com.escola.estoquelivros.dto.LivroRequestDTO;
import com.escola.estoquelivros.model.Livro;
import com.escola.estoquelivros.repository.LivroRepository;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
// Avisa o Spring que a classe é um service, cria um objeto dela
public class LivroService {

    private final LivroRepository livroRepository;
    // o service precisa do repository para acessar o banco

    public LivroService(LivroRepository livroRepository) {
        this.livroRepository = livroRepository;
    }

    public List<Livro> listarTodos() {
        return livroRepository.findAll();
    }

    public Optional<Livro> buscarPorId(Long id) {
        return livroRepository.findById(id);
    }
    public Livro salvar(LivroRequestDTO dto) {
        // cria um Livro novo, sem id, a partir dos dados que chegaram no DTO
        Livro livro = new Livro();

        // o DTO é um record, então lemos os valores com titulo(), e não getTitulo()
        // os setters gravam esses valores no Livro novo
        livro.setTitulo(dto.titulo());
        livro.setAutor(dto.autor());
        livro.setPreco(dto.preco());
        livro.setQuantidadeEstoque(dto.quantidadeEstoque());

        // como o Livro não tem id, o banco cria uma linha nova e gera o id sozinho
        return livroRepository.save(livro);
    }

    public Optional<Livro> atualizar(Long id, LivroRequestDTO dados) {
        // procura no banco o livro com o id que veio no endereço
        Optional<Livro> livroExistente = livroRepository.findById(id);

        // se o livro existe, troca os valores antigos pelos valores novos do DTO
        if (livroExistente.isPresent()) {
            Livro livro = livroExistente.get();

            // os métodos do DTO leem os valores novos; os setters gravam no livro do banco
            livro.setTitulo(dados.titulo());
            livro.setAutor(dados.autor());
            livro.setPreco(dados.preco());
            livro.setQuantidadeEstoque(dados.quantidadeEstoque());

            // salva o livro atualizado e devolve dentro de um Optional
            return Optional.of(livroRepository.save(livro));
        }

        // se o livro não existe, devolve um Optional vazio (o Controller transforma isso em 404)
        return Optional.empty();
    }

    public boolean deletar(Long id) {
        if (livroRepository.existsById(id)) {
            livroRepository.deleteById(id);
            return true;
        }
        return false;
    }
}
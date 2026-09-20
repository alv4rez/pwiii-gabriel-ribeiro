package com.escola.estoquelivros.repository;

import com.escola.estoquelivros.model.Livro;
import org.springframework.data.jpa.repository.JpaRepository;
// Herda vários métodos prontos --v
public interface LivroRepository extends JpaRepository<Livro, Long> {
// A interface repository serve para fazer a comunicação da aplicação com o banco de dados, ligando o Java com as tabelas
    //<Livro, Long> Livro é a entidade que o repositório gerencia, Long diz o tipo do ID
}
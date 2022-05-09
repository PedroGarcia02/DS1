drop table usuariolivro;
drop table usuario;
drop table livros;


create table usuario (
    id integer not null auto_increment,
    email varchar(100) not null,
    nome varchar(70) not null,
    senha varchar(1500) not null,
    adm char(1) DEFAULT 0,
    primary key (id)
);

create table livros (
    codigo integer not null auto_increment,
    nome varchar(100) not null,
    autor varchar(100) not null,
    anoDePublicacao varchar(4) not null,
    stock integer not null,
    primary key (codigo)
);

create table usuariolivro (
    codigo integer not null auto_increment,
    usuario integer not null,
    livro integer not null,
    foreign key (usuario) references usuario(id),
    foreign key (livro) references livros(codigo),
    primary key (codigo)
);

insert into usuario (email, nome, senha) values
("jose@hotmail.com", "jose", "123"),
("joana@hotmail.com", "joana", "123");

insert into usuario (email, nome, senha, adm) values
("admin@hotmail.com", "admin", "123", "1");

insert into livros (nome, autor, anoDePublicacao, stock) values
("Dom Quixote", "Miguel de Cervantes", "1605", 50),
("O Conde de Monte Cristo", "Alexandre Dumas", "1844", 1),
("Um Conto de Duas Cidades", "Charles Dickens", "1959", 8),
("O Pequeno Príncipe", "Antoine de Saint-Exupéry", "1943", 4),
("O Senhor dos Anéis", "J. R. R. Tolkien", "1954", 22);

insert into usuariolivro (usuario, livro) values
(1, 1),
(2, 2);
-- ATORES E SEUS RELACIONADOS

CREATE TABLE nivel_de_usuario (
    id int not null,
    nivel varchar(200) not null,
    primary key(id)
);

CREATE TABLE funcionarios (
    cpf char(11) not null,
    senha varchar(50) not null,
    nome varchar(200) not null,
    email varchar(200) not null,
    data_nascimento date not null,
    telefone char(11) not null,
    cidade varchar(200) not null,
    uf char(2) not null,
    nivel_de_usuario int not null,
    primary key (cpf, senha),
    foreign key (nivel_de_usuario) references nivel_de_usuario(id)
);


-- Graduação, Pós Graduação, Técnico Médio, Técnico Subsequente
CREATE TABLE tipos_de_curso (
    id int not null auto_increment,
    tipo_de_curso varchar(200) not null,
    primary key (id)
);


-- Agropecuária A, Agropecuária B, Enologia, Informática, Meio Ambiente e Administração
CREATE TABLE cursos (
    id int not null auto_increment,
    nome_curso varchar(200) not null,
    id_tipo_de_curso int not null,
    primary key (id),
    foreign key (id_tipo_de_curso) references tipos_de_curso(id)
);


CREATE TABLE alunos (
    cpf char(11) not null,
    nome varchar(200) not null,
    email varchar(200) not null,
    data_nascimento date not null,
    telefone char(11),
    endereco varchar(200) not null,
    bairro varchar(200) not null,
    cidade varchar(200) not null,
    uf char(2) not null,
    ano_de_ingresso char(4) not null,
    psicopedagogo boolean not null,
    monitor boolean not null,
    necessita_monitor boolean not null,
    primary key (cpf),
);

CREATE TABLE aluno_curso (
    matricula char(11) not null,
    cpf char(11) not null,
    status_aluno varchar(200) not null,
    curso_id int not null,
    periodo_escolar int not null,
    data_de_ingresso date not null,
    ano_de_conclusao year,
    foreign key (curso_id) cursos(id),
    foreign key (cpf) alunos(cpf)
)

CREATE TABLE responsaveis (
    cpf char(11) not null,
    nome varchar(200) not null,
    email varchar(200) not null,
    telefone char(11) not null,
    primary key(cpf)
)

CREATE TABLE alunos_responsaveis (
    cpf_responsavel char(11) not null,
    cpf_aluno char(11) not null,
    foreign key (cpf_responsavel) references responsaveis(cpf),
    foreign key (cpf_aluno) references alunos(cpf)
)

CREATE TABLE necessidades (
    id int not null,
    necessidade text not null,
    tipo_necessidade text not null,
    primary key (id)
)

CREATE TABLE necessidades_aluno (
    aluno_cpf char(11) int not null,
    necessidade_id int not null,
    laudo text not null,
    foreign key (aluno_cpf) references alunos(cpf),
    foreign key (necessidades_id) references necessidades(id)
)



CREATE TABLE disciplinas (
    id int not null auto_increment,
    nome varchar(200) not null,
    periodo_escolar int not null,
    curso_id int not null,
    cpf_docente char(11) not null,
    primary key (id),
    foreign key (curso_id) references cursos(id),
);


CREATE TABLE docente_disciplinas (
    foreign key (cpf_docente) references docentes(cpf), 
)
-- ALUNOS, PEI, RELACIONADOS

CREATE TABLE parecer (
    id int unique not null auto_increment,
    matricula_aluno CHAR(11) NOT NULL,
    id_disciplina int NOT NULL,
    ano_parecer year not null,
    trimestre int,
    parecer text,
    comentarios_napne text,
    PRIMARY KEY (matricula_aluno, id_disciplina, ano_parecer, trimestre),
    foreign key (id) references comentarios(id),
);

CREATE TABLE comentarios (
    id int unique not null auto_increment,
    matricula_aluno CHAR(11) NOT NULL,
    id_disciplina int NOT NULL,
    ano year not null,
    trimestre int,
    cpf_usuario char(11) not null,
    comentario text not null,

)


CREATE TABLE PEIespecifico (
    id int unique not null auto_increment,
    matricula_aluno CHAR(11) NOT NULL,
    id_disciplina INT NOT NULL,
    data_atualizacao date not null
    ano year not null,
    tipo_de_curso int not null,
    ementa text,
    objetivo_geral text,
    objetivos_especificos text,
    conteudos text,
    metodologia text,
    avaliacao text,
    PRIMARY KEY (matricula_aluno, id_disciplina, ano),
    FOREIGN KEY (matricula_aluno) REFERENCES alunos(matricula),
    FOREIGN KEY (id_disciplina) REFERENCES disciplinas(id),
    FOREIGN KEY (tipo_de_curso) REFERENCES tipos_de_curso(id),
    foreign key (id) references parecer(id),
    foreign key (id) references comentarios(id),
);


CREATE TABLE PEIgeral (
    -- 3
    matricula_aluno char(10) not null,
    data_da_ultima_atualizacao date not null,
    cid text,
    historico_antes_da_instituicao text, -- 5
    historico_durante_a_instituicao text, -- 5
    aspectos_psicologicos text,
    aspectos_clinicos text,
    parecer_psicopedagogico_instituicao text,
    conhecimentos_habilidades_capacidades_interesses text,
    dificuldades_apresentadas text,
    estrategias_selecionadas_para_atendimento_ao_aluno text,
    -- historico => fazer JOIN com PEIgeral anteriores do aluno
    primary key (matricula_aluno, data_da_ultima_atualizacao),
    foreign key (matricula_aluno) references alunos(matricula)
    foreign key (matricula_aluno, ano_parecer) references PEIespecifico(matricula_aluno, ano_pei),
);







-- 1 No controller, validar se foi preenchido apenas ano ou apenas semestre
-- 2 No controller, permitir preenchimento de campo apenas se o nome do responsável foi preenchido
-- 3 PEI geral: avaliação geral do trimestre (napne); PEI específico: avaliação por disciplina (docentes)
-- 4 Pode ser alterado para semestre no caso de aluno da graduação
-- 5 Preenchido pela Equipe Pedagógica, Assistência Estudantil e NAPNE/NAAf


-- Observações:

-- Deficiência / Transtorno





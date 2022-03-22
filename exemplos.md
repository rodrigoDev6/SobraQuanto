<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listando

        $categoria = Categoria::orderby('Nome', 'ASC')->get();
        return view('categoria.index',['categorias'=>$categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nome.required' => 'O campo :attribute é obrigatório'
        ];

        $validate = $request->validate([
            'nome' => 'required|min:2'
        ], $messages);
        
        $categoria = new Categoria;
        $categoria->nome = $request -> nome;
        $categoria->save();
    
        return redirect('/categoria')->with('status', 'Categoria criada com sucess!!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.show',['categoria' => $categoria]);
        
    }

    //aqui estou
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nome.required' => 'O campo :attribute é obrigatório'
        ];

        $validate = $request->validate([
            'nome' => 'required|min:2'
        ], $messages);
        
        $categoria = Categoria::findOrFail($request->id);
        $categoria->nome = $request -> nome;
        $categoria->save();
    
        return redirect('/categoria')->with('status', 'Categoria alterada com sucess!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect('/categoria')->with('status', 'categoria excluida com sucesso');
    }
}

-- CRIAÇÃO DO BANCO

CREATE DATABASE Projeto_sandrin;
use Projeto_sandrin;

-- CRIAÇÃO DAS TABELAS

CREATE TABLE Funcionario (
codFunc INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(30) NOT NULL,
sexo VARCHAR(1) NULL,
idade INT NULL,
cargo VARCHAR(20) NULL
);

CREATE TABLE Projeto (
codProjeto INT PRIMARY KEY AUTO_INCREMENT,
descricao VARCHAR(30) NOT NULL,
totalHoras INT NULL
);

create table trabalhaEm (
codFunc int(11),
codProjeto int(11),
horasSemanal int(2),
foreign key (codFunc) references funcionario (codFunc),
foreign key (codProjeto) references projeto (codProjeto)
);


-- INSERINDO VALORES

INSERT INTO Funcionario (codFunc, nome, sexo, idade, cargo) values (10 , 'Mel Santos', 'F', 25, 'Analista');
INSERT INTO Funcionario (codFunc, nome, sexo, idade, cargo) values (20 , 'Lia Silva', 'F', 18, 'Programador');
INSERT INTO Funcionario (codFunc, nome, sexo, idade, cargo) values (30 , 'José Carlos', 'M', 25, 'Programador');

INSERT INTO Projeto (codProjeto, descricao, totalHoras) VALUES (5050, 'Sistema A', 800);
INSERT INTO Projeto (codProjeto, descricao, totalHoras) VALUES (6060, 'Sistema B', 1000);
INSERT INTO Projeto (codProjeto, descricao, totalHoras) VALUES (7070, 'Sistema C', 600);
INSERT INTO Projeto (codProjeto, descricao, totalHoras) VALUES (8080, 'Sistema D', NULL);

INSERT INTO trabalhaEm (codFunc, codProjeto, horasSemanal) VALUES (10, 5050, 20);
INSERT INTO trabalhaEm (codFunc, codProjeto, horasSemanal) VALUES (20, 5050, 20);
INSERT INTO trabalhaEm (codFunc, codProjeto, horasSemanal) VALUES (10, 6060, 10);
INSERT INTO trabalhaEm (codFunc, codProjeto, horasSemanal) VALUES (30, 6060, 30);
INSERT INTO trabalhaEm (codFunc, codProjeto, horasSemanal) VALUES (10, 7070, 10);
INSERT INTO trabalhaEm (codFunc, codProjeto, horasSemanal) VALUES (20, 7070, 20);
INSERT INTO trabalhaEm (codFunc, codProjeto, horasSemanal) VALUES (30, 7070, 10);

SELECT * FROM funcionario;
SELECT * FROM projeto;
select * from trabalhaem;

-- CONSULTAS NO SQL

-- A) Todas as informações do funcionário de código 10.
SELECT *
FROM funcionario
WHERE codFunc = 10;

-- B) O nome e o cargo dos funcionários que são do sexo masculino ou tenham mais de 20 alunos

SELECT *
FROM funcionario
WHERE sexo = 'M' AND idade >= 20;

-- C) A descrição dos projetos que ainda possuem o total de horas definido.

SELECT descricao from projeto where totalHoras is not null;

-- D) Apenas os valores distintos de cargas.

SELECT distinct cargo from funcionario;

-- E) O nome dos programadores ordenados crescentemente.

select nome from funcionario order by nome ASC;

-- F) O nome e o cargo dos funcionários que trabalham no projeto de código 5050.

SELECT codFunc FROM trabalhaem WHERE codProjeto = 5050;

-- G) O nome de todos os funcionários e a descrição dos projetos onde trabalham ordenados decrescentemente pela sua idade.

select nome, descricao from funcionario, projeto order by idade DESC;

-- H) O nome dos funcionários que trabalham no projeto de código 20.
/*
select * 
from Funcionario
inner join trabalhaEm on trabalhaEm.codFunc = Funcionario.codFunc
inner join Projeto on Projeto.codProjeto = trabalhaEm.codProjeto
where projeto.codProjeto = 20
;
*/

select * 
from Funcionario
inner join trabalhaEm on trabalhaEm.codFunc = Funcionario.codFunc
inner join Projeto on Projeto.codProjeto = trabalhaEm.codProjeto
where Funcionario.codFunc = 20
;

-- I) O código dos funcionários que trabalham no projeto Sistema C.


-- J) O nome e o total de horas dos projetos em que os funcionários de códigos 20 e 30 -- trabalharam.


-- K) O nome dos funcionários que trabalham em projetos com mais de 750 horas.


-- L) O nome e o total de horas dos projetos em que a Lia trabalha.
select f.nome,
	p.totalHoras
from Funcionario f
inner join trabalhaEm t on t.codFunc = f.codFunc
inner join Projeto p on p.codProjeto = t.codProjeto
where f.nome = 'Lia Silva';

-- M) O nome, o sexo e o cargo dos empregados que trabalharam no projeto de código 7070.
SELECT 
	nome, 
    sexo, 
    cargo ,
    projeto.codProjeto
from Funcionario
inner join trabalhaEm on trabalhaEm.codFunc = Funcionario.codFunc
inner join Projeto on Projeto.codProjeto = trabalhaEm.codProjeto
where projeto.codProjeto = 7070;


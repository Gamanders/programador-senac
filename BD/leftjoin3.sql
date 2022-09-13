select 
    cursos.nome as "Curso", 
    categoria.nome as "Categoria",
    categoria.modalidade as "Modalidade"
from cursos
join categoria
on cursos.categoria_id = categoria.id
left join cursosinteressados
on cursos.id = cursosinteressados.cursos_id
where cursosinteressados.cursos_id is null;
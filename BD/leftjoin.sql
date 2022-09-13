select 
    cursos.nome as "Curso", 
    categoria.nome as "Categoria",
    categoria.modalidade as "Modalidade",
    cursosinteressados.cursos_id 
from cursos
join categoria
on cursos.categoria_id = categoria.id
join cursosinteressados
on cursos.id = cursosinteressados.cursos_id;
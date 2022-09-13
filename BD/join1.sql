select 
cursos.nome as "Curso", 
cursos.dtIni as "Inicio", 
categoria.modalidade as "Modalidade",
interessados.nome as "Interessado",
interessados.contato 
from cursosinteressados
join cursos on cursos.id = cursosinteressados.cursos_id
join interessados on interessados.id = cursosinteressados.interessados_id
join categoria on categoria.id = cursos.categoria_id
where cursos.dtIni > '2022-10-01'and cursos.dtIni < '2022-10-15';
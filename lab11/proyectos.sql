BULK INSERT eduardo.empresa.[Proyectos]
   FROM 'C:\Users\logan\Documents\Tecnologico de Monterrey\4to semestre\Base de datos\proyectos.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

LOAD DATA INFILE'proyectos.csv' INTO TABLE proyectos FIELDS TERMINATED BY ','
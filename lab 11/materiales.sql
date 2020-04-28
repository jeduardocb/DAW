BULK INSERT eduardo.empresa.[Materiales]
   FROM 'C:\Users\logan\Documents\Tecnologico de Monterrey\4to semestre\Base de datos\materiales.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
LOAD DATA INFILE'materiales.csv' INTO TABLE Materiales FIELDS TERMINATED BY','


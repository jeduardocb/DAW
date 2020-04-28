BULK INSERT eduardo.empresa.[Entregan]
   FROM 'C:\Users\logan\Documents\Tecnologico de Monterrey\4to semestre\Base de datos\entregan.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

LOAD DATA INFILE'entregan .csv' INTO TABLE entregan FIELDS TERMINATED BY ','
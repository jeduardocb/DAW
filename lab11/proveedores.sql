BULK INSERT eduardo.empresa.[Proveedores]
   FROM 'C:\Users\logan\Documents\Tecnologico de Monterrey\4to semestre\Base de datos\preoveedores.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

LOAD DATA INFILE'proveedores.csv' INTO TABLE Proveedores FIELDS TERMINATED BY','
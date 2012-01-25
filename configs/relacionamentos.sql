SELECT
    *
FROM
    mysql.columns_priv
WHERE
    TABLE_NAME  = 'arquivo' AND
    COLUMN_NAME = 'id' 
AND
    DB           = 'contatos'; 


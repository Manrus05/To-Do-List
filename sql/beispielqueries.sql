SELECT bezeichnung FROM aktuelle WHERE bezeichnung NOT IN (SELECT bezeichnung FROM aufgaben);


SELECT bezeichnung FROM aktuelle 
WHERE bezeichnung NOT IN (SELECT bezeichnung FROM aufgaben) 
and regelmesigkeit <= NOW();

INSERT INTO aktuelle (`id`, bezeichnung,`zeitstempel`, `regelmesigkeit`) 
VALUES (NULL, 'as', DATE_ADD(NOW(), INTERVAL 1 DAY), 'tag');
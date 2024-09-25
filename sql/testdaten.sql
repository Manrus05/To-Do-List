INSERT INTO `aufgaben` (`id`, `bezeichnung`) VALUES 
(NULL, 'putzen'), 
(NULL, 'desinfizieren');

INSERT INTO `aufgaben` (`id`, `bezeichnung`) VALUES 
(NULL, 'muell sammeln'), 
(NULL, 'streik');

INSERT INTO `aufgaben` (`bezeichnung`) 
SELECT bezeichnung FROM aktuelle



INSERT INTO `aktuelle` (`id`, bezeichnung,`zeitstempel`, `regelmesigkeit`) VALUES 
(NULL, 'Willkommen aufm Forum!', current_time, 'tag'), 
(NULL, 'Hallo Beatrice', current_time, 'woche');

INSERT INTO `erledigt` (`id`, `nutzer`, `bezeichnung`, zeitstempel) VALUES 
(NULL, 'tom andreas', 'putzen', current_time), 
(NULL, 'alla fox', 'desinfizieren', current_time);


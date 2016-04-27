/*
Luua uus tabel 'loomaaed', kus on järgnevad väljad:
id - täisarv, automaatselt suurenev primaarvõti
nimi - tekstiline väärtus
vanus - täisarv
liik - tesktiline väärtus
puur - täisarv
Täita eelnevalt loodud tabel vähemalt 5 reaga.
Sisestamisel valida andmed nii, et mõned loomad jagavad samat puuri ja mõnest liigist on mitu looma.
*/
CREATE TABLE IF NOT EXISTS 10153400_loomaaed (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nimi varchar(100) NOT NULL,
  vanus integer NOT NULL,
  puur int(11) NOT NULL,
  liik varchar(100) NOT NULL)

/*
Koostada järgnevad päringud:
Hankida kõigi mingis ühes kindlas puuris elavate loomade nimi ja puuri number
*/
INSERT INTO 10153400_loomaaed (nimi, vanus, puur, liik) VALUES
('Olaf', 1, 8,'karu'),
('Kassper', 2, 2, 'kass'),
('Kaarel', 3, 2, 'kass'),
('Toomas', 4, 2, 'kass'),
('Rosso', 5, 4, 'põrsas'),
('Porco', 6, 4, 'põrsas'),
('Lucy', 7, 5, 'ahv'),
('Hopper', 8, 8, 'küülik'),
('Maali', 9, 7, 'lehm'),
('Kasper', 10, 7, 'lehm'),
('Mingi', 11, 7, 'lehm')
/*
Hankida vanima ja noorima looma vanused
*/
SELECT MIN(vanus), MAX(vanus) FROM 10153400_loomaaed

/*
hankida puuri number koos selles elavate loomade arvuga (vihjeks: group by ja count )
*/
SELECT puur, COUNT(*) FROM 10153400_loomaaed GROUP BY puur

/*
suurendada kõiki tabelis olevaid vanuseid 1 aasta võrra
*/
UPDATE 10153400_loomaaed SET vanus=vanus+1

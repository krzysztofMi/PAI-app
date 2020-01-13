<?php

use Phinx\Migration\AbstractMigration;

class MyFirstMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->execute("   
CREATE TABLE tourismus_user(
                               id 			BIGSERIAL PRIMARY KEY,
                               login 		TEXT NOT NULL,
                               email		TEXT NOT NULL,
                               password    TEXT NOT NULL,
                               city		TEXT,
                               age			INT
);


CREATE TABLE ROLE (
    id SERIAL PRIMARY KEY,
    role text NOT NULL
);

INSERT INTO ROLE VALUES (1, 'ROLE_ADMIN'),
(2, 'ROLE_MOD'),
(3, 'ROLE_USER'),
(4, 'BAN');

CREATE TABLE user_role(
    id BIGSERIAL PRIMARY KEY,
    user_id BIGSERIAL references tourismus_user(id),
    role_id SERIAL references role(id)
);

CREATE TABLE city(
                     id 			BIGSERIAL PRIMARY KEY,
                     name TEXT NOT NULL,
                     description TEXT NOT NULL
);



INSERT INTO city(name, description) VALUES ('Kraków', 'Kraków (łac. Cracovia, niem. Krakau, jid. ‏קראָקע Kroke‎) – miasto na prawach powiatu położone w południowej Polsce nad Wisłą, drugie co do liczby mieszkańców i powierzchni miasto kraju, formalna stolica Polski do 1795 r. i miasto koronacyjne oraz nekropolia królów Polski, od 1000 r. nieprzerwanie stolica diecezji krakowskiej (jednej z pięciu w ówczesnej Polsce), a od 1925 archidiecezji i metropolii. Kraków uzyskał lokację miejską przed 1228 rokiem, ponowna lokacja Krakowa w 1257 r., od odzyskania niepodległości w 1918 r. miasto wojewódzkie (od 1998 r. siedziba władz województwa małopolskiego), jest także centralnym ośrodkiem metropolitalnym aglomeracji krakowskiej i Krakowskiego Obszaru Metropolitalnego. Kraków uznawany jest za stolicę historycznej Małopolski. Leży na obszarze Bramy Krakowskiej, Niecki Nidziańskiej i Pogórza Zachodniobeskidzkiego. '),
                                           ('Warszawa', 'Warszawa, miasto stołeczne Warszawa(m.st. Warszawa) – stolica Polski i województwa mazowieckiego, największe miasto kraju, położone w jego środkowo-wschodniej części, na Nizinie Środkowomazowieckiej, na Mazowszu, nad Wisłą.
Prawa miejskie uzyskała przed 1300. W 1569 mocą unii lubelskiej Warszawa została ustanowiona miejscem obrad sejmów Rzeczypospolitej Obojga Narodów. Od 1573 odbywały się tam wolne elekcje. Po 1596 do Warszawy przeniesiono dwór królewski i urzędy centralne, a w 1611 w rozbudowanym Zamku Królewskim na stałe zamieszkał król Zygmunt III Waza. Miejsce obrad sejmików generalnych województwa mazowieckiego i sejmików ziemskich ziemi warszawskiej od XVI wieku do pierwszej połowy XVIII wieku.'),
                                           ('Gdańsk', 'Gdańsk (kaszub. Gduńsk, niem. Danzig, łac. Gedanum, Dantiscum) – miasto na prawach powiatu w północnej Polsce w województwie pomorskim, położone nad Morzem Bałtyckim u ujścia Motławy do Wisły nad Zatoką Gdańską. Centrum kulturalne, naukowe i gospodarcze oraz węzeł komunikacyjny północnej Polski, stolica województwa pomorskiego. Ośrodek gospodarki morskiej z dużym portem handlowym.
Gdańsk z 466 631 mieszkańcami zajmuje szóste miejsce w Polsce pod względem liczby ludności, a siódme miejsce pod względem powierzchni – 261,96 km². Ośrodek aglomeracji trójmiejskiej, nazywaną też gdańską, wraz z Gdynią i Sopotem tworzą Trójmiasto. '),
                                           ('Wrocław', 'Wrocław i (łac. Vratislavia lub Wratislavia lub Budorgis, niem. Breslau Breslau i, dś. Brassel, cz. Vratislav, węg. Boroszló) – miasto na prawach powiatu w południowo-zachodniej Polsce, siedziba władz województwa dolnośląskiego i powiatu wrocławskiego. Położone w Europie Środkowej, na Nizinie Śląskiej, nad Odrą i czterema jej dopływami. Jest historyczną stolicą Dolnego Śląska, a także całego Śląska.
Jest głównym miastem aglomeracji wrocławskiej, a także największym miastem leżącym na Ziemiach Odzyskanych. Czwarte pod względem liczby ludności miasto w Polsce – 641 607 mieszkańców, piąte pod względem powierzchni – 292,82 km². '),
                                           ('Łódź', 'Łódź i (jid. ‏לאָדזש‎, niem. Lodz lub Lodsch; w latach 1940–1945 Litzmannstadt, ros. Лодзь) – miasto na prawach powiatu w środkowej Polsce, a także siedziba władz województwa łódzkiego, powiatu łódzkiego wschodniego oraz gminy Nowosolna, przejściowa siedziba władz państwowych w 1945 roku.
Ośrodek akademicki (6 uczelni publicznych oraz 22 niepubliczne), kulturalny i przemysłowy. Przed przemianami polityczno-gospodarczymi w 1989 r. centrum przemysłu włókienniczego i filmowego.
Łódź jest trzecim miastem w Polsce pod względem liczby ludności (682 679; po Warszawie i Krakowie) i czwartym pod względem powierzchni (293,25 km²; po Warszawie, Krakowie i Szczecinie).
Miasto należy do Unii Metropolii Polskich i Związku Miast Polskich, Związku Powiatów Polskich, a także do stowarzyszenia Eurocities oraz Stowarzyszenia Zdrowych Miast Polskich. ');


CREATE TABLE address(
                        id BIGSERIAL PRIMARY KEY,
                        city  BIGINT references city(id) NOT NULL,
                        street TEXT,
                        postal_code TEXT
);

CREATE TABLE attraction(
                           id BIGSERIAL PRIMARY KEY,
                           type TEXT NOT NULL,
                           name TEXT NOT NULL,
                           address_id BIGINT references address(id) NOT NULL,
                           imagePath TEXT,
                           short_description TEXT,
                           description TEXT,
                           price TEXT
);



INSERT INTO address(id, city) VALUES (1, 1);
INSERT INTO address(id, city) VALUES (2, 1);
INSERT INTO address(id, city) VALUES (3, 1);
INSERT INTO address(id, city) VALUES (4, 1);
INSERT INTO address(id, city) VALUES (5, 1);
INSERT INTO address(id, city) VALUES (6, 1);
INSERT INTO address(id, city) VALUES (7, 1);
INSERT INTO address(id, city) VALUES (8, 1);
INSERT INTO address(id, city) VALUES (9, 1);

INSERT INTO attraction (id, type, name, address_id, imagepath, short_description)
VALUES (1, 'MONUMENT', 'Wawel', 1, 'images\attraction\wawel.jpg', 'Zamek królewski na wawelu'),
       (2, 'MONUMENT', 'Barbakan', 2, 'images\attraction\barbakan.jpg', 'Barbakan'),
       (3, 'MONUMENT', 'Kopalnia soli', 3, 'images\attraction\kopalnia.jpg', 'Kopalnia soli w Wieliczce'),
       (4, 'MONUMENT', 'Kopiec Kościuszku', 4, 'images\attraction\kopiec.jpg', 'Kopiec Kościuszku'),
       (5, 'MONUMENT', 'Kościół Mariacki', 5, 'images\attraction\mariacka.jpg', 'Kościół Mariacki na rynku'),
       (6, 'MONUMENT', 'Planty', 6, 'images\attraction\planty.jpg', 'Planty wokół rynku'),
       (7, 'MONUMENT', 'Rynek', 7, 'images\attraction\\rynek.jpg', 'Rynek główny w Krakowie'),
       (8, 'MONUMENT', 'Smok', 8, 'images\attraction\smok.jpg', 'Smok wawelski obok Wawelu'),
       (9, 'MONUMENT', 'Sukiennice', 9, 'images\attraction\sukiennice.jpg', 'Sukiennice na rynku');



CREATE TABLE comment(
                        id BIGSERIAL PRIMARY KEY,
                        user_id BIGINT references tourismus_user(id) NOT NULL,
                        content TEXT NOT NULL,
                        attraction_id BIGINT NOT NULL references attraction(id),
                        comment_id BIGINT references comment(id)
);

CREATE TABLE grade(
                      id BIGSERIAL PRIMARY KEY,
                      user_id BIGINT references tourismus_user(id) NOT NULL ,
                      attraction_id BIGINT references attraction(id) NOT NULL,
                      grade INT NOT NULL
);
        ");
    }
}

<?php
$populate = [
    "partners" => 'INSERT INTO partners (email_partner, passwd_partner, firstname_partner, lastname_partner, is_active_partner) VALUES
                            (\'Jdebusyer@gosport.fr\', \'CRITICAL SECURITY FAILURE\', \'Jeel\', \'Debusyer\', false),
                            (\'Sandrine1978@gosport.fr\', \'CRITICAL SECURITY FAILURE\', \'Sandrine\', \'Bottier\', false),
                            (\'DoigbyLeBG@gosport.fr\', \'CRITICAL SECURITY FAILURE\', \'Etienne\', \'Decrecy\', true),
                            (\'SqueezieLeYoutuber@gosport.fr\', \'CRITICAL SECURITY FAILURE\', \'Lucas\', \'Auchard\', true);',
    "managers" => 'INSERT INTO managers (email_manager, passwd_manager, firstname_manager, lastname_manager, create_date_manager) VALUES
                            (\'Amixem@gmail.fr\', \'CRITICAL SECURITY FAILURE\', \'Maxime\', \'LeRoi\', make_date(2020, 10, 5)),
                            (\'Fabien.olicard@orange.fr\', \'CRITICAL SECURITY FAILURE\', \'Fabien\', \'Olicard\', make_date(2018, 7, 1)),
                            (\'AdamBross@outlook.fr\', \'CRITICAL SECURITY FAILURE\', \'Adam\', \'Bross\', make_date(2002, 1, 15)),
                            (\'Feldup@orange.fr\', \'CRITICAL SECURITY FAILURE\', \'Adrien\', \'deletang\', make_date(2015, 7, 7)),
                            (\'JoueurDuGrenier@yahoo.fr\', \'CRITICAL SECURITY FAILURE\', \'Fred\', \'Marcas\', make_date(2010, 10, 25)),
                            (\'boblenon@pyromail.de\', \'CRITICAL SECURITY FAILURE\', \'bob\', \'Lenon\', make_date(2017, 4, 14)),
                            (\'Lereglement@rapfr.com\', \'CRITICAL SECURITY FAILURE\', \'Damien\', \'Letranger\', make_date(2007, 7, 6));',
    "gyms" => 'INSERT INTO gyms (name_gym, addr_gym, city_gym, is_active_gym, create_date_gym, id_partner, id_manager) VALUES
                            (\'GoLyon\', \'15 rue du moulin\', \'Lyon\', false, make_date(2010, 7, 2), 1, 1),
                            (\'GoToulouse\', \'12 rue de la chappe\', \'Toulouse\', false, make_date(2070, 7, 2), 1, 5),
                            (\'GoMarseille\', \'9 rue de maringues\', \'Marseille\', true, make_date(2000, 7, 2), 2, 2),
                            (\'GoNantes\', \'1 rue des ecoles\', \'Nantes\', false, make_date(2004, 7, 2), 3, 4),
                            (\'GoClermont\', \'2 boulevard de jussieu\', \'Clermont-Ferrand\', true, make_date(2007, 7, 2), 4, 3),
                            (\'GoParis\', \'54 route de mon pere\', \'Paris\', true, make_date(2015, 7, 2), 4, 6),
                            (\'GoBZH\', \'14 rue de la chatte a ta mere\', \'Vannes\', true, make_date(2017, 7, 2), 4, 7);',
    "perms" => 'INSERT INTO perms (short_desc_perm, long_desc_perm) VALUES
                            (\'Vente boisson\', \'Le site dune salle de sport beneficiant de cette permission possede un espace de vente en ligne de vente de boisson\'),
                            (\'Gerer des plannings\', \'Permet davoir un outil de gestion de planning tres poussé permettant daranger au mieux vos coatch et etudiants\'),
                            (\'Assistance telephonique\', \'Permet de rediriger tout les appelles de vos clients vers une platteforme dassistance de gosport pour vous laisser plus de temps libre\'),
                            (\'Cours en ligne\', \'Autorise la vente de cours en ligne de sports certifie par gosport\'),
                            (\'Chartre graphique gosport\', \'Arborer nos dernieres chartres graphique sur votre site, avec un UX specifique pour que vos clients passent plus de temps sur votre site\');',
    "partners_auth" => 'INSERT INTO partners_auth (id_partner, id_perm) VALUES 
                            (1, 1), (1, 2), (1, 4),
                            (2, 2), (2, 3), (2, 5),
                            (4, 3),
                            (5, 1), (5, 2), (5, 3), (5, 4), (5, 5);',
    "gyms_auth" => 'INSERT INTO gyms_auth (id_gym, id_perm) VALUES
                            (1, 1), (1, 4),
                            (2, 1), (1, 2),
                            (3, 2), (3, 3), (3, 5),
                            (5, 3),
                            (6, 3),
                            (7, 1), (7, 2), (7, 4), (7, 5);'
];

function populate_table($pdo, $table_name, $request) {
    $pdo->exec($request);
}

try {
    $pdo = new PDO('pgsql:host=ec2-54-80-123-146.compute-1.amazonaws.com;port=5432;dbname=dcei00rnh680m4;user=zwdocmtikopoey;password=c1cb72303a61470907954cf328500a1a52d506c52f0ac16a7be0bff7544fb40e');
    foreach ($populate as $table_name => $request) {
        populate_table($pdo, $table_name, $request);
    }
    $stmt = $pdo->prepare('INSERT INTO admins(email_admin, passwd_admin) VALUES (:email, :password)');
    $stmt->bindValue(':email', 'corentin.turgis@gmail.com');
    $stmt->bindValue(':password', password_hash('vturgis41', PASSWORD_BCRYPT));
    $stmt->execute();
    $stmt = $pdo->prepare("INSERT INTO partners(email_partner, passwd_partner, firstname_partner, lastname_partner, is_active_partner) VALUES (:email, :password, 'Flora', 'thomas', true)");
    $stmt->bindValue(':email', 'thomas.flora2001@gmail.com');
    $stmt->bindValue(':password', password_hash('flora2001', PASSWORD_BCRYPT));
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
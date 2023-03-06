<?php
$create_requests = [
    'Admins' =>     'DROP TABLE IF EXISTS admins;
                    CREATE TABLE admins
                    (
                        Id_admin SERIAL NOT NULL PRIMARY KEY,
                        Email_admin VARCHAR(80) NOT NULL,
                        Passwd_admin VARCHAR(80) NOT NULL
                    );',
    'Partners' =>   'DROP TABLE IF EXISTS partners CASCADE;
                    CREATE TABLE partners
                    (
                        Id_partner SERIAL NOT NULL PRIMARY KEY,
                        Email_partner VARCHAR(80) NOT NULL,
                        Passwd_partner VARCHAR(80) NOT NULL,
                        Firstname_partner VARCHAR(40) NOT NULL,
                        Lastname_partner VARCHAR(40) NOT NULL,
                        Is_active_partner BOOLEAN NOT NULL
                    );',
    'Managers' =>   'DROP TABLE IF EXISTS managers CASCADE;
                    CREATE TABLE managers
                    (
                        Id_manager SERIAL NOT NULL PRIMARY KEY,
                        Email_manager VARCHAR(80) NOT NULL,
                        Passwd_manager VARCHAR(80) NOT NULL,
                        Firstname_manager VARCHAR(40) NOT NULL,
                        Lastname_manager VARCHAR(40) NOT NULL,
                        create_date_manager DATE NOT NULL
                    );',
    'Gyms' =>       'DROP TABLE IF EXISTS gyms;
                    CREATE TABLE gyms
                    (
                        Id_gym SERIAL NOT NULL PRIMARY KEY,
                        Name_gym VARCHAR(80) NOT NULL,
                        Addr_gym VARCHAR(250) NOT NULL,
                        City_gym VARCHAR(40) NOT NULL,
                        Is_active_gym BOOLEAN NOT NULL,
                        Create_date_gym DATE NOT NULL,
                        Id_partner INT NOT NULL,
                        Id_manager INT NOT NULL,
                        FOREIGN KEY (Id_partner)
                            REFERENCES Partners (Id_partner),
                        FOREIGN KEY (Id_manager)
                            REFERENCES Managers (Id_manager)
                    );',
    'Perms' =>    'DROP TABLE IF EXISTS perms;
                        CREATE TABLE perms
                        (
                            Id_perm SERIAL NOT NULL PRIMARY KEY,
                            Short_desc_perm VARCHAR(250) NOT NULL,
                            Long_desc_perm TEXT NOT NULL
                        );',
    'Partners_auth' =>   'DROP TABLE IF EXISTS partners_auth;
                        CREATE TABLE partners_auth
                        (
                            Id_partner INT NOT NULL,
                            Id_perm INT NOT NULL,
                            PRIMARY KEY (Id_partner, Id_perm)
                        );',
    'Gyms_auth' =>      'DROP TABLE IF EXISTS gyms_auth;
                        CREATE TABLE gyms_auth
                        (
                            Id_gym INT NOT NULL,
                            Id_perm INT NOT NULL,
                            PRIMARY KEY (Id_gym, Id_perm)
                        );'
];

function create_table($pdo, $create_request, $table_name) {
    $pdo->exec($create_request);
}

try {
    $pdo = new PDO('pgsql:host=ec2-54-80-123-146.compute-1.amazonaws.com;port=5432;dbname=dcei00rnh680m4;user=zwdocmtikopoey;password=c1cb72303a61470907954cf328500a1a52d506c52f0ac16a7be0bff7544fb40e');
    foreach ($create_requests as $table_name => $create_request) {
        create_table($pdo, $create_request, $table_name);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


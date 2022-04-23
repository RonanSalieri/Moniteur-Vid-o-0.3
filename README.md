# Moniteur-Vidéo-0.3
Monitorer ses flux vidéo lors de ses streams.

I - INTRODUCTION

Cet utilitaire permet de contrôler les flux vidéo provenant du, ou des providers lors d'une production.
Il affiche de 1 à 12 flux vidéo en simultanée.
Le lecteur vidéo utilisé est celui fourni par le fournisseur de flux quand celui-ci le propose.
Les nouveautés par rapport à la version précédente sont :
- Choix d'afficher endre 1, 2, 3, 4, 6, 9 et 12 vues sur la même page.
- L'édition des liens ne concerne que le lecteur vidéo.
- Affichage responsive pour compatibilité avec les appareils nomades.

II - EDITION

En cliquant sur le numéro de la vidéo, qui est dans le bouton bleu en haut à gauche du player, on accède au formulaire pour renseigner le flux.
La première ligne reprends les informations actuelles du lecteur vidéo.
La mise à jour du lien se fait en remplissant (optionnel) le titre et le service.
Le champs "URL de la vidéo" doit être renseigné avec le lien contenu dans la constante SRC de la balise iframe fournie par le fournisseur de flux.
Exemple sur un lien d'intégration "Youtube" :

<iframe width="560" height="315" src="https://www.youtube.com/embed/MsN0_WNXvh8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
La partie à copier/coller est :
https://www.youtube.com/embed/MsN0_WNXvh8

III - RECUPERATION DES LIENS

Ci-dessous, quelques exemples pour récupérer le lien chez certain fournisseurs.

YOUTUBE

[iframe width="560" height="315" src="https://www.youtube.com/embed/qLINONEDT6U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> [/iframe]

FACEBOOK

[iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FBENBOY26%2Fvideos%2F677457100062212%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"> [/iframe]

VIMEO

[iframe src="https://player.vimeo.com/video/684542460?h=782c09adc7&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>[/iframe]

IV - INSTALLATION

Ce script est sous license libre.
Ce script doit être installé sur un serveur Internet utilisant les technologies APACHE, PHP MYSQL et PHPMYADMIN pour administrer la base de données.
Les sources BOOTSTRAP sont fournies avec le script.

ETAPE 1

Copier le contenu du dossier dans un répertoire accessible sur votre serveur web.

ETAPE 2

Créer une base de données MYSQL ou utiliser une déjà existante et rajouter deux tables : services et stream :

CREATE TABLE services (
CREATE TABLE services (
  id int(11) NOT NULL,
  providers text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO services (id, providers) VALUES
(1, 'Youtube'),
(2, 'Daylimotion'),
(3, 'Vimeo'),
(4, 'Amazon'),
(5, 'Twitch'),
(6, 'Facebook'),
(7, 'Infomaniak'),
(8, 'Ustream'),
(9, 'Dacast'),
(10, 'Clevercast'),
(11, 'Boxcast'),
(12, 'ESPxMedia'),
(13, 'IBM Video Streaming'),
(14, 'Meridix'),
(15, 'Ministerio TV'),
(16, 'LinkedIn'),
(17, 'Restream'),
(18, 'Scale Engine'),
(19, 'Streaming Video Provider'),
(20, 'Wowza'),
(21, 'Stream Shark');

CREATE TABLE stream (
  id int(11) NOT NULL,
  titre text NOT NULL,
  url text NOT NULL,
  service text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO stream (id, titre, url, service) VALUES
(1, 'Wow Unreal 5', 'https://www.youtube.com/embed/_r862KvbVn4', 'Youtube'),
(2, 'France Info', 'https://www.youtube.com/embed/Z-Nwo-ypKtM', 'Youtube'),
(3, 'Unreal Engine', 'https://www.youtube.com/embed/Vd6hAK3HlCM', 'Youtube'),
(4, 'Sport', 'https://player.vimeo.com/video/290120770?h=d6a8a5d5b8&color=ffffff&title=0&byline=0&portrait=0&badge=0', 'Vimeo'),
(5, 'BFMTV', 'https://www.dailymotion.com/embed/video/x89via0?autoplay=1', 'Daylimotion'),
(6, 'Skynews', 'https://www.youtube.com/embed/9Auq9mYxFEE', 'Youtube'),
(7, 'Euronews', 'https://www.youtube.com/embed/sPgqEHsONK8', 'Youtube'),
(8, 'Wow Dragon Flight', 'https://www.youtube.com/embed/-nZ_e9wAWxw', 'Youtube'),
(9, 'Diablo', 'https://www.youtube.com/embed/-WWDCa9Yz1A', 'Youtube'),
(10, 'Cnews Live', 'https://www.dailymotion.com/embed/video/x3b68jn?autoplay=1', 'Daylimotion'),
(11, 'GrandMa Tips', 'https://www.youtube.com/embed/EuIxM58dsbM', 'Youtube'),
(12, 'Les Kassos', 'https://www.youtube.com/embed/o7SuM1vAAGI', 'Youtube');

ALTER TABLE services
  ADD PRIMARY KEY (id);

ALTER TABLE stream
  ADD PRIMARY KEY (id);

ALTER TABLE services
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE stream
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

La table "services" peut être modifiée en fonction de choix personnel.
La table "stream" contient déjà des liens d'exemples qui peuvent êtres obsolètes le jour de la mise en place du script sur un nouveau serveur.

ETAPE 3

Entrer les informations liées au serveur Internet utilisé :
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=nom_de_la_base_de_donnee;charset=utf8', 'login', 'motdepasse');

HOST : doit comporter le host sur lequel est hébergé la base de donnée. Sur un serveur unique pour APACHE et MYSQL, le plus souvent on reste en localhost. Sinon il faut regarder la notice d'utilisation fournie par le fournisseur de service.
PORT : Le port par défaut est le 3306. Le modifier si les informations du serveur MYSQL sont différentes
DBNAME : doit comporter le nom de la base de données utilisée.
A la place de LOGIN et MOTDEPASSE, entrer les informations d'accès à la base de données fournies par le fournisseur de service.

ETAPE 4

Dans un navigateur, écrire l'adresse correspondante à votre serveur et le dossier contenant le script. Par exemple, https://monsite.com/moniteur/".

V - CONCLUSION
Ce script est fonctionnel avec les navigateur Google Chrome, Microsoft Edge, Firefox, Brave, Opera sur PC avec une résolution de 1920 x 1080 pixels.

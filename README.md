# PHP

## Ojectif du module

L’objectif du module est de créer en pur PHP des outils et des concepts utilisés dans les principaux frameworks PHP

## Concepts abordés

Modèle Vue Contrôleur

Contrôleur frontal

Routage

Injection de dépendances

Fichier dʼenvironnement

Migrations

Entités et classes de dépôt

Annotations

JSON Web Token

Webpack 😅

> Hors sujet

## Modèle Vue Contrôleur

Le patron de conception **Modèle Vue Contrôleur** permet de séparer une application en plusieurs couches

* **Modèle** : accès, traitement, modification des données…

* **Vue** : interface visuelle avec l’utilisateur

* **Contrôleur** : interface entre les modèles et les vues

## Contrôleur frontal

Le patron de conception **Contrôleur frontal** permet de définir un point d’entrée unique dans l’application

Avec le serveur intégré du PHP, pour lancer le contrôleur frontal en ligne de commandes

```bash
php -S <address>:<port> -t <directory> -f <file>
 
php -S localhost:8000 -t public
php -S localhost:8000 -t api -f main.php
```

## Routage

Le routage permet de faire correspondre une route à un contrôleur

## Injection de dépendances

Le principe de la Programmation Orientée Objet est de faire collaborer plusieurs objets pour réaliser l’application finale

Malgré tous ses avantages, cette méthode de conception introduit une dépendance souvent forte entre les objets : chaque objet a besoin d’autres objets pour réaliser sa tâche

```php
class Person{
	public function __construct(){
		$address = new Address();
	}
}
```

L’injection de dépendance permet de minimiser cette dépendance en proposant une classe dédiée à l’instanciation de toutes les classes de l’application

## Fichier dʼenvironnement

Un fichier dʼenvironnement permet de stocker des informations nécessaires au fonctionnement de lʼ application

* informations dʼaccès à la base de données

* clés dʼAPI

* chaîne de caractères secrète de lʼapplication…

> Un fichier dʼenvironnement ne doit pas contenir dʼespaces

Par convention les constantes sont écrites en capitales

```ini
# database
DB_HOST=…
DB_USER=…
DB_PWD=…
DB_NAME=…
 
# secret token
SECRET=…
```

## Migrations

Les migrations permettent de stocker de manière incrémentielle les modifications effectuées sur la base de données

```php
class Migrations20000101
{
	protected $sql = "
		DROP DATABASE IF EXISTS database;
 
		CREATE DATABASE database;
 
		CREATE TABLE IF NOT EXISTS database.table(
			id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
			field VARCHAR(100)
		);
	";
}
```

```php
require_once "vendor/autoload.php";
 
class Main
{
	public function __construct()
	{
		$files = new DirectoryIterator("src/Migrations");
		foreach ($files as $file) {
			…
		}
	}
 
	public function execute():void
	{
		…
		echo "\e[0;32mMigrations has been successful!\e[0m\n";
	}
}
 
$main = new MainMigration();
$main->execute();
```

Il est recommandé d’exécuter les migrations en ligne de commande

```bash
php src/Migrations/Main.php
```

Pour coloriser la sortie de la ligne de commande : <https://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/>


## Entités et classes de dépôt

Les entités sont des classes PHP qui sont le reflet d’une table de la base de donnés

Les colonnes de la table deviennent des propriétés de la classe PHP

Les classes de dépôt permettent de stocker les requêtes SQL effectuées sur une entité

## Annotations

Les annotations sont des des blocs de documentation utilisés comme métadonnées de la classe

Les annotations peuvent être associées à la classe ou à une propriété d’une classe

Les classes de réflection permettent de récupérer les blocs de documentation

```php
/**
 * @annotation{"property" : "value"}
*/
class MyClass
{
	/**
	 * @annotation{"property" : "value"}
	 * @annotation2{"property" : "value", "property2" : "value"}
	*/
	private $myProperty;
}
```

## JSON Web Token

[JSON Web Tokens](https://jwt.io/) permettent de créer des jetons de sécurité à partir d’une clé secrète

De nombreuses bibliothèques existent dans les principaux langages

En PHP, il est possible d’utiliser la bibliothèque [JWT Framework](https://web-token.spomky-labs.com/)

Différents modules de la bibliothèque sont à importer

```bash
composer require web-token/jwt-core
composer require web-token/jwt-signature
```

Pour créer un JWT : <https://web-token.spomky-labs.com/components/signed-tokens-jws/jws-creation>

Pour vérifier un JWT : <https://web-token.spomky-labs.com/components/signed-tokens-jws/jws-loading>

Pour gérer l’authentification avec JWT :<https://auth0.com/learn/json-web-tokens/>

## Webpack

Installer `webpack` et `webpack-cli` en global et en dépendance

```bash
npm init -y
npm install -g webpack@latest webpack-cli@latest
npm install webpack@latest webpack-cli@latest --save-dev
npm install mini-css-extract-plugin css-loader --save-dev
```

Dans le fichier **package.json**, créer les scripts associés à `webpack`

```json
"scripts": {
	"watch": "webpack --watch",
	"build": "webpack --mode=production"
},
```

Dans le fichier **webpack.config.js**, configurer webpack

```js
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
 
module.exports = {
  mode: 'development',
  entry: {
    index: './assets/js/index.js',
  },
  output: {
    path: path.resolve(__dirname, './public'),
    filename: 'js/[name].js'
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
          },
          'css-loader',
        ],
      },
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '/css/[name].css',
      chunkFilename: '/css/[id].css',
      ignoreOrder: false,
    }),
  ]
};
```

Lancer le script `watch`

```bash
npm run watch
```

Par exemple, pour utiliser la bibliothèque bootstrap en CSS et JS

```bash
npm install jquery bootstrap popper.js --save
```

```js
import 'bootstrap/dist/css/bootstrap.min.css';
 
import $ from 'jquery';
import 'bootstrap';
```
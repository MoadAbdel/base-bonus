# Gestion de l'upload dans un projet Laravel

## Uploader un fichier "public"

Dans `app/Http/Controllers/UploadController.php`, méthode `uploadPublic` :

Utiliser l'objet `request` avec les méthodes `file` et `store` pour enregistrer l'image dans un sous-dossier `avatars` sur le disque public.

Créer ensuite le lien symbolique pour rendre les fichiers accessibles via le navigateur.

Documentation : https://laravel.com/docs/12.x/filesystem#the-public-disk

---

## Uploader un fichier "privé"

Dans `app/Http/Controllers/UploadController.php`, méthode `uploadPrivate` :

Utiliser l'objet `request` avec les méthodes `file` et `store` pour enregistrer le document PDF dans un sous-dossier `documents` sur le disque local (privé par défaut).

Documentation : https://laravel.com/docs/12.x/filesystem#the-local-driver

---

## Récupérer un fichier privé

Dans `app/Http/Controllers/IndexController.php`, méthode `getPrivateDocument` :

- Récupérer le chemin du fichier
- Vérifier que le fichier existe avec `Storage::exists`, sinon retourner une erreur 404
- Retourner le fichier avec `Storage::response`

---

## Liens utiles

- https://laravel.com/docs/12.x/filesystem#file-uploads

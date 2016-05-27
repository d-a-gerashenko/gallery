### install
```
git clone https://github.com/mirfaiziev/gallery.git
cd gallery
docker-compose -f docker-compose build

# use db-host = db and user, password, database = gallery
docker exec -it gallery_phpcli_1 composer update

# generate images and put in into source/web/images/$album_name/$image_name
docker exec -it gallery_phpcli_1 app/console doctrine:database:create
docker exec -it gallery_phpcli_1 app/console doctrine:schema:update --force
docker exec -it gallery_phpcli_1 app/console doctrine:fixtures:load
docker exec -it gallery_phpcli_1 npm install
```
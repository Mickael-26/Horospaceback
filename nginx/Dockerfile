# # Étape 1 : Utiliser une image Node.js officielle pour construire les fichiers
# FROM node:20 AS build

# # Définir le répertoire de travail
# WORKDIR /app

# # Copier les fichiers du projet
# COPY . ./

# # Installer les dépendances npm et exécuter npx mix --production
# RUN npm install && npm run prod

# # Étape 2 : Utiliser l'image nginx pour le serveur web
FROM nginx:latest

# Copier les fichiers minifiés de l'étape précédente dans le répertoire public/build
#COPY /app/public /var/www/public
COPY . /var/www
# Copier la configuration nginx
COPY ./nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf

CMD ["nginx", "-g", "daemon off;"]

EXPOSE 80

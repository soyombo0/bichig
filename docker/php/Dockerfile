FROM serversideup/php:8.3-fpm

# Switch to root so we can do root things
USER root
# Node.js, NPM, Yarn
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g

USER www-data


